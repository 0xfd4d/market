<?php

use App\Library\View;
use App\Library\Route;
use App\Library\CallMethod;

Route::add('/', function() {
    CallMethod::call('\\App\\Controllers\\IndexController', 'index');
});

/**
 * Call 404 error if none of this routes not run.
 */
View::view('404');
