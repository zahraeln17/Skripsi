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
| When you set this option to TRUE, it will replace ALL dashes with
| underscores in the controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// User Routes
$route['register-user'] = 'userhandler';
$route['votes'] = 'votes';

// post answer
$route['votes/create'] = 'votes/storeQuestionAnswer';
$route['votes/home'] = 'votes/home';

// admin
$route['admin/dashboard'] = 'admin/dashboard';
// admin / Quitioners
$route['admin/create_question'] = 'admin/createQuestion';
$route['admin/save_question']['post'] = 'admin/save_question';
$route['admin/edit_question/(:num)']['get'] = 'admin/edit_question/$1';
$route['admin/update_question']['post'] = 'admin/update_question';
$route['admin/delete_question/(:num)']['get'] = 'admin/delete_question/$1';

//  admin / Topic
$route['admin/topic'] = 'admin/topic_index';
$route['admin/create_topic'] = 'admin/create_topic';
$route['admin/save_topic']['post'] = 'admin/save_topic';
$route['admin/edit_topic/(:num)']['get'] = 'admin/edit_topic/$1';
$route['admin/update_topic']['post'] = 'admin/update_topic';
$route['admin/delete_topic/(:num)']['get'] = 'admin/delete_topic/$1';
