<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */
$session = session();
// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/nosotros', 'Home::nosotros');
$routes->get('/comercializacion', 'Home::comercializacion');
$routes->get('/terminos', 'Home::terminos');
$routes->get('/contacto', 'Home::contacto');
$routes->get('/construction', 'Home::underConstruction');

// rutas de login page
$routes->get('login', 'Login::index');
$routes->post('login/process_login', 'Login::process_login');
$routes->get('dashboard', 'Dashboard::index');
$routes->get('logout', 'Login::logout');

// rutas de register page
$routes->get('register', 'Register::index');
$routes->post('register/process_registration', 'Register::process_registration');


// rutas del catalogo de los productos
$routes->get('products', 'Products::index');

// rutas para agregar productos

// $routes->post('product/add', 'ProductADDController::add');
// $routes->get('add', 'ProductADDController::add');

$routes->get('add', 'ProductADDController::add', ['filter' => 'sessionFilter']);
$routes->post('product/add', 'ProductADDController::add', ['filter' => 'sessionFilter']);
$routes->get('/products/toggleProductStatus/(:num)', 'Products::toggleProductStatus/$1');


$routes->get('/add/(:num)', 'ProductADDController::add/$1', ['filter' => 'sessionFilter']);


$routes->get('edit/(:num)', 'ProductEditController::edit/$1', ['filter' => 'sessionFilter']);
$routes->post('update/(:num)', 'ProductEditController::update/$1', ['filter' => 'sessionFilter']);






// rutas para la lista de los usuarios, el cual solo puede acceder el administrador
$routes->get('/user-list', 'AdminController::index', ['filter' => 'sessionFilter']);
$routes->get('/admin', 'AdminController::index');
$routes->get('/admin/toggle_baja/(:num)', 'AdminController::toggleBaja/$1');


// Ruta para mostrar el carrito de compras
$routes->get('/cart', 'CartController::viewCart');

// Ruta para agregar un producto al carrito de compras.
$routes->get('/cart/add/(:num)', 'CartController::addToCart/$1');

// Ruta para aumentar la cantidad de un producto en el carrito de compras.
$routes->get('cart/increase_quantity/(:num)', 'CartController::increaseQuantity/$1');

// Ruta para disminuir la cantidad de un producto en el carrito de compras.
$routes->get('cart/decrease_quantity/(:num)', 'CartController::decreaseQuantity/$1');

// Ruta para quitar elementos del carrito de compras.
$routes->get('/cart/remove_product/(:segment)', 'CartController::removeProduct/$1');

// Ruta para eliminar el carrito de compras de la sesion
$routes->get('/cart/clear_cart', 'CartController::clearCart');

// Ruta para mostrar el checkout de la compra antes de finalizar.
$routes->get('/checkout', 'CheckoutController::index');

$routes->post('/checkout/confirmPurchase', 'CheckoutController::confirmPurchase');
$routes->get('/confirmation', 'ConfirmationController::index');

$routes->get('/factura/(:num)', 'FacturaController::showFactura/$1');

// Ruta para mostrar todos los registros de la tabla "cabecera_compra"
$routes->get('/cabecera_compra', 'CabeceraCompraController::index', ['filter' => 'sessionFilter']);

$routes->post('/guardar_datos', 'FormController::guardarDatos');

// app/Config/Routes.php

$routes->get('/messages', 'MessagesController::index');
$routes->post('/markAsRead/(:num)', 'MessagesController::toggleReadStatus/$1');

$routes->get('/messages_readed', 'MessagesController::mensajesLeidos');
$routes->post('/markAsRead/(:num)', 'MessagesController::toggleReadStatus/$1');
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
