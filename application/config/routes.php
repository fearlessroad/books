<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Users';
$route['404_override'] = 'Users';
$route['translate_uri_dashes'] = FALSE;
$route['register'] = 'Users/register';
$route['login'] = 'Users/login';
$route['userprofile/(:any)'] = 'Users/userprofile/$1';

$route['bookprofile/(:any)']='books/bookprofile/$1';
$route['welcomeUser']='users/welcomeuser';