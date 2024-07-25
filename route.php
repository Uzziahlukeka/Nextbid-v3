<?php
require 'vendor/autoload.php';

use controller\UserController;

$router = new Router();

// Public routes
$router->get('/', 'view/homepage.php')->only('guest');
$router->get('/main', 'view/logeddin.php')->only('auth');
$router->get('/index.php', 'view/homepage.php')->only('guest');
$router->get('/homepage', 'view/homepage.php')->only('guest');
$router->get('/google', 'config/google.php');
$router->get('/guest', 'view/guest.html')->only('guest');
$router->get('/redirect', 'view/message.html');
$router->get('/404', 'view/404.php');

// User-related routes
$router->get('/create', 'view/user/create.php')->only('guest');
$router->get('/delete', 'view/user/delete.php')->only('auth');
$router->get('/edit', 'view/user/edit.php');
$router->get('/forget', 'view/user/forget.php');
$router->get('/login', 'view/user/login.php');
$router->get('/read', 'view/user/read.php');
//$router->get('/show', 'view/user/show.php');
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

$router->post('/pay', 'view/item/pay.php');
$router->post('/add item', 'controller/item/upload.php');

// Additional routes for items
$router->get('/new item', 'view/item/add_product.php');
$router->get('/edit item', 'view/item/ioupdate.php');
$router->get('/show item', 'view/item/Ishow.php');
$router->get('/choice', 'controller/item/show.php');
$router->get('/show iten', 'view/item/show.php');
$router->get('/update item', 'view/item/iupdate.php');
$router->get('/upload', 'view/item/upload.php');
$router->get('/delete item', 'view/item/idelete.php');
$router->get('/pay', 'view/item/pay.php');
$router->post('/pay', 'view/item/pay.php');

// Updating items
// $router->put('/update item', function () {
//     $controller = new ItemController(); // Assuming you have ItemController for items
//     $controller->updateItem(); // Add the appropriate method in ItemController
// });

// Route for logging out
$router->get('/log out', function () {
    $controller = new UserController();
    $controller->logoutUser();
});

$router->route($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
