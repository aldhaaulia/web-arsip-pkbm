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
|	https://codeigniter.com/userguide3/general/routing.html
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

// to set default controller
// $this->set_directory("Backend");
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'Auth/C_Login';
$route['logout'] = 'Auth/C_Login/logout';
$route['auth/login/(:any)'] = 'Auth/C_Login/$1';

$route['register'] = 'Auth/C_Register';
$route['register/proses_daftar'] = 'Auth/C_Register/proses_register';
$route['register/unduh/biodata']['GET'] = 'Auth/C_Register/unduh/biodata';

$route['landing'] = 'Frontend/C_Landing';

$route['backend/home'] = 'Backend/C_Home';
$route['backend/home/(:any)'] = 'Backend/C_Home/$1';

// $this->set_directory("");
$route['backend/profile'] = 'Backend/C_Profile/index';
$route['backend/profile/(:any)'] = 'Backend/C_Profile/$1';

// Master Data

// Berkas
$route['backend/berkas'] = 'Backend/C_Berkas';
$route['backend/berkas/form'] = 'Backend/C_Berkas/index_frm_cmhs';
$route['backend/berkas/(:any)'] = 'Backend/C_Berkas/$1';
$route['backend/berkas/unduh/(:num)']['GET'] = 'Backend/C_Berkas/berkas_unduh/$1';

// Web Management
$route['backend/web_manage'] = 'Backend/C_Web_Manage';
$route['backend/web_manage/(:any)'] = 'Backend/C_Web_Manage/$1';


// Master
// $route['backend/master'] = 'Backend/C_master';
$route['backend/master/menu'] = 'Backend/Master/C_Menu';
$route['backend/master/menu/(:any)'] = 'Backend/Master/C_Menu/$1';

// Surat
// Surat Masuk
$route['backend/dokumen/masuk'] = 'Backend/Surat/C_Masuk';
// $route['backend/dokumen/masuk/(:any)'] = 'Backend/Surat/C_Masuk/$1';
$route['backend/dokumen/masuk/add'] = 'Backend/Surat/C_Masuk/add';
$route['backend/dokumen/masuk/savesurat'] = 'Backend/Surat/C_Masuk/savesurat';
$route['backend/dokumen/masuk/savelabel'] = 'Backend/Surat/C_Masuk/saveLabel';
$route['backend/dokumen/masuk/getbyid/(:any)'] = 'Backend/Surat/C_Masuk/getByid/$1';
$route['backend/dokumen/masuk/(:any)'] = 'Backend/Surat/C_Masuk/$1';


// Surat
// Surat Keluar
$route['backend/dokumen/keluar'] = 'Backend/Surat/C_Keluar';
$route['backend/dokumen/keluar/add'] = 'Backend/Surat/C_Keluar/add';
$route['backend/dokumen/keluar/savesurat'] = 'Backend/Surat/C_Keluar/savesurat';
$route['backend/dokumen/keluar/savelabel'] = 'Backend/Surat/C_Keluar/saveLabel';
$route['backend/dokumen/keluar/getbyid/(:any)'] = 'Backend/Surat/C_Keluar/getByid/$1';
$route['backend/dokumen/keluar/(:any)'] = 'Backend/Surat/C_Keluar/$1';

// Surat
// Jenis Surat
$route['getjenissurat'] = 'Backend/Surat/C_JenisSurat/get';

// Disposisi
$route['backend/disposisi'] = 'Backend/C_Disposisi';
$route['backend/disposisi/getbyid/(:any)'] = 'Backend/C_Disposisi/getByid/$1';
$route['backend/disposisi/save'] = 'Backend/C_Disposisi/updateDisposisi';
$route['backend/disposisi/search'] = 'Backend/C_Disposisi/search_Surat';

// Dokumen Penting
$route['backend/dokumen/penting'] = 'Backend/C_Doc_Penting';
$route['backend/dokumen/penting/getbyid/(:any)'] = 'Backend/C_Doc_Penting/getByid/$1';


// Management User
// Data User
$route['backend/user/datauser'] = 'Backend/User/C_DataUser';
// $route['backend/user/datauser/(:any)'] = 'Backend/User/C_DataUser/$1';
$route['backend/user/datauser/saveuser'] = 'Backend/User/C_DataUser/saveuser';
$route['backend/user/datauser/edituser'] = 'Backend/User/C_DataUser/edituser';
$route['backend/user/datauser/deleteuser'] = 'Backend/User/C_DataUser/deleteuser';
$route['backend/user/datauser/updateuser'] = 'Backend/User/C_DataUser/updateuser';
