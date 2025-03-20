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
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['validasi_login']['POST'] = 'login/validation';


//ajax master universal
$route['admin/add-master']  = 'admin/ajax_client/add_master_universal';
$route['admin/get-master'] = 'admin/ajax_client/get_master_universal';


//routing menu list di bagian admin
$route['admin'] = 'admin/view/index';
$route['admin/master_jurusan'] = 'admin/view/master_jurusan';
$route['admin/master_user'] = 'admin/view/master_user';
$route['admin/kerjasama'] = 'admin/view/kerjasama';
$route['admin/kegiatan-tridharma'] = 'admin/view/kegiatan_tridharma';
$route['admin/seminar'] = 'admin/view/seminar';
$route['admin/rekognisi'] = 'admin/view/rekognisi';
$route['admin/sertifikat'] = 'admin/view/sertifikat';
$route['admin/publikasi'] = 'admin/view/publikasi';
$route['admin/jurnal'] = 'admin/view/jurnal';
$route['admin/organisasi'] = 'admin/view/organisasi';







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

//routing action di menu seminar/webinar
$route['admin/datatable-seminar']['POST'] = 'admin/ajax_client/datatable_seminar';
$route['admin/detail-seminar']['POST'] = 'admin/ajax_client/detail_seminar';

//routing action di menu rekognisi
$route['admin/datatable-rekognisi']['POST'] = 'admin/ajax_client/datatable_rekognisi';
$route['admin/detail-rekognisi']['POST'] = 'admin/ajax_client/detail_rekognisi';


//routing action di menu sertifikat kompetensi
$route['admin/datatable-sertifikat']['POST'] = 'admin/ajax_client/datatable_sertifikat';
$route['admin/detail-sertifikat']['POST'] = 'admin/ajax_client/detail_sertifikat';

//routng action di menu publikasi
$route['admin/datatable-publikasi']['POST'] = 'admin/ajax_client/datatable_publikasi';
$route['admin/detail-publikasi']['POST'] = 'admin/ajax_client/detail_publikasi';

//routng action di menu jurnal
$route['admin/datatable-jurnal']['POST'] = 'admin/ajax_client/datatable_jurnal';
$route['admin/detail-jurnal']['POST'] = 'admin/ajax_client/detail_jurnal';

//routng action di menu organisasi
$route['admin/datatable-organisasi']['POST'] = 'admin/ajax_client/datatable_organisasi';
$route['admin/detail-organisasi']['POST'] = 'admin/ajax_client/detail_organisasi';


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
$route['client/seminar-webinar'] = 'client/view/seminar';
$route['client/rekognisi'] = 'client/view/rekognisi';
$route['client/sertifikat-kompetensi'] = 'client/view/sertifikat_kompetensi';
$route['client/publikasi'] = 'client/view/publikasi';
$route['client/pengelola-jurnal'] = 'client/view/jurnal';
$route['client/organisasi'] = 'client/view/organisasi';





//routing action di menu kegiatan tridharma 
$route['client/validasi-tridharma']['POST'] = 'client/ajax_kegiatan_tridharma/validation';

//routing action di menu seminar
$route['client/validasi-seminar']['POST'] = 'client/ajax_seminar/validation';

//routing action di menu rekognasi
$route['client/validasi-rekognisi']['POST'] = 'client/ajax_rekognisi/validation';

//routing action di menu sertifikat kompetensi
$route['client/validasi-kompetensi']['POST'] = 'client/ajax_sertifikat/validation';

//routing action di menu publikasi
$route['client/validasi-publikasi']['POST'] = 'client/ajax_publikasi/validation';

//routing action di menu pengelola jurnal
$route['client/validasi-jurnal']['POST'] = 'client/ajax_jurnal/validation';

//routing action di menu pengelola organisasi
$route['client/validasi-organisasi']['POST'] = 'client/ajax_organisasi/validation';