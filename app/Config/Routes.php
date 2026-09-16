<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
// $routes->get('/', 'Home::index');
$routes->get('/', 'Pages::home');
$routes->get('/about', 'Pages::about');

$routes->get('/customers', 'Customers::index');
$routes->get('/users', 'Users::index');

$routes->get('/products', 'Products::index');
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::attemptLogin');
$routes->get('/logout', 'Auth::logout');