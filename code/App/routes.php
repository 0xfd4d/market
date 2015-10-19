<?php

use App\Library\View;
use App\Library\Route;
use App\Library\Request;
use App\Library\CallMethod;

Route::init();

Route::add('GET', '/', '\\App\\Controllers\\IndexController', 'index');
Route::add('GET', '/cart', '\\App\\Controllers\\CartController', 'index');

Route::add('GET', '/auth/login', '\\App\\Controllers\\UserController', 'login');
Route::add('GET', '/auth/register', '\\App\\Controllers\\UserController', 'register');

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
