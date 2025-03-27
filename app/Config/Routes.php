<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Auth
$routes->get('/', 'LandingPageController::index');
$routes->get('/login', 'LoginController::index');
$routes->post('login/authenticate', 'LoginController::authenticate');
$routes->get('/logout', 'LoginController::logout');

// Register
$routes->get('/register', 'RegisterController::index');
$routes->post('register/register', 'RegisterController::register');
$routes->get('/forgot-password', 'RegisterController::viewFPass');

// Dashboard
$routes->get('/dashboard', 'DashController::index');

// Master Menu
$routes->get('/master-menu', 'MasterMenuController::index');
$routes->get('/view-add-master-menu', 'MasterMenuController::indexAdd');
$routes->get('/get-master-menu/(:num)', 'MasterMenuController::getById/$1');
$routes->post('/add-master-menu', 'MasterMenuController::store');
$routes->post('/delete-master-menu', 'MasterMenuController::delete');

// Master Group User
$routes->get('/master-group-user', 'MasterGroupUserController::index');
$routes->get('/view-add-master-group-user', 'MasterGroupUserController::indexAdd');
$routes->get('/get-master-group-user/(:num)', 'MasterGroupUserController::getById/$1');
$routes->post('/add-master-group-user', 'MasterGroupUserController::store');
$routes->post('/delete-master-group-user', 'MasterGroupUserController::delete');

// Users
$routes->get('/users', 'UsersController::index');
$routes->get('/view-add-users', 'UsersController::indexAdd');
$routes->get('/get-users/(:num)', 'UsersController::getById/$1');
$routes->post('/add-users', 'UsersController::store');
$routes->post('/delete-users', 'UsersController::delete');

// Master Matkul
$routes->get('/master-matkul', 'MasterMatkulController::index');
$routes->get('/view-add-master-matkul', 'MasterMatkulController::indexAdd');
$routes->get('/get-master-matkul/(:num)', 'MasterMatkulController::getById/$1');
$routes->post('/add-master-matkul', 'MasterMatkulController::store');
$routes->post('/delete-master-matkul', 'MasterMatkulController::delete');

// Profile
$routes->get('/myprofile/(:any)', 'Profile::index/$1');
$routes->get('/editprofile/(:any)', 'Profile::indexEdit/$1');
$routes->post('/edit-profile', 'Profile::updateProfile');
$routes->post('/edit-email', 'Profile::updateEmail');
$routes->post('/edit-password', 'Profile::updatePassword');

// Form Pendaftaran
$routes->get('/list-pendaftaran', 'ListController::index');
$routes->get('/form-pendaftaran', 'RegisterUsersController::index');
$routes->get('/view-add-pelatihan', 'RegisterUsersController::indexAdd');
