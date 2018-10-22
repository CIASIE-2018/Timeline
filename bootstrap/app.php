<?php

session_start();

require "../vendor/autoload.php";



$app = new \Slim\App([

	'settings' => [

		'displayErrorDetaills' => true,
	]
]);

$container = $app->getContainer();

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

$container['HomeController'] = function ($container) {
	return new \App\Controllers\HomeController($container);
};

$container['ThemeController'] = function ($container) {
	return new \App\Controllers\ThemeController($container);
};

$container['RoomController'] = function($container) {
	return new  \App\Controllers\RoomController($container);
};


$container['roomCreate'] = function($container) {
	return new  \App\Controllers\roomCreate($container);
};


require '../app/routes.php';
