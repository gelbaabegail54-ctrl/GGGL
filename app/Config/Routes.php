<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// 1. Default Route
$routes->get('/', 'AuthController::login');

// 2. Authentication & Registration Routes
$routes->get('login', 'AuthController::login');
$routes->post('loginAuth', 'AuthController::loginAuth');
$routes->get('logout', 'AuthController::logout');

$routes->get('register', 'AuthController::register');
$routes->post('registerStore', 'AuthController::registerStore');

// 3. Admin Dashboard Route
$routes->get('dashboard', 'AdminController::index');

// User Management CRUD
$routes->get('users', 'AdminController::userList');
$routes->get('users/create', 'AdminController::userCreate');
$routes->post('users/store', 'AdminController::userStore');
$routes->get('users/edit/(:num)', 'AdminController::userEdit/$1');
$routes->post('users/update/(:num)', 'AdminController::userUpdate/$1');
$routes->get('users/delete/(:num)', 'AdminController::userDelete/$1');

// Rice Inventory CRUD
$routes->get('inventory', 'AdminController::inventoryIndex');
$routes->get('inventory/create', 'AdminController::inventoryCreate');
$routes->post('inventory/store', 'AdminController::inventoryStore');
$routes->get('inventory/edit/(:num)', 'AdminController::inventoryEdit/$1');
$routes->post('inventory/update/(:num)', 'AdminController::inventoryUpdate/$1');
$routes->get('inventory/delete/(:num)', 'AdminController::inventoryDelete/$1');

// Sales Transaction Routes
// Idinagdag natin ang 'sales/new' para hindi na mag-404
$routes->get('sales', 'AdminController::salesIndex');
$routes->get('sales/new', 'AdminController::salesIndex'); 
$routes->post('sales/store', 'AdminController::salesStore');