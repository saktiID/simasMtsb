<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'auth';
$route['404_override'] = 'error_404';
$route['translate_uri_dashes'] = FALSE;

$route['bukukerja'] = 'bukuKerja';
$route['bukukerja/upload'] = 'bukuKerja/upload';
$route['bukukerja/replace'] = 'bukuKerja/replace';
$route['bukukerja/upload_buku'] = 'bukuKerja/upload_buku';
$route['bukukerja/delete/(:any)/(:any)'] = 'bukuKerja/delete/$1/$2';
$route['bukukerja/download/(:any)'] = 'bukuKerja/download/$1';
$route['dataguru'] = 'dataGuru';
$route['delete/(:any)'] = 'dataGuru/deleteGuru/$1';
$route['dataguru/tambahguru'] = 'dataGuru/tambahGuru';
$route['cekbuku'] = 'cekBuku';
$route['cekbuku/setujui/(:any)/(:any)'] = 'cekBuku/setujui/$1/$2';
$route['cekbuku/tolak/(:any)/(:any)'] = 'cekBuku/tolak/$1/$2';
$route['cekbuku/detail/(:any)'] = 'cekBuku/detail/$1';
$route['cekbuku/detail/(:any)/(:any)'] = 'cekBuku/detail/$1/$2';
$route['edit/(:any)'] = 'dataGuru/editProfile/$1';
$route['edited'] = 'dataGuru/editProfileSubmited/';
$route['edit_pass'] = 'dataGuru/editPass/';
$route['personal_setting'] = 'home/personal_setting/';
$route['edit_personal'] = 'home/edit_personal/';
$route['edit_personal_pass'] = 'home/edit_personal_pass';
$route['jadwal_saya'] = 'home/jadwal_saya';
$route['simpan_jadwal'] = 'home/simpan_jadwal_saya';
$route['set_jadwal'] = 'jadwal';
$route['buku_induk_siswa'] = 'BukuIndukSiswa';
$route['buku_induk_siswa/tampil_buku_induk'] = 'bukuIndukSiswa/tampil_buku_induk';
$route['buku_induk_siswa/tambah_buku_induk'] = 'bukuIndukSiswa/tambah_buku_induk';
$route['buku_induk_siswa/hapus_buku_induk'] = 'bukuIndukSiswa/hapus_buku_induk';
$route['buku_induk_siswa/tampil_siswa_by_tahun'] = 'bukuIndukSiswa/tampil_siswa_by_tahun';
$route['buku_induk_siswa/lihat_data/(:any)'] = 'bukuIndukSiswa/lihat_data/$1';
$route['buku_induk_siswa/download/(:any)'] = 'bukuIndukSiswa/download/$1';
$route['buku_induk_siswa/upload_data_siswa'] = 'bukuIndukSiswa/upload_data_siswa';
$route['buku_induk_siswa/hapus_siswa'] = 'bukuIndukSiswa/hapus_siswa';
$route['buku_induk_siswa/ubah_data_siswa'] = 'bukuIndukSiswa/ubah_data_siswa';
$route['biodata'] = 'biodataGuru';
$route['nilai_eci'] = 'nilaiEci';
$route['nilai_eci/download'] = 'nilaiEci/download_template';
$route['nilai_eci/upload'] = 'nilaiEci/upload_nilai';
$route['nilai_eci/print'] = 'nilaiEci/print_nilai_eci';
$route['eci'] = 'qNilaiEci';
$route['eci/set_level_eci'] = 'nilaiEci/set_level_eci';
$route['eci/download'] = 'qNilaiEci/download';
$route['eci_walas'] = 'nilaiEci/eci_walas';
$route['tahfidz'] = 'tahfidz';

$route['api/siswa'] = 'API_Raport/siswa';
$route['api/guru'] = 'API_Raport/guru';
$route['api/kelas'] = 'API_Raport/kelas';
$route['api/eci'] = 'API_nilai_eci/nilai_eci';
$route['api/listlevel'] = 'API_nilai_eci/list_level';
$route['api/levelkelas'] = 'API_nilai_eci/level_in_kelas';
$route['api/tahfidz'] = 'API_tahfidz/surah_siswa';

$route['eci/fetchexcel'] = 'webExcel';
