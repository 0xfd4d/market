<?php

use App\Library\DB;
use App\Library\View;
use App\Library\Route;
use App\Library\Request;

use App\Library\Debug;

Route::init();

Route::add('GET', '/', '\\App\\Controllers\\IndexController', 'index');
Route::add('GET', '/cart', '\\App\\Controllers\\CartController', 'index');

Route::add('GET', '/auth/login', '\\App\\Controllers\\AuthController', 'loginView');
Route::add('POST', '/auth/login', '\\App\\Controllers\\AuthController', 'login');
Route::add('GET', '/auth/register', '\\App\\Controllers\\AuthController', 'registerView');
Route::add('POST', '/auth/register', '\\App\\Controllers\\AuthController', 'register');

/**
 * 404 error.
 */
Route::addCallback('ANY', '(.*)', function() {
    View::view('app', [
        'title' => '404',
        'view' => '404'
        ]
    );
});
