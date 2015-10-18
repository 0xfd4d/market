<?php

use App\Library\View;
use App\Library\Route;
use App\Library\CallMethod;

$route = new Route();

$route->add('/', '\\App\\Controllers\\IndexController', 'index');

$route->add('/cart', '\\App\\Controllers\\CartController', 'index');

/**
 * Call 404 error if none of this routes not run.
 */
View::view('404');
