<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// route pengelolaan login
$routes->get('/halaman_login', 'Login::halaman_login', ['filter' => 'khususTamu']);
$routes->post('/login', 'Login::login');
$routes->get('/logout', 'Login::logout');

// route pengelolaan dashboard
$routes->get('/', 'Dashboard::index', ['filter' => 'khususTamu']);
$routes->get('/dashboard', 'Dashboard::dashboard');
$routes->get('/bacaberita/(:num)', 'Dashboard::bacaberita/$1', ['filter' => 'khususTamu']);
$routes->get('/daftar_baca_berita', 'Dashboard::daftar_baca_berita', ['filter' => 'khususTamu']);

// route pengelolaan profile
$routes->get('/profile', 'Profile::profile');
$routes->get('/edit_profil/(:num)', 'Profile::edit_profile/$1');
$routes->post('/update_profil', 'Profile::update_profile');
$routes->get('/lupa_password', 'Profile::lupa_password', ['filter' => 'khususTamu']);
$routes->post('/cek_email', 'Profile::cek_email', ['filter' => 'khususTamu']);
$routes->get('/profil/update_password/(:any)', 'Profile::update_password/$1', ['filter' => 'khususTamu']);
$routes->post('/profil/save_update_password/(:num)', 'Profile::save_update_password/$1', ['filter' => 'khususTamu']);

// route pengelolaan users
$routes->get('/users', 'Users::daftar_user');
$routes->post('/users/tambah_users', 'Users::tambah_user');
$routes->get('/users/edit_users/(:num)', 'Users::edit_user/$1');
$routes->post('/users/update_users', 'Users::update_user');
$routes->delete('/users/delete_users/(:num)', 'Users::delete_user/$1');

// routes pengelolaan konten
$routes->get('/konten', 'Konten::daftar_konten');
$routes->post('/konten/tambah_konten', 'Konten::tambah_konten');
$routes->get('/konten/edit_konten/(:num)', 'Konten::edit_konten/$1');
$routes->post('/konten/update_konten', 'Konten::update_konten');
$routes->delete('/konten/delete_konten/(:num)', 'Konten::delete_konten/$1');

// route pengelolaan pegawai desa
$routes->get('/pegawai_desa', 'PegawaiDesa::daftar_pegawai_desa');
$routes->post('/pegawai_desa/tambah_pegawai_desa', 'PegawaiDesa::tambah_pegawai_desa');
$routes->get('/pegawai_desa/edit_pegawai_desa/(:num)', 'PegawaiDesa::edit_pegawai_desa/$1');
$routes->post('/pegawai_desa/update_pegawai_desa', 'PegawaiDesa::update_pegawai_desa');
$routes->delete('/pegawai_desa/delete_pegawai_desa/(:num)', 'PegawaiDesa::delete_pegawai_desa/$1');
$routes->get('/pegawai_desa/export_pegawai_desa', 'PegawaiDesa::export_pegawai_desa');

// route pengelolaan ketua rw
$routes->get('/rw', 'Rw::daftar_rw');
$routes->post('/rw/tambah_rw', 'Rw::tambah_rw');
$routes->get('/rw/edit_rw/(:num)', 'Rw::edit_rw/$1');
$routes->post('/rw/update_rw', 'Rw::update_rw');
$routes->delete('/rw/delete_rw/(:num)', 'Rw::delete_rw/$1');
$routes->get('/rw/export_rw', 'Rw::export_rw');

// route pengelolaan ketua rt
$routes->get('/rt', 'Rt::daftar_rt');
$routes->post('/rt/tambah_rt', 'Rt::tambah_rt');
$routes->get('/rt/edit_rt/(:num)', 'Rt::edit_rt/$1');
$routes->post('/rt/update_rt', 'Rt::update_rt');
$routes->delete('/rt/delete_rt/(:num)', 'Rt::delete_rt/$1');
$routes->get('/rt/export_rt', 'Rt::export_rt');

// route pengelolaan anggota pkk
$routes->get('/anggota_pkk', 'AnggotaPkk::daftar_anggota_pkk');
$routes->post('/anggota_pkk/tambah_anggota_pkk', 'AnggotaPkk::tambah_anggota_pkk');
$routes->get('/anggota_pkk/edit_anggota_pkk/(:num)', 'AnggotaPkk::edit_anggota_pkk/$1');
$routes->post('/anggota_pkk/update_anggota_pkk', 'AnggotaPkk::update_anggota_pkk');
$routes->delete('/anggota_pkk/delete_anggota_pkk/(:num)', 'AnggotaPkk::delete_anggota_pkk/$1');
$routes->get('/anggota_pkk/export_anggota_pkk', 'AnggotaPkk::export_anggota_pkk');

// route pengelolaan anggota bumdes
$routes->get('/anggota_bumdes', 'AnggotaBumdes::daftar_anggota_bumdes');
$routes->post('/anggota_bumdes/tambah_anggota_bumdes', 'AnggotaBumdes::tambah_anggota_bumdes');
$routes->get('/anggota_bumdes/edit_anggota_bumdes/(:num)', 'AnggotaBumdes::edit_anggota_bumdes/$1');
$routes->post('/anggota_bumdes/update_anggota_bumdes', 'AnggotaBumdes::update_anggota_bumdes');
$routes->delete('/anggota_bumdes/delete_anggota_bumdes/(:num)', 'AnggotaBumdes::delete_anggota_bumdes/$1');
$routes->get('/anggota_bumdes/export_anggota_bumdes', 'AnggotaBumdes::export_anggota_bumdes');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
