<?php

use App\Library\View;
use App\Library\Route;
use App\Library\Request;
use App\Library\CallMethod;

Route::init();

Route::add('/', '\\App\\Controllers\\IndexController', 'index');

// Route::addCallback('/test', function(Request $request) {
//     print_r($request);
// });

/**
 * Call 404 error if none of this routes not run.
 */
View::view('404');
