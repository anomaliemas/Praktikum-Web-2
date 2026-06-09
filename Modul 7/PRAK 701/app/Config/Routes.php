<?php

namespace Config;

$routes = Services::routes();
$routes->setDefaultNamespace('App\Controllers');
$routes->get('/', 'Buku::index', ['filter' => 'auth']);

$routes->get('/login', 'Auth::index');
$routes->post('/login', 'Auth::login');

$routes->get('/logout', 'Auth::logout');

$routes->group('buku', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Buku::index');
    $routes->get('create', 'Buku::create');
    $routes->post('store', 'Buku::store');
    $routes->get('edit/(:num)', 'Buku::edit/$1');
    $routes->post('update/(:num)', 'Buku::update/$1');
    $routes->get('delete/(:num)', 'Buku::delete/$1');
});