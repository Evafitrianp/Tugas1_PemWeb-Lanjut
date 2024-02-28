<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

$routes->get('konversi', 'KonversiController::index');
$routes->post('konversi/hitungKonversi', 'KonversiController::hitungKonversi');

