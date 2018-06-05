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

$route['default_controller']   = 'Auth';
$route['login']                = 'auth/login';
$route['initials']             = 'Dashboard';
$route['subjects']             = 'Dashboard/subjects';
$route['text']                 = 'Dashboard/text';
$route['handlingcode']         = 'HandlingCode';
$route['protectivemark']       = 'CID/protectivemarking/ProtectiveMarking';
$route['submitprotectivemark'] = 'CID/protectivemarking/ProtectiveMarking/create';
$route['review']               = 'Dashboard/review';
$route['handlingcodereview']   = 'HandlingCode/review';
$route['reviewdone']           = 'HandlingCode/review_done';
$route['dissemination']        = 'Dashboard/dissemination';
$route['search']               = 'Dashboard/search';
$route['savereview']           = 'Dashboard/saveinforeview';
$route['viewlog']              = 'Dashboard/viewlog';
$route['logout']               = 'auth/logout';
$route['saveinitials']         = 'Initials/Initial/handleInitialInfo';
$route['savesubject']          = 'CID/subjects/Subject/handleSubject';

/* CID route defination end here */



/* CMS route defination start here */
$route['CMS']            = 'CMS/Dashboard';
$route['CMS/newcase']    = 'CMS/Dashboard/newCase';
$route['CMS/updatecase'] = 'CMS/Dashboard/updateCase';
$route['CMS/closecase']  = 'CMS/Dashboard/closeCase';



/* CMS route defination end here */
$route['404_override']         = '';
$route['translate_uri_dashes'] = FALSE;
