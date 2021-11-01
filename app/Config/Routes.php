<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.



//Routing Login
$routes->get('/', '\App\Modules\Auth\Controllers\Login::index');
$routes->get('/Login', '\App\Modules\Auth\Controllers\Login::index');
$routes->add('/Login/(:any)', '\App\Modules\Auth\Controllers\Login::$1');

$routes->get('/Register', '\App\Modules\Auth\Controllers\Register::index');
$routes->add('/Register/(:any)', '\App\Modules\Auth\Controllers\Register::$1');


//Routing Florist
$routes->get('/Florist', '\App\Modules\Admin\Controllers\Florist::index');
$routes->add('/Florist/(:any)', '\App\Modules\Admin\Controllers\Florist::$1');
$routes->delete('/Florist/(:num)', '\App\Modules\Admin\Controllers\Florist::delete/$1');

//Routing Detail 
$routes->get('/Detail/(:any)', '\App\Modules\Admin\Controllers\Detail::detail/$1');

//Routing Jenis
$routes->get('/Jenis', '\App\Modules\Admin\Controllers\Jenis::index');
$routes->add('/Jenis/(:any)', '\App\Modules\Admin\Controllers\Jenis::$1');

//Routing Buket
$routes->get('/Buket', '\App\Modules\Admin\Controllers\Buket::index');
$routes->add('/Buket/(:any)', '\App\Modules\Admin\Controllers\Buket::$1');

//Routing User
$routes->get('/User', '\App\Modules\Admin\Controllers\User::index');
$routes->add('/User/(:any)', '\App\Modules\Admin\Controllers\User::$1');
$routes->delete('/User/(:num)', '\App\Modules\Admin\Controllers\User::delete/$1');

//Routing Pages
$routes->get('/Pages', '\App\Modules\User\Controllers\Pages::home');
$routes->add('/Pages/(:any)', '\App\Modules\User\Controllers\Pages::$1');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
