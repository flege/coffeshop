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
$route['default_controller'] = 'user';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin/login'] = 'admin_login';
$route['admin/login/auth'] = 'admin_login/auth';
$route['admin/logout'] = 'admin_login/logout';
$route['user/login'] = 'user_login';
$route['user/login/auth'] = 'user_login/auth';
$route['user/logout'] = 'user_login/logout';

$route['admin/produk/tambah'] = 'admin/produk_tambah';
$route['admin/produk/add'] = 'admin/produk_add';
$route['admin/produk/edit/(:any)'] = 'admin/produk_edit/$1';
$route['admin/produk/update'] = 'admin/produk_update';

$route['admin/shop/tambah'] = 'admin/shop_tambah';
$route['admin/shop/add'] = 'admin/shop_add';
$route['admin/shop/edit/(:any)'] = 'admin/shop_edit/$1';
$route['admin/shop/update'] = 'admin/shop_update';

$route['admin/user/tambah'] = 'admin/user_tambah';
$route['admin/user/add'] = 'admin/user_add';
$route['admin/user/edit/(:any)'] = 'admin/user_edit/$1';
$route['admin/user/update'] = 'admin/user_update';

$route['admin/order/show/(:any)'] = 'admin/order_show/$1';
$route['admin/order/update'] = 'admin/order_update';

$route['user/users/tambah'] = 'user/users_tambah';
$route['user/users/add'] = 'user/users_add';
$route['user/users/edit/(:any)'] = 'user/users_edit/$1';
$route['user/users/update'] = 'user/users_update';

$route['user/order/show/(:any)'] = 'user/order_show/$1';
$route['user/order/tambah'] = 'user/order_tambah';
$route['user/order/tambah/produk'] = 'user/order_tambah_produk';
$route['user/order/edit/(:any)'] = 'user/order_edit_produk/$1';
$route['user/order/add/produk'] = 'user/order_add_produk';
$route['user/order/update/produk'] = 'user/order_update_produk';
$route['user/order/add'] = 'user/order_add';
