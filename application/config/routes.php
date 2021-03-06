<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
// Login
$route['default_controller'] = 'admin_login';
$route['login']['POST'] = 'admin_login/adminAction';
$route['dashboard'] = 'admin_login/index_admin_dashboard';

// Logout
$route['logout'] = 'Admin_logout';

// Wisata
$route['wisata_admin'] = 'admin/wisata_admin';
$route['tambah_wisata_admin'] = 'admin/tambah_wisata_admin';
$route['post_wisata_admin'] = 'admin/tambah_wisata_admin/tambahDataWisata';
$route['hapus_wisata_admin/(:any)'] = 'admin/wisata_admin/hapusWisataAdmin/$1';
$route['edit_wisata_admin/(:any)'] = 'admin/edit_wisata_admin/index/$1';
$route['update_wisata_admin'] = 'admin/edit_wisata_admin/updateWisataAdmin';
$route['detail_wisata/(:any)'] = 'admin/detail_wisata/index/$1';
$route['tambah_detail_wisata'] = 'admin/detail_wisata/insertFasilitas';

// Foto Wisata
$route['foto_wisata_admin/(:any)'] = 'admin/foto_wisata_admin/index/$1';
$route['post_foto_wisata_admin/(:any)'] = 'admin/foto_wisata_admin/insertPhoto/$1';
$route['v_upload'] = 'upload';

// Kota / Kabupaten
$route['kabupaten_admin'] = 'admin/kabupaten_admin';
$route['tambah_kabupaten_admin'] = 'admin/tambah_kabupaten_admin';
$route['post_kabupaten_admin'] = 'admin/tambah_kabupaten_admin/tambahDataKabupaten';
$route['hapus_kabupaten_admin/(:any)'] = 'admin/kabupaten_admin/hapusKabupatenAdmin/$1';
$route['edit_kabupaten_admin/(:any)'] = 'admin/edit_kabupaten_admin/index/$1';
$route['update_kabupaten_admin'] = 'admin/edit_kabupaten_admin/updateKabupatenAdmin';

// Kecamatan
$route['kecamatan_admin'] = 'admin/kecamatan_admin';
$route['tambah_kecamatan_admin'] = 'admin/tambah_kecamatan_admin';
$route['post_kecamatan_admin'] = 'admin/tambah_kecamatan_admin/tambahDataKecamatan';
$route['hapus_kecamatan_admin/(:any)'] = 'admin/kecamatan_admin/hapusKecamatanAdmin/$1';
$route['edit_kecamatan_admin/(:any)'] = 'admin/edit_kecamatan_admin/index/$1';

// Kelurahan
$route['kelurahan_admin'] = 'admin/kelurahan_admin';
$route['tambah_kelurahan_admin'] = 'admin/tambah_kelurahan_admin';
$route['post_kelurahan_admin'] = 'admin/tambah_kelurahan_admin/tambahDataKelurahan';

// API WISATA
$route['api/kecamatan/(:any)'] = 'admin/tambah_wisata_admin/getKecamatan/$1';
$route['api/kelurahan/(:any)'] = 'admin/tambah_wisata_admin/getKelurahan/$1';

// Export
$route['excel_wisata_admin'] = 'admin/wisata_admin/exportExcel';
$route['pdf_wisata_admin'] = 'admin/wisata_admin/exportPdf';

// default
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// $route['validation'] = 'admin_login';