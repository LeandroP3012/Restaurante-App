<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index'); // Página principal
$routes->get('/dashboard', 'Dashboard::index'); 
$routes->get('/usuarios', 'Usuarios::index'); 
$routes->get('configuracion/salon', 'Configuracion\Salon::index');

// Configuracion/Salon
$routes->post('configuracion/salon/store', 'Configuracion\Salon::store');
$routes->get('configuracion/salon/getMesas', 'Configuracion\Salon::getMesas');


$routes->get('pruebadb', 'PruebaDB::index');

