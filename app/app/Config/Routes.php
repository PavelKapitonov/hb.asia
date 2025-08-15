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
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/lang/(:any)', 'Language::index');
$routes->get('/{locale}', 'Home::index');
$routes->get('/catalog/(:any)', 'Catalog::category/$1');
$routes->match(["get", "post"], '/{locale}/catalog/(:any)', 'Catalog::category/$1');
$routes->get('/{locale}/product/(:any)', 'Catalog::product/$1');
$routes->get('/{locale}/feed.xml', 'Catalog::feed');
$routes->get('/{locale}/order/(:any)', 'Catalog::order/$1');
$routes->get('/{locale}/aboutus', 'Home::aboutus');
$routes->get('/{locale}/healingbowl', 'Home::healingbowl');
$routes->get('/{locale}/news', 'Home::news');
$routes->get('/{locale}/documents', 'Home::documents');
$routes->get('/{locale}/contacts', 'Home::contacts');
$routes->get('/{locale}/spa', 'Home::spa');
$routes->get('/{locale}/payment-and-delivery', 'Home::payment_and_delivery');
$routes->get('/{locale}/whosale', 'Home::whosale');
$routes->get('/{locale}/sitemap', 'Home::sitemap');
$routes->get('/{locale}/knowledge-base', 'Home::knowledge_base');
$routes->get('/{locale}/privacy-policy', 'Home::privacy_policy');
$routes->get('/{locale}/user-agreements', 'Home::user_agreement');


$routes->match(["get", "post"], '/{locale}/stripe', 'StripeController::index');
$routes->match(["get", "post"], '/{locale}/stripe/create', 'StripeController::create');
$routes->match(["get", "post"], '/{locale}/stripe/add', 'StripeController::add');
$routes->match(["get", "post"], '/{locale}/stripe/start', 'StripeController::start');
$routes->match(["get", "post"], '/{locale}/stripe/payment', 'StripeController::payment');
$routes->post('/{locale}/cart/client', 'CartController::client');
$routes->post('/{locale}/cart/billplz', 'CartController::billplz');
$routes->post('/{locale}/cart/complited', 'CartController::complited');
$routes->get('/{locale}/cart/pay', 'CartController::pay');
$routes->match(["get", "post"], '/{locale}/cart/payment', 'CartController::payment');
$routes->get('/{locale}/cart/success', 'CartController::success');
$routes->get('/{locale}/cart/canceled', 'CartController::canceled');


$routes->match(["get", "post"], '/{locale}/cart', 'CartController::index');
$routes->get('/{locale}/cart/del/(:any)', 'CartController::del/$1');
$routes->match(["get", "post"], '/{locale}/cart/add', 'CartController::add');
$routes->match(["get", "post"], '/{locale}/cart/callback/(:any)', 'CartController::callback/$1');
$routes->match(["get", "post"], '/{locale}/pay', 'PayController::index');
$routes->match(["get", "post"], '/{locale}/pay/stripe', 'PayController::stripe');
$routes->post('/pay/start', 'PayController::start');
$routes->get('/pay/order', 'PayController::order');
$routes->post('/pay/bank', 'PayController::bank');
$routes->get('/{locale}/pay/success', 'PayController::success');
$routes->get('/{locale}/pay/rates', 'PayController::rates');
$routes->match(["get", "post"], '/pay/onsuccess', 'PayController::onsuccess');
$routes->match(["get", "post"], '/pay/test', 'PayController::test');
$routes->get('/pay/capture', 'PayController::capture');
$routes->get('/pay/void', 'PayController::void');
$routes->match(["get", "post"], "/pay/callback", "PayController::callback");

// $routes->post('/email/send', 'Email::send');
// $routes->post('/email/callback', 'Email::callback');

