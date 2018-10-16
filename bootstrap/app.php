<?php

session_start();

require "../vendor/autoload.php";



$app = new \Slim\App([

	'settings' => [

		'displayErrorDetaills' => true,
	],

	'db' => [
	    'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'database',
            'username' => 'root',
            'password' => 'root',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
	]
]);

$container = $app->getContainer();

$container['db'] = function (ContainerInterface $container) {
    $settings = $container->get('database');
    $capsule = new \Illuminate\Database\Capsule\Manager;
    $capsule->addConnection($settings);
    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
};



/* pas bon

$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['db']);

$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['db'] = function ($container) use ($capsule){
	return $capsule;
};

*/




$container['view'] = function ($container){
	$view = new \Slim\Views\Twig('../resources/views', [
		'cache' => false,
	]);

	$view->addExtension(new \Slim\Views\TwigExtension(
		$container->router,
		$container->request->getUri()
	));

	return $view;
};

$container['validator'] = function($container){
	return new \App\Validation\Validator;
}

$container['HomeController'] = function ($container) {
	return new \App\Controllers\HomeController($container);
};

$container['AuthController'] = function ($container) {
	return new \App\Controllers\Auth\AuthController($container);
};

$app->add(new \App\Middleware\ValidationErrorsMiddleware($container));
$app->add(new \App\Middleware\OldInputMiddleware($container));

require '../app/routes.php';
