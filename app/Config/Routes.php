<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('cv', 'CV::index');
$routes->post('cv/upload', 'CV::upload');

// Admin routes
$routes->get('/admin', 'Admin::index');
$routes->get('/admin/users', 'Admin::users');
$routes->get('/admin/cvs', 'Admin::cvs');
$routes->get('admin/download_cv/(:num)', 'Admin::download_cv/$1');


