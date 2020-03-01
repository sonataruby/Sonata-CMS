<?php namespace Config;

/**
 * --------------------------------------------------------------------
 * URI Routing
 * --------------------------------------------------------------------
 * This file lets you re-map URI requests to specific controller functions.
 *
 * Typically there is a one-to-one relationship between a URL string
 * and its corresponding controller class/method. The segments in a
 * URL normally follow this pattern:
 *
 *    example.com/class/method/id
 *
 * In some instances, however, you may want to remap this relationship
 * so that a different class/function is called than the one
 * corresponding to the URL.
 */

// Create a new instance of our RouteCollection class.
$routes = Services::routes(true);

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
if(defined("ADMIN")){
	
	
	list($module,$control,$action) = explode("/", uri_string(),4);
	$control = $control ? ucfirst($control) : "Backend";
	$module = $module ? $module : "Home";
	
	$routes->setDefaultNamespace('Modules\\'.ucfirst($module));
	$routes->setDefaultController($control);
	$routes->setDefaultMethod('index');
	$routes->setTranslateURIDashes(false);
	$routes->set404Override();
	$routes->setAutoRoute(true);
	$routes->get('/', 'Backend::index');

	$routes->group(strtolower($module),function ($routes) use ($control, $module){
		$routes->get('/', 'Modules\\'.ucfirst($module).'\\'.$control.'::index');
		$routes->add(strtolower($control), 'Modules\\'.ucfirst($module).'\\'.$control.'::index');
		$routes->add(strtolower($control).'/(:any)', 'Modules\\'.ucfirst($module).'\\'.$control.'::$1');
		$routes->add(strtolower($control).'/(:any)/(:segment)', 'Modules\\'.ucfirst($module).'\\'.$control.'::$1/$2');
	});
	
	
	
}else{

	$routes->setDefaultNamespace('\Modules\Home');
	$routes->setDefaultController('Frontend');
	$routes->setDefaultMethod('index');
	$routes->setTranslateURIDashes(false);
	$routes->set404Override();
	$routes->setAutoRoute(true);
	$routes->get('/', 'Frontend::index');
	$routes->get('/(:any).html', '\Modules\Pages\Pages::index/$1');
	$routes->get('/categories', '\Modules\Posts\Categories::index');
	$routes->get('/categories/(:any)', '\Modules\Posts\Categories::$1');
	$routes->get('/(:any)/(:any).html', '\Modules\Posts\Posts::detail/$2');


	$routes->group('auth', ['namespace' => 'Modules\Auth'], function ($routes) {
		$routes->get('/', 'Profile::index');
		$routes->add('login', 'Access::login');
		$routes->add('register', 'Access::register');
		$routes->get('logout', 'Access::logout');
		$routes->get('forgot_password', 'Access::forgot_password');
		$routes->add('focus/(:any)', 'Access::focus/$1');
		$routes->add('settings','Settings::profile');
		$routes->add('api/(:any)', 'Api::$1');
		
	});
}
$routes->group('app', ['namespace' => 'Modules\Apps'], function ($routes) {
	$routes->add('(:any)/(:any)', '$1::$2');
});


$routes->group('api', ['namespace' => 'Modules\Api'], function ($routes) {
	$routes->get('/', 'Home::index');
});





