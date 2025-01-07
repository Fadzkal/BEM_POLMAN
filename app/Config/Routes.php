<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Rute untuk halaman utama dan login
$routes->get('/', 'Home::index');  // Halaman utama
$routes->get('/login', 'Home::login');  // Login halaman umum

$routes->get('/login_admin', 'Home::login_admin');  // Login halaman admin
$routes->post('/login_admin/submit', 'LoginAdmin::submit');
$routes->get('/loginsekretaris', 'Sekretaris::loginsekretaris');
$routes->post('/loginsekretaris', 'Sekretaris::loginsekretaris');
$routes->get('app/Views/dashboardadmin/index.html', 'Sekretaris::dashboardsekretaris');
$routes->post('app/Views/dashboardadmin/index.html', 'Sekretaris::dashboardsekretaris');

// Rute untuk dashboard admin
$routes->get('/dashboardadmin', 'Home::dashboardadmin');
$routes->get('/dashboard', 'Home::dashboard');

// Rute untuk melihat dan mengelola jadwal
$routes->get('/jadwal', 'JadwalController::index');  // Untuk user biasa (lihat jadwal)
$routes->get('/jadwalcrud', 'JadwalController::adminIndex');  // Untuk admin (kelola jadwal)

// Routes CRUD untuk jadwal
$routes->get('/jadwal/create', 'JadwalController::create');  // Formulir untuk membuat jadwal
$routes->post('/jadwal/store', 'JadwalController::store');  // Menyimpan jadwal baru
$routes->get('/jadwal/edit/(:num)', 'JadwalController::edit/$1');  // Formulir untuk mengedit jadwal
$routes->post('/jadwal/update/(:num)', 'JadwalController::update/$1');  // Mengupdate jadwal berdasarkan ID
$routes->post('/jadwal/delete/(:num)', 'JadwalController::delete/$1');  // Menghapus jadwal berdasarkan ID

// Routes untuk Jadwal (login, melihat jadwal, dan manipulasi data jadwal)
$routes->get('/loginadmin', 'JadwalController::loginadmin');
$routes->post('/loginadmin', 'JadwalController::loginadmin');
$routes->get('/jadwals', 'JadwalController::index');  // Rute untuk melihat semua jadwal
$routes->get('/logout', 'JadwalController::logout');
$routes->post('/updatejadwal', 'JadwalController::updateJadwal');
$routes->post('/hapusjadwal', 'JadwalController::hapusJadwal');

// Routes terkait jadwal lainnya
$routes->get('/jadwal', 'JadwalController::index');  // Tampilkan semua jadwal
$routes->post('/jadwal/add', 'JadwalController::add');  // Tambah jadwal baru
$routes->post('/jadwal/update/(:num)', 'JadwalController::update/$1');  // Update jadwal berdasarkan ID
$routes->get('/jadwal/delete/(:num)', 'JadwalController::delete/$1');  // Hapus jadwal berdasarkan ID
$routes->get('/jadwal/export', 'JadwalController::export');  // Ekspor data jadwal
$routes->get('/jadwal/add', 'JadwalController::add');  // Form untuk tambah jadwal baru




// Routes untuk Stock (login, melihat stok, dan manipulasi barang)
$routes->get('/loginadmin', 'StockController::loginadmin');
$routes->post('/loginadmin', 'StockController::loginadmin');
$routes->get('/stocks', 'StockController::index');  // Rute untuk melihat stok
$routes->get('/logout', 'StockController::logout');
$routes->post('/updatebarang', 'StockController::updateBarang');
$routes->post('/hapusbarang', 'StockController::hapusBarang');

// Routes terkait stok lainnya
$routes->get('/stock', 'StockController::index');
$routes->post('stock/add', 'StockController::add');
$routes->post('/stock/update/(:num)', 'StockController::update/$1');
$routes->get('/stock/delete/(:num)', 'StockController::delete/$1');
$routes->get('/stock/export', 'StockController::export');
$routes->get('/stock/add', 'StockController::add');
