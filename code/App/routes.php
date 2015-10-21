<?php

use App\Library\DB;
use App\Library\View;
use App\Library\Route;
use App\Library\Request;

use App\Library\Auth;

Route::init();

Route::add('GET', '/', '\\App\\Controllers\\ItemController', 'index');
Route::add('GET', '/show/(\w+)', '\\App\\Controllers\\ItemController', 'show');
Route::add('POST', '/create', '\\App\\Controllers\\ItemController', 'create');

//Route::add('GET', '/cart', '\\App\\Controllers\\CartController', 'index');
//Route::add('GET', '/shop', '\\App\\Controllers\\ItemController', 'index');

Route::add('GET', '/auth/login', '\\App\\Controllers\\AuthController', 'loginView');
Route::add('POST', '/auth/login', '\\App\\Controllers\\AuthController', 'login');
Route::add('GET', '/auth/register', '\\App\\Controllers\\AuthController', 'registerView');
Route::add('POST', '/auth/register', '\\App\\Controllers\\AuthController', 'register');
Route::add('GET', '/auth/logout', '\\App\\Controllers\\AuthController', 'logout');

/**
 * 404 error.
 */
Route::addCallback('ANY', '(.*)', function() {
    View::view('app', [
        'title' => '404',
        'view' => '404',
        'params' => []
        ]
    );
});
