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
// $routes->get('cek-role-by-email', 'AuthController::cekRoleByEmail');
$routes->post('forgot-password', 'AuthController::forgotPassword');
$routes->post('reset-password', 'AuthController::resetPassword');

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
    //Validasi Aplikan
    $routes->get('validasi-aplikan', 'ValidasiAplikanController::index');
    $routes->get('validasi-aplikan/table', 'ValidasiAplikanController::getTable');
    $routes->get('validasi-aplikan/approve/(:num)', 'ValidasiAplikanController::approveAplikan/$1');

    // Users
    $routes->get('users', 'UserController::index');
    $routes->get('users/table', 'UserController::getTable');
    $routes->get('users/create', 'UserController::create');
    $routes->post('users/store', 'UserController::store');
    $routes->get('users/edit/(:num)', 'UserController::edit/$1');
    $routes->post('users/update/(:num)', 'UserController::update/$1');
    $routes->get('users/delete/(:num)', 'UserController::delete/$1');
    $routes->get('users/deactivate/(:num)', 'UserController::deactivate/$1');

    // Prodi
    $routes->get('prodi', 'ProdiController::index');
    $routes->get('prodi/table', 'ProdiController::getTable');
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
    $routes->get('mata-kuliah/table', 'MataKuliahController::getTable');
    $routes->get('mata-kuliah/create', 'MataKuliahController::create');
    $routes->post('mata-kuliah/store', 'MataKuliahController::store');
    $routes->get('mata-kuliah/edit/(:num)', 'MataKuliahController::edit/$1');
    $routes->post('mata-kuliah/update/(:num)', 'MataKuliahController::update/$1');
    $routes->get('mata-kuliah/delete/(:num)', 'MataKuliahController::delete/$1');

    // Kurikulum
    $routes->get('kurikulum', 'KurikulumController::index');
    $routes->get('kurikulum/table', 'KurikulumController::getTable');
    $routes->get('kurikulum/create', 'KurikulumController::create');
    $routes->post('kurikulum/store', 'KurikulumController::store');
    $routes->get('kurikulum/edit/(:num)', 'KurikulumController::edit/$1');
    $routes->post('kurikulum/update/(:num)', 'KurikulumController::update/$1');
    $routes->get('kurikulum/delete/(:num)', 'KurikulumController::delete/$1');

    // Asesmen
    $routes->get('capaian-rpl', 'CapaianRPLController::index');
    $routes->get('capaian-rpl/table', 'CapaianRPLController::getTable');
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

    //step Piagam
    $routes->post('pendaftaran/saveStepPiagam', 'PendaftaranController::saveStepPiagam');
    $routes->get('pendaftaran/deletePiagam/(:num)', 'PendaftaranController::deletePiagam/$1');

    //step Seminar
    $routes->post('pendaftaran/saveStepSeminar', 'PendaftaranController::saveStepSeminar');
    $routes->get('pendaftaran/deleteSeminar/(:num)', 'PendaftaranController::deleteSeminar/$1');

    //step Organisasi
    $routes->post('pendaftaran/saveStepOrganisasi', 'PendaftaranController::saveStepOrganisasi');
    $routes->get('pendaftaran/deleteOrganisasi/(:num)', 'PendaftaranController::deleteOrganisasi/$1');

    //step 3
    $routes->get('pendaftaran/step3', 'PendaftaranController::step3');
    $routes->post('pendaftaran/saveStep3', 'PendaftaranController::saveStep3');
    $routes->get('pendaftaran/deleteRiwayatKerja/(:num)', 'PendaftaranController::deleteRiwayatKerja/$1');

    //step 4
    $routes->get('pendaftaran/step4', 'PendaftaranController::step4');
    $routes->post('pendaftaran/saveStep4', 'PendaftaranController::saveStep4');

    //asesmen mandiri
    $routes->get('pendaftaran/asesmen-mandiri', 'PendaftaranController::asesmenMandiri');
    $routes->post('pendaftaran/store-asesmen-mandiri', 'PendaftaranController::storeAsesmenMandiri');


    //update konfirmasi step
    $routes->get('update-konfirmasi-step/(:segment)/(:any)', 'PendaftaranController::updateKonfirmasiStep/$1/$2');

    //tentang RPL
    $routes->get('tentang-rpl', 'TentangRPL::index');

    //detail pendaftaran
    $routes->get('detail-pendaftaran', 'DetailPendaftaranController::index');
    $routes->get('get-asesmen/(:any)', 'DetailPendaftaranController::getViewAsesmenKurikulum/$1');

    //check pendaftaran
    $routes->get('cek-step', 'PendaftaranController::cekStep');

    $routes->get('generate-pdf', 'DetailPendaftaranController::getViewAsesmenPdf');
});

// Bagian Kaprodi
$routes->group('kaprodi', ['namespace' => 'App\Controllers\Kaprodi', 'filter' => 'auth:kaprodi'], function ($routes) {
    //View Kurikulum
    $routes->get('kurikulum', 'KurikulumController::index');

    // Assign Asesor
    $routes->get('data-pendaftaran', 'DataPendaftaranController::index');
    $routes->get('data-pendaftaran/table', 'DataPendaftaranController::getTable');
    $routes->get('data-pendaftaran/detail/(:any)', 'DataPendaftaranController::viewDetail/$1');
    $routes->post('data-pendaftaran/assign-asesor', 'DataPendaftaranController::assignAsesor');

    // Data Approved
    $routes->get('data-approved', 'ApprovalController::index');

    // Asesmen
    $routes->get('get-asesmen/(:any)', 'KurikulumController::getAsesmen/$1');
});

// Bagian Asesor
$routes->group('asesor', ['namespace' => 'App\Controllers\Asesor', 'filter' => 'auth:asesor'], function ($routes) {
    // Data Pendaftaran
    $routes->get('data-pendaftaran', 'DataPendaftaranController::index');
    $routes->get('view-detail-pendaftaran/(:any)', 'DataPendaftaranController::viewDetail/$1');
    $routes->get('approve-pendaftaran/(:any)', 'DataPendaftaranController::approvePendaftaran/$1');
    $routes->get('get-matkul', 'DataPendaftaranController::getMatkulByTahun');
    $routes->post('approve-rpl', 'AsesorController::approveRpl');
    $routes->get('approve-nilai', 'AsesorController::viewApprove');

    // Asesmen Per Matakuliah
    $routes->get('get-asesmen-matakuliah/(:any)', 'DataPendaftaranController::getAsesmen/$1');

    // Laporan
    $routes->get('laporan-rpl', 'DataLaporanRplController::index');
    $routes->get('filter', 'DataLaporanRplController::filterData');
    $routes->get('laporan-hasil-approve/(:any)', 'DataLaporanRplController::viewDetail/$1');

    // Asesmen
    $routes->get('get-asesmen/(:any)', 'DataLaporanRplController::getViewAsesmenKurikulum/$1');
    $routes->get('generate-pdf/(:any)', 'DataLaporanRplController::getViewAsesmenPdf/$1');
});

$routes->get('unauthorized', function () {
    return view('errors/custom_unauthorized');
});
