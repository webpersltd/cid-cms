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

/* CID route defination start here */

$route['default_controller']        = 'Auth';
$route['login']                     = 'auth/login';
$route['dashboard']                 = 'CID/Home';
$route['initials']                  = 'Dashboard';
$route['subjects']                  = 'Dashboard/subjects';
$route['text']                      = 'Dashboard/text';
$route['handlingcode']              = 'HandlingCode';
$route['protectivemark']            = 'CID/protectivemarking/ProtectiveMarking';
$route['submitprotectivemark']      = 'CID/protectivemarking/ProtectiveMarking/create';
$route['review']                    = 'CID/review/Review';
$route['review_protective_mark']    = 'CID/review/Review_Protective_Mark';
$route['collectProMark']            = 'CID/review/Review_Protective_Mark/get_selected_pro_mark';
$route['updateProMark']             = 'CID/review/Review_Protective_Mark/update_pro_mark';
$route['confirmProMark']            = 'CID/review/Review_Protective_Mark/confirm_protective_mark';
$route['reviewProcess']             = 'CID/review/Review/reviewProcess';
$route['collectEval']               = 'CID/review/Review/get_eval';
$route['updateEval']                = 'CID/review/Review/update_eval';
$route['handlingcodereview']        = 'HandlingCode/review';
$route['reviewdone']                = 'HandlingCode/review_done';
$route['collectRecheckData']        = 'HandlingCode/recheck_handling_code';
$route['update_info']               = 'HandlingCode/update_handling_code';
$route['dissemination']             = 'CID/dissemination/Dissemination';
$route['disseminationProcess']      = 'CID/dissemination/Dissemination/dissemination_process';
$route['collectHandlingCode']       = 'CID/dissemination/Dissemination/get_selected_handling_code';
$route['reviewHandlingCode']        = 'CID/dissemination/Dissemination/update_handling_code';
$route['reviewHandlingInstruction'] = 'CID/dissemination/Dissemination/get_handling_instruction';
$route['updateHandlingInstruction'] = 'CID/dissemination/Dissemination/update_handling_instruction';
$route['disseminationFinal']        = 'CID/dissemination/DisseminationFinal';
$route['getName']                   = 'CID/dissemination/DisseminationFinal/get_name';
$route['search']                    = 'Dashboard/search';
$route['savereview']                = 'Dashboard/saveinforeview';
$route['viewlog']                   = 'Dashboard/viewlog';
$route['logout']                    = 'auth/logout';
$route['saveinitials']              = 'CID/Initials/Initial/handleInitialInfo';
$route['savesubject']               = 'CID/subjects/Subject/handleSubject';
$route['done']                      = 'CID/dissemination/DisseminationFinal/submit_final_record';
$route['savetext']                  = 'CID/Text/Text/saveText';
$route['textController']            = 'CID/Text/Text';
$route['viewRecord/(:num)']         = 'CID/Home/view_record/$1';
$route['continue/(:num)']           = 'CID/Home/continue/$1';
$route['review_approve/(:num)']     = 'CID/Home/review_approve/$1';

/* CID route defination end here */



/* CMS route defination start here */
$route['CMS']            = 'CMS/Dashboard';
$route['CMS/newcase']    = 'CMS/Dashboard/newCase';
$route['CMS/updatecase'] = 'CMS/Dashboard/updateCase';
$route['CMS/closecase']  = 'CMS/Dashboard/closeCase';



/* CMS route defination end here */
$route['404_override']         = '';
$route['translate_uri_dashes'] = FALSE;
