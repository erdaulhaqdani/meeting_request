<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');

$routes->get('/', 'Pages::index');

$routes->get('/pages/profil', 'Pages::profil');
$routes->get('/pages/faq', 'Pages::faq');
$routes->get('/pages/permohonan_info', 'Landing_page::viewPermohonan');

$routes->get('/frontend/register_cust', 'Frontend::register_cust');
$routes->get('/frontend/login_cust', 'Frontend::login_cust');
$routes->get('/login_cust', 'Frontend::login_cust');
$routes->get('/register_cust', 'Frontend::register_cust');
$routes->get('/reset_pw/(:any)', 'Frontend::reset_pw_cust/$1');
$routes->get('/login_cust/(:any)', 'AuthCust::VerifikasiAkun/$1');
$routes->get('/dashboard_cust', 'Backend::dashboard_cust');
$routes->get('/dashboard_petugas', 'Backend::dashboard_petugas');
$routes->get('/logout_cust', 'AuthCust::logout');

$routes->get('/frontend/register_petugas', 'Frontend::register_petugas');
$routes->get('/frontend/login_petugas', 'Frontend::login_petugas');
$routes->get('/login_petugas', 'Frontend::login_petugas');
$routes->get('/register_petugas', 'Frontend::register_petugas');
$routes->get('/dashboard_admin_landing', 'Backend::dashboard_admin_landing');
$routes->get('/logout_petugas', 'AuthPetugas::logout');

//Pengaduan Online
$routes->get('/Pengaduan_online/profile', 'Pengaduan_online::profile');
$routes->get('/Pengaduan_online/daftar/(:any)', 'Pengaduan_online::daftar/$1');
$routes->get('/Pengaduan_online', 'Pengaduan_online::index');
$routes->get('/Pengaduan_online/form', 'Pengaduan_online::form');
$routes->get('/delete/(:num)', 'Pengaduan_online::delete/$1');
$routes->get('/Pengaduan_online/input', 'Pengaduan_online::input');
$routes->get('/Pengaduan_online/update/(:num)', 'Pengaduan_online::update/$1');
$routes->get('/Pengaduan_online/cancel/(:num)', 'Pengaduan_online::cancel/$1');
$routes->get('/Pengaduan_online/detail/(:num)', 'Pengaduan_online::detail/$1');
$routes->get('/Pengaduan_online/bukti/(:num)', 'Pengaduan_online::bukti/$1');
$routes->get('/Pengaduan_online/edit/(:num)', 'Pengaduan_online::edit/$1');
$routes->get('/Pengaduan_online/tanggapan/(:num)', 'Pengaduan_online::edit/$1');
$routes->get('/Pengaduan_online/rating/(:num)', 'Pengaduan_online::rating/$1');

//Meeting Request
$routes->get('/Meeting_request', 'Meeting_request::index');
$routes->get('/Meeting_request/form', 'Meeting_request::form');
$routes->get('/Meeting_request/input', 'Meeting_request::input');
$routes->get('/Meeting_request/cancel/(:num)', 'Meeting_request::cancel/$1');
$routes->get('/Meeting_request/detail/(:num)', 'Meeting_request::detail/$1');
$routes->get('/Meeting_request/edit/(:num)', 'Meeting_request::edit/$1');
$routes->get('/Meeting_request/rating/(:num)', 'Meeting_request::rating/$1');

//Admin Landing_page
$routes->get('/Landing_page', 'Landing_page::index');
$routes->get('/Landing_page/form', 'Landing_page::form');
$routes->get('/Landing_page/input', 'Landing_page::input');
$routes->get('/Landing_page/publik/(:num)', 'Landing_page::publik/$1');
$routes->get('/Landing_page/arsip/(:num)', 'Landing_page::arsip/$1');
$routes->get('/Landing_page/publik_dashboard/(:num)', 'Landing_page::publik_dashboard/$1');
$routes->get('/Landing_page/arsip_dashboard/(:num)', 'Landing_page::arsip_dashboard/$1');
$routes->get('/Landing_page/edit/(:num)', 'Landing_page::edit/$1');
$routes->get('/Landing_page/update/(:num)', 'Landing_page::update/$1');
$routes->get('/Landing_page/permohonanInfo/(:num)', 'Landing_page::editPermohonan/$1');
$routes->get('/Landing_page/updatePermohonan/(:num)', 'Landing_page::updatePermohonan/$1');

//Admin Landing Page Kelola Petugas
$routes->get('/KelolaPegawai/form_pegawai', 'KelolaPegawai::form_pegawai');
$routes->get('/KelolaPegawai/input_pegawai', 'KelolaPegawai::input_pegawai');
$routes->get('/KelolaPegawai/daftar_pegawai', 'KelolaPegawai::daftar_pegawai');
$routes->get('/KelolaPegawai/edit_pegawai/(:num)', 'KelolaPegawai::edit_pegawai/$1');
$routes->get('/KelolaPegawai/detail_pegawai/(:num)', 'KelolaPegawai::edit_pegawai/$1');
$routes->get('/KelolaPegawai/update_pegawai/(:num)', 'KelolaPegawai::update_pegawai/$1');

