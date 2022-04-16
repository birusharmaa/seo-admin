<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();
 
// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
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
$routes->get('/', 'Login::index');
$routes->get('forget-password','Login::forget_password');
$routes->get('/inbox', 'Inbox::index');

$routes->get('/notification', 'Notification::index');
$routes->get('/knowledge', 'Knowledge::index');
$routes->get('/installation', 'Knowledge::installation');
$routes->get('/uses', 'Knowledge::uses');

$routes->get('sign-out','Signin::sign_out');
$routes->post('send-otp','Signin::send_reset_password_mobile_otp');
$routes->post('verify-otp','Signin::validateOtp');
$routes->post('password-reset','Signin::do_reset_password');
$routes->post('/user-auth','Signin::authenticate');

$routes->get('/dashboard', 'SettingsController::dashboard');
$routes->get('/settings', 'SettingsController::index');
$routes->get('/profile', 'SettingsController::profile');
$routes->post('save-general/(:num)','SettingsController::save_general/$1');
$routes->post('upload-logo/(:num)','SettingsController::updateSiteLogo/$1');
$routes->post('reset-password/(:num)','SettingsController::reset_password/$1');
$routes->post('compony-Info/(:num)','SettingsController::compony_Info/$1');
$routes->post('social-link/(:num)','SettingsController::social_link/$1');
$routes->post('save-personalinfo/(:num)','SettingsController::save_personalinfo/$1');
$routes->post('update-theme/(:any)','SettingsController::update_theme/$1');

$routes->get('/business-type', 'GeneralSettingController::businessType');
$routes->get('/allBusiness', 'GeneralSettingController::allBusiness');
$routes->post('/save-businesstype','GeneralSettingController::save_business');
$routes->get('edit-business/(:num)','GeneralSettingController::edit_business/$1');
$routes->post('update-business/(:num)','GeneralSettingController::update_business/$1');
$routes->post('delete-business/(:num)','GeneralSettingController::delete_business/$1');

$routes->get('/country', 'GeneralSettingController::country');
$routes->get('/allcountry', 'GeneralSettingController::allcountry');
$routes->post('/save-country','GeneralSettingController::save_country');
$routes->get('edit-country/(:num)','GeneralSettingController::edit_country/$1');
$routes->post('update-country/(:num)','GeneralSettingController::update_country/$1');
$routes->post('delete-country/(:num)','GeneralSettingController::delete_country/$1');

$routes->get('/state', 'GeneralSettingController::state');
$routes->get('/allstate', 'GeneralSettingController::allstate');
$routes->post('/save-state','GeneralSettingController::save_state');
$routes->get('edit-state/(:num)','GeneralSettingController::edit_state/$1');
$routes->post('update-state/(:num)','GeneralSettingController::update_state/$1');
$routes->post('delete-state/(:num)','GeneralSettingController::delete_state/$1');

$routes->get('/city', 'GeneralSettingController::city');
$routes->get('/allcity', 'GeneralSettingController::allcity');
$routes->post('/save-city','GeneralSettingController::save_city');
$routes->get('edit-city/(:num)','GeneralSettingController::edit_city/$1');
$routes->post('update-city/(:num)','GeneralSettingController::update_city/$1');
$routes->post('delete-city/(:num)','GeneralSettingController::delete_city/$1');

$routes->get('/locality', 'GeneralSettingController::locality');
$routes->get('/alllocality', 'GeneralSettingController::alllocality');
$routes->post('/save-locality','GeneralSettingController::save_locality');
$routes->get('edit-locality/(:num)','GeneralSettingController::edit_locality/$1');
$routes->post('update-locality/(:num)','GeneralSettingController::update_locality/$1');
$routes->post('delete-locality/(:num)','GeneralSettingController::delete_locality/$1');

$routes->get('/pincode', 'GeneralSettingController::pincode');
$routes->get('/allpincode', 'GeneralSettingController::allpincode');
$routes->post('/save-pincode','GeneralSettingController::save_pincode');
$routes->get('edit-pincode/(:num)','GeneralSettingController::edit_pincode/$1');
$routes->post('update-pincode/(:num)','GeneralSettingController::update_pincode/$1');
$routes->post('delete-pincode/(:num)','GeneralSettingController::delete_pincode/$1');

$routes->get('/get-state/(:num)', 'GeneralSettingController::getActiveSateById/$1');
$routes->get('/get-city/(:num)', 'GeneralSettingController::getActiveCityById/$1');
$routes->get('/get-locality/(:num)', 'GeneralSettingController::getActiveLocalityById/$1');
$routes->get('/get-pincode/(:num)', 'GeneralSettingController::getActivePincodeById/$1');

$routes->get('/plugins', 'Partners::index');
$routes->get('/add-plugin', 'Plugins::add_plugin');
$routes->get('/manage-plugins/(:num)', 'Plugins::manage_plugins/$1');
$routes->post('/save-plugins', 'Plugins::save_plugins');
$routes->post('plugin-info-update/(:num)','Plugins::plugin_info_update/$1');
$routes->post('plugin-pass-update/(:num)','Plugins::plugin_pass_update/$1');
$routes->post('pluginInfo-update/(:num)','Plugins::pluginInfo_update/$1');
$routes->post('plugin-social-update/(:num)','Plugins::pluginSocial_update/$1');
$routes->post('upload-plugin-logo/(:num)','Plugins::upload_plugin_logo/$1');
$routes->get('/renewals', 'Plugins::renewals');

 
$routes->get('/inventory', 'Inventory::index');
$routes->post('/buy-inventory', 'Inventory::save_buyInventory');
$routes->get('/allInventory', 'Inventory::allInventory');

$routes->get('/seo', 'Partners::seo');
// $routes->get('/getclients', 'ClientsController::getclients',  ['filter' => 'authFilter']);
// $routes->get('/getanthorclients', 'ClientsController::getanthorclients', ['filter' => 'authFilter']);
// $routes->post('/insert_anther_client', 'ClientsController::insert_anther_client', ['filter' => 'authFilter']);
// $routes->put('/update_anther_client/(:num)', 'ClientsController::update_anther_client/$1', ['filter' => 'authFilter']);



$routes->group('curl', function($routes){
    $routes->get('get-all-partners', 'CurlController::getAllPartners');
    $routes->post('change-partner-status/(:num)', 'CurlController::changePartnerStatus/$1');
    $routes->post('add-partner', 'CurlController::addPartner');
    $routes->delete('delete-partner/(:num)', 'CurlController::deletePartner/$1');
    $routes->get('get-all-clients', 'CurlController::getAllClients');
    $routes->post('change-client-status/(:num)', 'CurlController::changeClientStatus/$1');
    $routes->delete('delete-client/(:num)', 'CurlController::deleteClient/$1');
    
});



$routes->group('clients', function($routes){
    $routes->get('all', 'ClientsController::index');
    $routes->get('client', 'ClientsController::client');
});

$routes->group('partners', function($routes){
    $routes->get('plugins', 'PartnersController::plugins');
    $routes->get('cms', 'PartnersController::cms');
});


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
