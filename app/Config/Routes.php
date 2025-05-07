<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Auth
$routes->get('/', 'LandingPage::index');
$routes->get('/prodi/(:segment)', 'LandingPage::detailProdi/$1');

$routes->get('register', 'AuthController::register');
$routes->post('register', 'AuthController::registerProcess');
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::loginProcess');
$routes->get('logout', 'AuthController::logout');

// Register
$routes->get('/register', 'RegisterController::index');
$routes->post('register/register', 'RegisterController::register');
$routes->get('/forgot-password', 'RegisterController::viewFPass');

// Dashboard
$routes->get('/dashboard', 'DashController::index');

$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
    // Master Menu
    $routes->get('master-menu', 'MasterMenu::index');
    $routes->get('view-add-master-menu', 'MasterMenu::indexAdd');
    $routes->get('get-master-menu/(:num)', 'MasterMenu::getById/$1');
    $routes->post('add-master-menu', 'MasterMenu::store');
    $routes->post('delete-master-menu', 'MasterMenu::delete');

    // Master Group User
    $routes->get('master-group-user', 'MasterGroupUser::index');
    $routes->get('view-add-master-group-user', 'MasterGroupUser::indexAdd');
    $routes->get('get-master-group-user/(:num)', 'MasterGroupUser::getById/$1');
    $routes->post('add-master-group-user', 'MasterGroupUser::store');
    $routes->post('delete-master-group-user', 'MasterGroupUser::delete');

    // Users
    $routes->get('users', 'UserController::index');
    $routes->get('users/create', 'UserController::create');
    $routes->post('users/store', 'UserController::store');
    $routes->get('users/edit/(:num)', 'UserController::edit/$1');
    $routes->post('users/update/(:num)', 'UserController::update/$1');
    $routes->get('users/delete/(:num)', 'UserController::delete/$1');

    // Prodi
    $routes->get('prodi', 'ProdiController::index');
    $routes->get('prodi/create', 'ProdiController::create');
    $routes->post('prodi/store', 'ProdiController::store');
    $routes->get('prodi/edit/(:num)', 'ProdiController::edit/$1');
    $routes->post('prodi/update/(:num)', 'ProdiController::update/$1');
    $routes->get('prodi/delete/(:num)', 'ProdiController::delete/$1');

    // Master Matkul
    $routes->get('master-matkul', 'MasterMatkul::index');
    $routes->get('view-add-master-matkul', 'MasterMatkul::indexAdd');
    $routes->get('get-master-matkul/(:num)', 'MasterMatkul::getById/$1');
    $routes->post('add-master-matkul', 'MasterMatkul::store');
    $routes->post('delete-master-matkul', 'MasterMatkul::delete');
});

// Profile
$routes->get('/editprofile/(:any)', 'Profile::indexEdit/$1');
$routes->post('/edit-profile', 'Profile::updateProfile');
$routes->post('/edit-email', 'Profile::updateEmail');
$routes->post('/edit-password', 'Profile::updatePassword');

// Form Pendaftaran
// $routes->get('/list-pendaftaran', 'ListController::index');

$routes->group('aplikan', ['namespace' => 'App\Controllers\Aplikan'], function ($routes) {
    // Form Pendaftaran
    $routes->get('form-pendaftaran', 'FormPendaftaran::index');
    $routes->post('add-form', 'FormPendaftaran::store');
    // $routes->get('/view-add-pelatihan', 'FormPendaftaran::indexAdd');
});