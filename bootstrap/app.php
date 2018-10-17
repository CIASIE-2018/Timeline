<?php

use Respect\Validation\Validator as v;

session_start();

require "../vendor/autoload.php";



$app = new \Slim\App([

	'settings' => [
        'determineRouteBeforeAppMiddleware' => false,
		'displayErrorDetaills' => true,
	],

	'db' => [
	    'driver' => 'mariadb',
            'host' => 'localhost',
            'database' => 'db',
            'username' => 'root',
            'password' => 'root',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
	]
]);

// $app->withFacades();

// $app->withEloquent();


$container = $app->getContainer();

/*
$container['db'] = function (ContainerInterface $container) {
    $capsule = new \Illuminate\Database\Capsule\Manager;
    $capsule->addConnection($container->get('settings')['db']);
    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
};
*/

$container['db'] = function ($container) {
    $capsule = new \Illuminate\Database\Capsule\Manager;
    $capsule->addConnection($container['settings']['db']);

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
};

$container['auth'] = function ($container) {
    return new \App\Auth\Auth;
};

$container['view'] = function ($container){
	$view = new \Slim\Views\Twig('../resources/views', [
		'cache' => false,
	]);

	$view->addExtension(new \Slim\Views\TwigExtension(
		$container->router,
		$container->request->getUri()
	));

    $view->getEnvironment()->addGlobal('auth', [
        'check' => $container->auth->check(),
        'user' => $container->auth->user(),
    ]);

	return $view;
};

$container['validator'] = function($container){
	return new \App\Validation\Validator;
};

$container['HomeController'] = function ($container) {
	return new \App\Controllers\HomeController($container);
};

$container['AuthController'] = function ($container) {
	return new \App\Controllers\Auth\AuthController($container);
};

$container['csrf'] = function ($container) {
    return new \Slim\Csrf\Guard;
};



$app->add(new \App\Middleware\ValidationErrorsMiddleware($container));
$app->add(new \App\Middleware\OldInputMiddleware($container));
$app->add(new \App\Middleware\CsrfViewMiddleware($container));
$app->add($container->csrf);

v::with('App\\Validation\\Rules\\');



require '../app/routes.php';
