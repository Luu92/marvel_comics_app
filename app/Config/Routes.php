<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

//Rutas definias para las distintas secciones del app 
$routes->get('/heroes','HeroesController::index');

$routes->get('/heroes/listarmisheroes','HeroesController::listarMisHeroes');
$routes->get('/heroes/crear','HeroesController::createHeroe');
$routes->post('/heroes/guardar','HeroesController::guardarHeroe');
$routes->get('/heroes/editar/(:num)','HeroesController::show/$1');
$routes->put('/heroes/actualizar/(:num)','HeroesController::updateHeroe/$1');
$routes->post('/heroes/eliminar/(:num)','HeroesController::deleteHeroe/$1');