<?php

use App\Library\View;
use App\Library\Route;
use App\Library\CallMethod;

Route::init();

Route::add('', '\\App\\Controllers\\IndexController', 'index');
Route::add('/cart', '\\App\\Controllers\\CartController', 'index');

/**
 * 404 error.
 */
Route::addCallback('(.+)', function() {
    View::view('404');
});
