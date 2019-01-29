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
$route['default_controller'] = 'login';
$route['404_override'] = 'Error404';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'login/login';
$route['login'] = 'login/index';
$route['login/dologin'] = 'login/dologin';
$route['register'] = 'register/index';

$route['home'] = 'home/index';

$route['mgroupuser'] = 'm_groupuser';
$route['mgroupuser/add'] = 'm_groupuser/add';
$route['mgroupuser/addsave'] = 'm_groupuser/addsave';
$route['mgroupuser/edit/(:num)'] = 'm_groupuser/edit/$1';
$route['mgroupuser/editsave'] = 'm_groupuser/editsave';
$route['mgroupuser/delete'] = 'm_groupuser/delete';
$route['mgroupuser/editrole/(:num)'] = 'm_groupuser/editrole/$1';
$route['mgroupuser/editreportrole/(:num)'] = 'm_groupuser/editreportrole/$1';

$route['muser'] = 'm_user';
$route['muser/add'] = 'm_user/add';
$route['muser/addsave'] = 'm_user/addsave';
$route['muser/edit/(:num)'] = 'm_user/edit/$1';
$route['muser/editsave'] = 'm_user/editsave';
$route['muser/delete/(:num)'] = 'm_user/delete/$1';
$route['muser/activate/(:num)'] = 'm_user/activate/$1';
$route['changePassword'] = 'm_user/changePassword';
$route['saveChangePassword'] = 'm_user/saveNewPassword';
$route['settings'] = 'm_user/setting';
$route['savesettings'] = 'm_user/savesetting';
$route['saveprofile'] = 'm_user/saveprofile';
$route['profile'] = 'm_user/profile';

$route['mprovince'] = 'm_province';
$route['mprovince/add'] = 'm_province/add';
$route['mprovince/addsave'] = 'm_province/addsave';
$route['mprovince/edit/(:num)'] = 'm_province/edit/$1';
$route['mprovince/editsave'] = 'm_province/editsave';
$route['mprovince/delete'] = 'm_province/delete';

$route['mcity'] = 'm_city';
$route['mcity/add'] = 'm_city/add';
$route['mcity/addsave'] = 'm_city/addsave';
$route['mcity/edit/(:num)'] = 'm_city/edit/$1';
$route['mcity/editsave'] = 'm_city/editsave';
$route['mcity/delete'] = 'm_city/delete';

$route['msubcity'] = 'm_subcity';
$route['msubcity/add'] = 'm_subcity/add';
$route['msubcity/addsave'] = 'm_subcity/addsave';
$route['msubcity/edit/(:num)'] = 'm_subcity/edit/$1';
$route['msubcity/editsave'] = 'm_subcity/editsave';
$route['msubcity/delete'] = 'm_subcity/delete';

$route['mvillage'] = 'm_village';
$route['mvillage/add'] = 'm_village/add';
$route['mvillage/addsave'] = 'm_village/addsave';
$route['mvillage/edit/(:num)'] = 'm_village/edit/$1';
$route['mvillage/editsave'] = 'm_village/editsave';
$route['mvillage/delete'] = 'm_village/delete';

$route['mclass'] = 'm_class';
$route['mclass/add'] = 'm_class/add';
$route['mclass/addsave'] = 'm_class/addsave';
$route['mclass/edit/(:num)'] = 'm_class/edit/$1';
$route['mclass/editsave'] = 'm_class/editsave';
$route['mclass/delete'] = 'm_class/delete';

$route['mpeople'] = 'm_people';
$route['mpeople/add'] = 'm_people/add';
$route['mpeople/addsave'] = 'm_people/addsave';
$route['mpeople/edit/(:num)'] = 'm_people/edit/$1';
$route['mpeople/editsave'] = 'm_people/editsave';
$route['mpeople/delete'] = 'm_people/delete';

