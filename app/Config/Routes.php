<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Items::index');

$routes->get('items', 'Items::index');
$routes->get('items/create', 'Items::create');
$routes->post('items', 'Items::store');
$routes->get('items/(:num)/edit', 'Items::edit/$1');
$routes->post('items/(:num)/update', 'Items::update/$1');
$routes->post('items/(:num)/delete', 'Items::delete/$1');