$routes->match(['get', 'post'], '{locale}/login', 'UserController::login', ["filter" => "noauth"]);
// Admin routes
$routes->group("{locale}/admin", ["filter" => "auth"], function ($routes) {
    $routes->get("/", "AdminController::index");
    $routes->match(["get", "post"], "schedule", "AdminController::schedule");
    $routes->match(["get", "post"], "edit_schedule/(:num)", "AdminController::edit_schedule/$1");
    $routes->match(["get", "post"], "delete_schedule/(:num)", "AdminController::delete_schedule/$1");
    $routes->match(["get", "post"], "news", "AdminController::news");
    $routes->match(["get", "post"], "crm", "AdminController::crm");
    $routes->match(["get", "post"], "edit_news/(:num)", "AdminController::edit_news/$1");
    $routes->match(["get", "post"], "delete_news/(:num)", "AdminController::delete_news/$1");  
    $routes->match(["get", "post"], "kurs", "AdminController::kurs");
    $routes->match(["get", "post"], "edit_kurs", "AdminController::edit_kurs");  
    $routes->match(["get", "post"], "edit_kurs/(:num)", "AdminController::edit_kurs/$1");  
    $routes->match(["get", "post"], "delete_kurs/(:num)/(:num)", "AdminController::delete_kurs/$1/$1");  
    $routes->match(["get", "post"], "pay", "AdminController::pay");
    $routes->match(["get", "post"], "edit_pay/(:num)", "AdminController::edit_pay/$1");
    $routes->match(["get", "post"], "delete_pay/(:num)", "AdminController::delete_pay/$1");

    $routes->match(["get", "post"], "product", "AdminController::product");
    $routes->match(["get", "post"], "product/(:any)", "AdminController::product/$1");
    $routes->match(["get", "post"], "product/(:any)/(:any)", "AdminController::product/$1/$1");
    $routes->match(["get", "post"], "hide_product/(:any)/(:any)", "AdminController::hide_product/$1/$1");
    $routes->match(["get", "post"], "edit_product/(:any)", "AdminController::edit_product/$1");
    $routes->match(["get", "post"], "edit_product_text/(:num)", "AdminController::edit_product_text/$1"); 
    $routes->match(["get", "post"], "delete_product/(:any)", "AdminController::delete_product/$1");  

    $routes->match(["get", "post"], "brand", "AdminController::brand");
    $routes->match(["get", "post"], "edit_brand/(:num)", "AdminController::edit_brand/$1");
    $routes->match(["get", "post"], "brand_text/(:num)", "AdminController::brand_text/$1");  
    $routes->match(["get", "post"], "edit_brand_text/(:num)", "AdminController::edit_brand_text/$1");  
    $routes->match(["get", "post"], "brand_img/(:num)", "AdminController::brand_img/$1"); 
    $routes->match(["get", "post"], "delete_brand/(:num)", "AdminController::delete_brand/$1"); 
    $routes->match(["get", "post"], "delete_brand_text/(:num)", "AdminController::delete_brand_text/$1"); 

    $routes->match(["get", "post"], "product_img", "AdminController::product_img");
    $routes->match(["get", "post"], "delete_product_img/(:num)", "AdminController::delete_product_img/$1"); 

    $routes->match(["get", "post"], "product_set", "AdminController::product_set");
    $routes->match(["get", "post"], "delete_product_set/(:num)", "AdminController::delete_product_set/$1"); 
    
    $routes->match(["get", "post"], "product_text", "AdminController::product_text");
    $routes->match(["get", "post"], "delete_product_text/(:num)", "AdminController::delete_product_text/$1");     

    $routes->match(["get", "post"], "product_img_update", "AdminController::product_img_update");

    $routes->match(["get", "post"], "cart", "AdminController::cart");
    $routes->match(["get", "post"], "cart_up/(:num)", "AdminController::cart_up/$1"); 

    $routes->match(["get", "post"], "categories", "AdminController::categories");   
    $routes->match(["get", "post"], "edit_category/(:num)", "AdminController::edit_category/$1");   
    $routes->match(["get", "post"], "category_img/(:num)", "AdminController::category_img/$1");   
    $routes->match(["get", "post"], "category_text/(:num)", "AdminController::category_text/$1");   
    $routes->match(["get", "post"], "edit_category_text/(:num)", "AdminController::edit_category_text/$1");   
});

// Editor routes
$routes->group("editor", ["filter" => "auth"], function ($routes) {
    $routes->get("/", "EditorController::index");
});
$routes->get('logout', 'UserController::logout');
$routes->get('{locale}/logout', 'UserController::logout');
$routes->get('{locale}/login', 'UserController::login');
$routes->get('{locale}/login', 'UserController::login');
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