$route['mmember'] = 'm_member';
$route['mmember/add'] = 'm_member/add';
$route['mmember/addsave'] = 'm_member/addsave';
$route['mmember/edit/(:num)'] = 'm_member/edit/$1';
$route['mmember/editsave'] = 'm_member/editsave';
$route['mmember/delete'] = 'm_member/delete';

$route['mworker'] = 'm_worker';
$route['mworker/add'] = 'm_worker/add';
$route['mworker/addsave'] = 'm_worker/addsave';
$route['mworker/edit/(:num)'] = 'm_worker/edit/$1';
$route['mworker/editsave'] = 'm_worker/editsave';
$route['mworker/delete'] = 'm_worker/delete';

$route['minstance'] = 'm_instance';
$route['minstance/add'] = 'm_instance/add';
$route['minstance/addsave'] = 'm_instance/addsave';
$route['minstance/next'] = 'm_instance/next';
$route['minstance/edit/(:num)'] = 'm_instance/edit/$1';
$route['minstance/editsave'] = 'm_instance/editsave';
$route['minstance/delete'] = 'm_instance/delete';

$route['mloan'] = 'm_loan';
$route['mloan/add'] = 'm_loan/add';
$route['mloan/addsave'] = 'm_loan/addsave';
$route['mloan/edit/(:num)'] = 'm_loan/edit/$1';
$route['mloan/editsave'] = 'm_loan/editsave';
$route['mloan/delete'] = 'm_loan/delete';

$route['tsubmission'] = 't_submission';
$route['tsubmission/add'] = 't_submission/add';
$route['tsubmission/addsave'] = 't_submission/addsave';
$route['tsubmission/edit/(:num)'] = 't_submission/edit/$1';
$route['tsubmission/editsave'] = 't_submission/editsave';
$route['tsubmission/delete'] = 't_submission/delete';
$route['tsubmission/upload_file/(:num)'] = 't_submission/upload_file/$1';
$route['tsubmission/download_file/(:num)'] = 't_submission/download_file/$1';

$route['mchartofaccount'] = 'm_chartofaccount';
$route['mchartofaccount/add'] = 'm_chartofaccount/add';
$route['mchartofaccount/addsave'] = 'm_chartofaccount/addsave';
$route['mchartofaccount/edit/(:num)'] = 'm_chartofaccount/edit/$1';
$route['mchartofaccount/editsave'] = 'm_chartofaccount/editsave';
$route['mchartofaccount/delete'] = 'm_chartofaccount/delete';

$route['tsubmissionpayment'] = 't_submissionpayment';
$route['tsubmissionpayment/add'] = 't_submissionpayment/add';
$route['tsubmissionpayment/addsave'] = 't_submissionpayment/addsave';
$route['tsubmissionpayment/edit/(:num)'] = 't_submissionpayment/edit/$1';
$route['tsubmissionpayment/editsave'] = 't_submissionpayment/editsave';
$route['tsubmissionpayment/delete'] = 't_submissionpayment/delete';

$route['mcompany'] = 'm_company';
$route['mcompany/add'] = 'm_company/add';
$route['mcompany/addsave'] = 'm_company/addsave';
$route['mcompany/edit/(:num)'] = 'm_company/edit/$1';
$route['mcompany/editsave'] = 'm_company/editsave';
$route['mcompany/delete'] = 'm_company/delete';

$route['report'] = 'reports';
$route['report/submission_payment_receipt_pdf/(:num)'] = 'reports/submission_payment_receipt_pdf/$1';
$route['report/submission_payment_detail_pdf'] = 'reports/submission_payment_detail_pdf';


$route['mainsetup'] = 'm_form';

//API
$route['api/mdisaster']['GET'] = 'api_mdisaster/get_disaster';
$route['api/mdisaster/(:any)/(:any)'] = 'api_mdisaster/get_disaster/$1/$2';
$route['api/mdisaster/save']['POST'] = 'api_mdisaster/save_disaster';
