<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

// Étape 1
$routes->get('/cv/etape1', 'CvController::step1_get');
$routes->post('/cv/etape1', 'CvController::step1_post');

// Étape 2
$routes->get('/cv/etape2', 'CvController::step2_get');
$routes->post('/cv/etape2', 'CvController::step2_post');

// Étape 3
$routes->get('/cv/etape3', 'CvController::step3_get');
$routes->post('/cv/etape3', 'CvController::step3_post');

// Étape 4
$routes->get('/cv/etape4', 'CvController::step4_get');
$routes->post('/cv/etape4', 'CvController::step4_post');

// Étape 5
$routes->get('/cv/etape5', 'CvController::step5_get');
$routes->post('/cv/etape5', 'CvController::step5_post');

// Étape 6
$routes->get('/cv/etape6', 'CvController::step6_get');
$routes->post('/cv/etape6', 'CvController::step6_post');

// Étape 7
$routes->get('/cv/etape7', 'CvController::step7_get');
$routes->post('/cv/etape7', 'CvController::step7_post');

// Page de succès
$routes->get('/cv/succes', 'CvController::success');

// Admin routes
$routes->get('/admin', 'Admin::index');
$routes->get('/admin/users', 'Admin::users');
$routes->get('/admin/cvs', 'Admin::cvs');
$routes->get('admin/download_cv/(:num)', 'Admin::download_cv/$1');


