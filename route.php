<?php
require 'vendor/autoload.php';

use controller\UserController;
use controller\ItemController;

$router = new Router();

// Public routes-------------------------------------------------------------------------
$router->get('/', function () {
    require 'view/homepage.php';
})->only('guest');
$router->get('/main', function () {
    require 'view/logeddin.php';
})->only('auth');
$router->get('/index.php', function () {
    require 'view/homepage.php';
})->only('guest');
$router->get('/homepage', function () {
    require 'view/homepage.php';
})->only('guest');
$router->get('/google', function () {
    require 'config/google.php';
});
$router->get('/guest', function () {
    require 'view/guest.html';
})->only('guest');
$router->get('/redirect', function () {
    require 'view/message.html';
});
$router->get('/404', function () {
    require 'view/404.php';
});
$router->get('/about', function () {
    require 'view/about.html';
});
$router->get('/contact', function () {
    require 'view/contact.html';
});

// User-related routes-----------------------------------------------------------------------
$router->get('/create', function () {
    require 'view/user/create.php';
})->only('guest');
$router->get('/delete', function () {
    require 'view/user/delete.php';
})->only('auth');
$router->get('/edit', function () {
    require 'view/user/edit.php';
});
$router->get('/forget', function () {
    require 'view/user/forget.php';
});
$router->get('/login', function () {
    require 'view/user/login.php';
});
$router->get('/read', function () {
    require 'view/user/read.php';
});
$router->get('/update', function () {
    require 'view/user/update.php';
});
$router->get('/show', function () {
    require 'view/user/show.php';
});
$router->post('/sign', function () {
    (new UserController())->createUser();
});
$router->post('/login', function () {
    (new UserController())->loginUser();
});
$router->get('/user/read', function () {
    (new UserController())->readUser();
});
$router->get('/logout', function () {
    (new UserController())->logoutUser();
});

$router->post('/delete', function () {
    (new UserController())->deleteUser();
});

$router->post('/user/update', function () {
    (new UserController())->updateUser();
});

// Additional routes for items---------------------------------------------------------------------------
$router->get('/newItem', function () {
    require 'view/item/add_product.php';
});

$router->get('/upload', function () {
    require 'view/item/upload.php';
});

$router->post('/newitem', function () {
    (new ItemController())->uploadItem();
});

$router->get('/edit_item', function () {
    require 'view/item/edit_item.php';
});

$router->get('/updateitem', function () {
    require 'view/item/update_item.php';
});

$router->post('/edititem', function () {
    (new ItemController())->editItem();
});

$router->get('/show_item', function () {
    require 'view/item/Ishow.php';
});

$router->get('/show_iten', function () {
    require 'view/item/show.php'; // Assuming 'show_iten' is a typo and should be 'show_item'
});

$router->get('/choice', function () {
    (new ItemController())->handleItemDetails();
});

$router->get('/showitem', function () {
    (new ItemController())->viewItem();
});

$router->get('/delete_item', function () {
    require 'view/item/delete_item.php';
});

$router->post('/deleteItem', function () {
    (new ItemController())->deleteItem();
});

$router->post('/pay', function () {
    require 'view/item/pay.php';
});

$router->post('/add_item', function () {
    require 'controller/item/upload.php'; // Assuming 'add item' is a typo and should be 'add_item'
});

$router->get('/pay', function () {
    require 'view/item/pay.php';
});

$router->post('/pay', function () {
    require 'view/item/pay.php';
});

$router->route($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
