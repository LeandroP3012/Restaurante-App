<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index'); // Página principal
$routes->get('/dashboard', 'Dashboard::index'); 
$routes->get('/usuarios', 'Usuarios::index'); 
