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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/dashboard', 'Admin\Dashboard::index', ['filter' => 'role:admin']);
$routes->get('/data-pengguna', 'Admin\Pengguna::index', ['filter' => 'role:admin']);
$routes->get('/data-pengguna/(:any)', 'Admin\Pengguna::edit/$1', ['filter' => 'role:admin']);
$routes->get('/data-armada', 'Admin\Armada::index', ['filter' => 'role:admin']);
$routes->get('/tambah-armada', 'Admin\Armada::tambah', ['filter' => 'role:admin']);
$routes->get('/data-armada/(:any)', 'Admin\Armada::edit/$1', ['filter' => 'role:admin']);
$routes->get('/pembayaran', 'Admin\Pembayaran::index', ['filter' => 'role:admin']);
$routes->get('/driver', 'Admin\Driver::index', ['filter' => 'role:admin']);
$routes->get('/laporan', 'Admin\Laporan::index', ['filter' => 'role:admin']);

$routes->get('/data-transaksi', 'Admin\Transaksi::index', ['filter' => 'role:admin']);
$routes->get('/data-transaksi/(:any)', 'Admin\Transaksi::detail/$1', ['filter' => 'role:admin']);
$routes->get('/proses-transaksi', 'Admin\Transaksi::proses', ['filter' => 'role:admin']);
$routes->get('/rent-transaksi', 'Admin\Transaksi::rent', ['filter' => 'role:admin']);
$routes->get('/success-transaksi', 'Admin\Transaksi::success', ['filter' => 'role:admin']);
$routes->get('/cancelled-transaksi', 'Admin\Transaksi::cancel', ['filter' => 'role:admin']);

$routes->get('/', 'User\Home::checkUser');
$routes->get('/home', 'User\Home::index');
$routes->get('/about-us', 'User\About::index');
$routes->get('/contact-us', 'User\Contact::index');
$routes->get('/catalog', 'User\Catalog::index');
$routes->get('/detail-catalog/(:any)', 'User\Catalog::detail/$1');
$routes->get('/pemesanan', 'User\Pemesanan::index', ['filter' => 'role:user']);
$routes->get('/riwayat-pemesanan', 'User\Pemesanan::riwayat', ['filter' => 'role:user']);
$routes->get('/riwayat-pemesanan/(:any)', 'User\Pemesanan::detail/$1', ['filter' => 'role:user']);
$routes->get('/pembatalan-pesanan/(:any)', 'User\Pemesanan::batal/$1', ['filter' => 'role:user']);


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
