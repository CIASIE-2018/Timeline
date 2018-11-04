<?php

$app->get('/', 'HomeController:index');
$app->get('/rules', 'HomeController:rules');
$app->get('/themes','ThemeController:index');
/*$app->get('/salon/:idTheme','RoomController:index');
$app->get('/salon',  function () use ($app) {
    $paramValue = $app->request()->params('paramName');
});*/
$app->get('/salonGeneral', 'RoomController:general');
$app->get('/salonCine', 'RoomController:cinema');
$app->get('/salonSport', 'RoomController:sport');
$app->get('/roomCreate','roomCreate:roomCreate');
/*$app->get('/creationSalonGeneral', 'RoomController:roomCreate("Général", "bob")');
$app->get('/creationSalonCinema', 'RoomController:roomCreate("Cinéma", "bob")');
$app->get('/creationSalonSport', 'RoomController:roomCreate("Sport", "bob")');*/
?>