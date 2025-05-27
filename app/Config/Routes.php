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
$routes->get('forgot-password', 'AuthController::viewForgotPassword');
$routes->post('forgot-password', 'AuthController::forgotPassword');

// Dashboard
$routes->get('/dashboard', 'DashController::index');

// Profile
$routes->get('/editprofile', 'Profile::indexEdit');
$routes->post('/edit-profile', 'Profile::update');

// Edit Email
$routes->get('/edit-email', 'Profile::viewEditEmail');
$routes->post('/edit-email', 'Profile::updateEmail');

// Edit Password
$routes->get('/edit-password', 'Profile::viewEditPassword');
$routes->post('/edit-password', 'Profile::updatePassword');

// Bagian Admin
$routes->group('admin', ['namespace' => 'App\Controllers\Admin', 'filter' => 'auth:admin'], function ($routes) {
    // Users
    $routes->get('users', 'UserController::index');
    $routes->get('users/create', 'UserController::create');
    $routes->post('users/store', 'UserController::store');
    $routes->get('users/edit/(:num)', 'UserController::edit/$1');
    $routes->post('users/update/(:num)', 'UserController::update/$1');
    $routes->get('users/delete/(:num)', 'UserController::delete/$1');
    $routes->get('users/deactivate/(:num)', 'UserController::deactivate/$1');

    // Prodi
    $routes->get('prodi', 'ProdiController::index');
    $routes->get('prodi/create', 'ProdiController::create');
    $routes->post('prodi/store', 'ProdiController::store');
    $routes->get('prodi/edit/(:num)', 'ProdiController::edit/$1');
    $routes->post('prodi/update/(:num)', 'ProdiController::update/$1');
    $routes->get('prodi/delete/(:num)', 'ProdiController::delete/$1');

    // Tahun Ajar
    $routes->get('tahun-ajar', 'TahunAjarController::index');
    $routes->get('tahun-ajar/create', 'TahunAjarController::create');
    $routes->post('tahun-ajar/store', 'TahunAjarController::store');
    $routes->get('tahun-ajar/edit/(:num)', 'TahunAjarController::edit/$1');
    $routes->post('tahun-ajar/update/(:num)', 'TahunAjarController::update/$1');
    $routes->get('tahun-ajar/delete/(:num)', 'TahunAjarController::delete/$1');

    // Mata Kuliah
    $routes->get('mata-kuliah', 'MataKuliahController::index');
    $routes->get('mata-kuliah/create', 'MataKuliahController::create');
    $routes->post('mata-kuliah/store', 'MataKuliahController::store');
    $routes->get('mata-kuliah/edit/(:num)', 'MataKuliahController::edit/$1');
    $routes->post('mata-kuliah/update/(:num)', 'MataKuliahController::update/$1');
    $routes->get('mata-kuliah/delete/(:num)', 'MataKuliahController::delete/$1');

    // Kurikulum
    $routes->get('kurikulum', 'KurikulumController::index');
    $routes->get('kurikulum/create', 'KurikulumController::create');
    $routes->post('kurikulum/store', 'KurikulumController::store');
    $routes->get('kurikulum/edit/(:num)', 'KurikulumController::edit/$1');
    $routes->post('kurikulum/update/(:num)', 'KurikulumController::update/$1');
    $routes->get('kurikulum/delete/(:num)', 'KurikulumController::delete/$1');

    // Asesmen
    $routes->get('capaian-rpl', 'CapaianRPLController::index');
    $routes->get('capaian-rpl/create', 'CapaianRPLController::create');
    $routes->post('capaian-rpl/store', 'CapaianRPLController::store');
    $routes->get('capaian-rpl/edit/(:num)', 'CapaianRPLController::edit/$1');
    $routes->post('capaian-rpl/update/(:num)', 'CapaianRPLController::update/$1');
    $routes->get('capaian-rpl/delete/(:num)', 'CapaianRPLController::delete/$1');
});

// Bagian Aplikan
$routes->group('aplikan', ['namespace' => 'App\Controllers\Aplikan', 'filter' => 'auth:aplikan'], function ($routes) {
    // Status Pendaftaran
    $routes->get('status-pendaftaran', 'PendaftaranController::statusPendaftaran');

    //step 1
    $routes->get('pendaftaran/step1', 'PendaftaranController::step1');
    $routes->post('pendaftaran/saveStep1', 'PendaftaranController::saveStep1');

    //step 2
    $routes->get('pendaftaran/step2', 'PendaftaranController::step2');
    $routes->post('pendaftaran/saveStep2', 'PendaftaranController::saveStep2');
    $routes->get('pendaftaran/deletePelatihan/(:num)', 'PendaftaranController::deletePelatihan/$1');

    //step 3
    $routes->get('pendaftaran/step3', 'PendaftaranController::step3');
    $routes->post('pendaftaran/saveStep3', 'PendaftaranController::saveStep3');

    //step 4
    $routes->get('pendaftaran/step4', 'PendaftaranController::step4');
    $routes->post('pendaftaran/saveStep4', 'PendaftaranController::saveStep4');

    //update konfirmasi step
    $routes->get('update-konfirmasi-step/(:segment)/(:any)', 'PendaftaranController::updateKonfirmasiStep/$1/$2');

    //tentang RPL
    $routes->get('tentang-rpl', 'TentangRPL::index');

    //check pendaftaran
    $routes->get('check-pendaftaran', 'PendaftaranController::checkPendaftaran');
});

// Bagian Kaprodi
$routes->group('kaprodi', ['namespace' => 'App\Controllers\Kaprodi', 'filter' => 'auth'], function ($routes) {
    //View Kurikulum
    $routes->get('kurikulum', 'KurikulumController::index');
    // Assign Asesor
    $routes->get('data-pendaftaran', 'DataPendaftaranController::index');
    $routes->get('data-pendaftaran/detail/(:any)', 'DataPendaftaranController::viewDetail/$1');
    $routes->post('data-pendaftaran/assign-asesor', 'DataPendaftaranController::assignAsesor');

    // Data Approved
    $routes->get('data-approved', 'ApprovalController::index');

    // Asesmen
    $routes->get('get-asesmen/(:any)', 'KurikulumController::getAsesmen/$1');
});

// Bagian Asesor
$routes->group('asesor', ['namespace' => 'App\Controllers\Asesor', 'filter' => 'auth'], function ($routes) {
    // Data Pendaftaran
    $routes->get('data-pendaftaran', 'DataPendaftaranController::index');
    $routes->get('view-detail-pendaftaran/(:any)', 'DataPendaftaranController::viewDetail/$1');
    $routes->get('approve-pendaftaran/(:any)', 'DataPendaftaranController::approvePendaftaran/$1');
    $routes->get('get-matkul/(:any)', 'DataPendaftaranController::getMatkulByTahun/$1');
    $routes->post('approve-rpl', 'AsesorController::approveRpl');
    $routes->get('approve-nilai', 'AsesorController::viewApprove');

    // Data Approved
    $routes->get('data-approved', 'DataApprovedController::index');
    $routes->get('view-detail-approved/(:any)', 'DataApprovedController::viewDetail/$1');

    // Data Not Approved
    $routes->get('data-not-approved', 'DataNotApprovedController::index');
    $routes->get('view-detail-not-approved/(:any)', 'DataNotApprovedController::viewDetail/$1');
    
    // Laporan
    $routes->get('laporan-rpl', 'DataLaporanRplController::index');


});

$routes->get('unauthorized', function () {
    return view('errors/custom_unauthorized');
});
