<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('init', 'Initial::index');$routes->get('perfil', 'Profile::index');$routes->get('comunidades', 'Community::index');