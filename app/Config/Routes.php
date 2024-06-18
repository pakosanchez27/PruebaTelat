<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/registrar', 'Home::register');
$routes->post('/registrar/save', 'Home::store');

$routes->get('/reportes', 'reportesController::index');

$routes->get('/reportes/ver/(:num)', 'reportesController::show/$1');

$routes->get('/reportes/editar/(:num)', 'reportesController::edit/$1');

$routes->put('/reportes/update/(:num)', 'reportesController::update/$1');

$routes->get('/reportes/eliminar/(:num)', 'reportesController::desactivar/$1');

$routes->post('reportes/exportar', 'reportesController::exportar');
