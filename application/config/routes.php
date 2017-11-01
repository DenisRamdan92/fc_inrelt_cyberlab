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
$route['default_controller'] = 'frontend/main';
$route['home'] = "frontend/main";
$route['about'] = "frontend/main";
//Sidebar navigation
$route['login'] = "backend/login";
$route['courses'] = "backend/courses";
$route['material'] = "backend/courses/material";
$route['lesson'] = "backend/courses/lesson";
$route['offer'] = "backend/offer";
$route['newsletter'] = "backend/newsletter";
$route['gallery'] = "backend/gallery";
$route['contact'] = "backend/contact";
$route['employee'] = "backend/employee";
$route['student'] = "backend/student";
$route['teacher'] = "backend/teacher";
$route['user'] = "backend/user";
$route['usergroup'] = "backend/user/group_pengguna";
$route['blog'] = "backend/blog";
$route['tags'] = "backend/tags";
$route['comment'] = "backend/blog/comment";
$route['slider'] = "backend/slider";
$route['webinfo'] = "backend/info";
$route['socmed'] = "backend/socmed";
$route['about'] = "backend/about";
//Sidebar navigation end

$route['admin'] = "backend/login";
$route['admin/login'] = "backend/login";

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
