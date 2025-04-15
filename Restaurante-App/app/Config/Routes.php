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

$routes->get('atencion/salon', 'Atencion\Salon::index'); 
$routes->post('atencion/salon/asignar', 'Atencion\Salon::asignarMesa'); 
$routes->get('atencion/salon/getMesas', 'Atencion\Salon::getMesas'); 
$routes->post('atencion/salon/liberar', 'Atencion\Salon::liberarMesa'); 

$routes->post('atencion/salon/guardarPedido', 'Atencion\Salon::guardarPedido');


$routes->get('pruebadb', 'PruebaDB::index');

