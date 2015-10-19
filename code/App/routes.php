<?php

use App\Library\View;
use App\Library\Route;
use App\Library\Request;
use App\Library\CallMethod;

Route::init();

Route::add('/', '\\App\\Controllers\\IndexController', 'index');
Route::add('/cart', '\\App\\Controllers\\CartController', 'index');

Route::addCallback('/test/(\w+)', function(Request $request) {
    print_r($request->params);
});

Route::addCallback('/test/(\w+)/test/(\w+)/test/(\w+)', function(Request $request) {
    print_r($request->params);
});

/**
 * 404 error.
 */
Route::addCallback('(.+)', function() {
    View::view('404');
});
