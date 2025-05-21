<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::index');
$routes->get('/login', 'Pages::index');
$routes->get('/logout', 'Login::logout', ['filter' => 'auth']);
$routes->get('/table', 'Pages::table', ['filter' => 'auth']);
$routes->get('/add-data', 'Pages::addData', ['filter' => 'auth']);
$routes->get('/edit-data/(:num)', 'Pages::editData/$1', ['filter' => 'auth']);

$routes->post('/login/validation', 'Login::login');
$routes->post('/add-data/save', 'Buku::insert');
$routes->post('/edit-data/update/(:num)', 'Buku::update/$1');

$routes->delete('/delete-data/(:num)', 'Buku::delete/$1');
