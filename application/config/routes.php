<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$router['users/view'] = 'users/view';
$router['users/add'] = 'users/add';

$router['requests/add'] = 'requests/add';
$router['requests/view'] = 'requests/view';

$route['default_controller'] = 'login/view';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
