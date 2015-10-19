<?php

use App\Library\View;
use App\Library\Route;
use App\Library\Request;
use App\Library\CallMethod;

Route::init();

Route::add('GET', '/', '\\App\\Controllers\\IndexController', 'index');
Route::add('GET', '/cart', '\\App\\Controllers\\CartController', 'index');

Route::addCallback('GET', '/', function(Request $request) {
    print_r($request);
});

Route::addCallback('GET', '/test/(\w+)/test/(\w+)/test/(\w+)', function(Request $request) {
    print_r($request->params);
});

/**
 * 404 error.
 */
Route::addCallback('ANY', '(.*)', function() {
    View::view('404');
});
