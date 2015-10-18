<?php

use App\Library\View;
use App\Library\Route;
use App\Library\CallMethod;

$route = new Route();

$route->add('/', function($request) {
    CallMethod::call('\\App\\Controllers\\IndexController', 'index', [$request]);
});

$route->add('/test/:id', function($request) {
    CallMethod::call('\\App\\Controllers\\IndexController', 'test', [$request]);
});

/**
 * Call 404 error if none of this routes not run.
 */
View::view('404');