//Admin Landing Page Kelola Customer
$routes->get('/daftar_customer', 'Landing_page::daftar_customer');
$routes->get('/detail_customer/(:num)', 'Landing_page::detail_customer/$1');
$routes->get('/verifikasi_customer/(:num)', 'Landing_page::verifikasiAkun/$1');

//Admin Landing Page Kelola Pegawai
$routes->get('/Landing_page/form_petugas', 'Landing_page::form_petugas');
$routes->get('/Landing_page/input_petugas', 'Landing_page::input_petugas');
$routes->get('/Landing_page/daftar_petugas', 'Landing_page::daftar_petugas');
$routes->get('/Landing_page/detail_petugas/*', 'Landing_page::detail_petugas/$1');
$routes->get('/Landing_page/edit_petugas/*', 'Landing_page::edit_petugas/$1');
$routes->get('/Landing_page/update_petugas/*', 'Landing_page::update_petugas/$1');

//Admin Landing Page Kelola Agenda
$routes->get('/Landing_page/form_agenda', 'Landing_page::form_agenda');
$routes->get('/Landing_page/input_agenda', 'Landing_page::input_agenda');
$routes->get('/Landing_page/daftar_agenda', 'Landing_page::daftar_agenda');
$routes->get('/Landing_page/edit_agenda/(:num)', 'Landing_page::edit_agenda/$1');
$routes->get('/Landing_page/update_agenda/(:num)', 'Landing_page::update_agenda/$1');
$routes->get('/Landing_page/hapus_gambar/(:num)', 'Landing_page::hapus_gambar/$1');

//Pencarian Informasi Landing Page
$routes->get('/pages/pencarian', 'Pages::pencarian');
$routes->get('/pages/detail_info/(:num)/(:any)', 'Pages::detail_pencarian/$1/$2');

$routes->get('/pages/artikel_grid', 'Landing_page::artikel_grid');
$routes->get('/Landing_page/artikel_grid', 'Landing_page::artikel_grid');
$routes->get('/pages/detail_artikel/(:num)', 'Landing_page::detail_artikel/$1');
$routes->get('/pages/berita_grid', 'Landing_page::berita_grid');
$routes->get('/pages/detail_berita/(:num)', 'Landing_page::detail_berita/$1');
$routes->get('/pages/pengumuman_grid', 'Landing_page::pengumuman_grid');
$routes->get('/pages/detail_pengumuman/(:num)', 'Landing_page::detail_pengumuman/$1');
$routes->get('/pages/peristiwa_grid', 'Landing_page::peristiwa_grid');
$routes->get('/pages/detail_peristiwa/(:num)', 'Landing_page::detail_peristiwa/$1');
$routes->get('/pages/agenda_grid', 'Landing_page::agenda_grid');
$routes->get('/pages/detail_agenda/(:num)', 'Landing_page::detail_agenda/$1');

// Admin Pengaduan Online
$routes->get('/admin', 'Admin_pengaduan::index');
$routes->get('/admin/profile', 'Admin_pengaduan::profile');
$routes->get('/admin/daftar/(:any)', 'Admin_pengaduan::daftar/$1');
$routes->get('/admin/tanggapan/(:num)', 'Admin_pengaduan::tanggapan/$1');

// $routes->get('/admin/input', 'Admin_pengaduan::input');
$routes->get('/admin/proses/(:num)', 'Admin_pengaduan::proses/$1');
$routes->get('/admin/detail/(:num)', 'Admin_pengaduan::detail/$1');

//Petugas Meeting Reqeust
$routes->get('/petugasMR', 'Petugas_MR::index');
$routes->get('/petugasMR/tanggapan/(:num)', 'Petugas_MR::tanggapan/$1');
$routes->get('/petugasMR/proses/(:num)', 'Petugas_MR::proses/$1');
$routes->get('/petugasMR/detail/(:num)', 'Petugas_MR::detail/$1');
$routes->get('/petugasMR/edit/(:num)', 'Petugas_MR::edit/$1');
$routes->get('/petugasMR/update/(:num)', 'Petugas_MR::update/$1');
$routes->get('/petugasMR/inputTanggapan', 'Petugas_MR::input');
$routes->get('/petugasMR/input_tandaTerima', 'Petugas_MR::input_tandaTerima');
$routes->get('/petugasMR/form_tandaTerima', 'Petugas_MR::form_tandaTerima');
$routes->get('/petugasMR/daftar_tandaTerima', 'Petugas_MR::daftar_tandaTerima');
$routes->get('/petugasMR/hapus_tandaTerima/(:num)', 'Petugas_MR::delete_tandaTerima/$1');
$routes->get('/petugasMR/edit_tandaTerima/(:num)', 'Petugas_MR::edit_tandaTerima/$1');
$routes->get('/petugasMR/cetak_tandaTerima/(:num)', 'Petugas_MR::cetak_tandaTerima/$1');

//Download Form Permohonan Info
$routes->get('pages/Landing_page/downloadPI/(:num)', 'Landing_page::downloadPI/$1');
$routes->get('pages/Landing_page/downloadKI/(:num)', 'Landing_page::downloadKI/$1');


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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
