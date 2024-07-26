<?php
require 'vendor/autoload.php';

use controller\UserController;
use controller\ItemController;

$router = new Router();

// Public routes-------------------------------------------------------------------------
$router->get('/', 'view/homepage.php')->only('guest');
$router->get('/main', 'view/logeddin.php')->only('auth');
$router->get('/index.php', 'view/homepage.php')->only('guest');
$router->get('/homepage', 'view/homepage.php')->only('guest');
$router->get('/google', 'config/google.php');
$router->get('/guest', 'view/guest.html')->only('guest');
$router->get('/redirect', 'view/message.html');
$router->get('/404', 'view/404.php');
$router->get('/about', 'view/about.html');
$router->get('/contact', 'view/contact.html');

// User-related routes-----------------------------------------------------------------------
$router->get('/create', 'view/user/create.php')->only('guest');
$router->get('/delete', 'view/user/delete.php')->only('auth');
$router->get('/edit', 'view/user/edit.php');
$router->get('/forget', 'view/user/forget.php');
$router->get('/login', 'view/user/login.php');
$router->get('/read', 'view/user/read.php');
$router->get('/update', 'view/user/update.php');
$router->get('/show', function () {
    require 'view/user/show.php';
});

$router->post('/sign', function () {
    $controller = new UserController();
    $controller->createUser();
});
$router->post('/login', function () {
    $controller = new UserController();
    $controller->loginUser();
});
$router->get('/user/read', function () {
    $controller = new UserController();
    $controller->readUser();
});
$router->get('/logout', function () {
    $controller = new UserController();
    $controller->logoutUser();
});
$router->post('/delete', function () {
    $controller = new UserController();
    $controller->deleteUser();
});
$router->post('/user/update', function () {
    $controller = new UserController();
    $controller->updateUser();
});

// Additional routes for items---------------------------------------------------------------------------
$router->get('/newItem', 'view/item/add_product.php');
$router->get('/upload', 'view/item/upload.php');
$router->post('/newitem', function () {
    (new ItemController())->uploadItem();
});

$router->get('/edit_item', 'view/item/ioupdate.php');
$router->get('/updateitem', function () {
    require 'view/item/iupdate.php';
});
$router->post('/edititem', function () {
    (new ItemController())->editItem();
});

$router->get('/show_item', 'view/item/Ishow.php');
$router->get('/show_iten', 'view/item/show.php');
$router->get('/choice', function () {
    (new ItemController())->handleItemDetails();
});
$router->get('/showitem', function () {
    (new ItemController())->viewItem();
});

$router->get('/delete item', 'view/item/idelete.php');
$router->post('/deleteItem', function () {
    (new ItemController())->deleteItem();
});

$router->post('/pay', 'view/item/pay.php');
$router->post('/add item', 'controller/item/upload.php');
$router->get('/pay', 'view/item/pay.php');
$router->post('/pay', 'view/item/pay.php');

$router->route($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
