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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['validasi_login']['POST'] = 'login/validation';

//routing menu list di bagian admin
$route['admin'] = 'admin/view/index';
$route['admin/master_jurusan'] = 'admin/view/master_jurusan';
$route['admin/master_user'] = 'admin/view/master_user';
$route['admin/kerjasama'] = 'admin/view/kerjasama';
$route['admin/kegiatan-tridharma'] = 'admin/view/kegiatan_tridharma';




//routing action di menu master jurusan
$route['admin/validasi_jurusan']['POST'] = 'admin/ajax_master_jurusan/validasi_jurusan';
$route['admin/delete_jurusan']['POST'] = 'admin/ajax_master_jurusan/delete_jurusan';


//routing action di menu master user
$route['admin/validasi-user']['POST'] = 'admin/ajax_master_user/validasi_user';
$route['admin/datatable-master-user']['POST'] = 'admin/ajax_master_user/datatable';
$route['admin/act-master-user']['POST'] = 'admin/ajax_master_user/action';

//routing action di menu kerjasama
$route['admin/validasi_kerjasama']['POST'] = 'admin/ajax_kerjasama/validasi_kerjasama';
$route['admin/datatable-kerjasama']['POST'] = 'admin/ajax_kerjasama/datatable_kerjasama';
$route['admin/get-kerjasama-row']['POST'] = 'admin/ajax_kerjasama/get_kerjasama_row';

//routing action di menu kegiatan tridharma
$route['admin/datatable-tridharma']['POST'] = 'admin/ajax_client/datatable_tridharma';
$route['admin/detail-tridharma']['POST'] = 'admin/ajax_client/detail_tridharma';




// 
// 
// 
// Bagian Client
// 
// 
//
//

//rounting menu list bagian client
$route['client'] = 'client/view/index';
$route['client/kegiatan-tridharma'] = 'client/view/kegiatan_tridharma';



//routing action di menu kegiatan tridharma 
$route['client/validasi-tridharma']['POST'] = 'client/ajax_kegiatan_tridharma/validation';