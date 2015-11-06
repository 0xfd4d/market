<?php

use App\Library\View;
use App\Library\Route;
use App\Library\Auth;

Route::init();

Route::add('GET', '/', '\\App\\Controllers\\ItemController', 'index');

Route::add('GET', '/shop/create', '\\App\\Controllers\\ItemController', 'create');
Route::add('POST', '/shop/create', '\\App\\Controllers\\ItemController', 'store');

Route::add('GET', '/shop/delete/(\d+)', '\\App\\Controllers\\ItemController', 'delete');

Route::add('GET', '/shop/edit/(\d+)', '\\App\\Controllers\\ItemController', 'edit');
Route::add('POST', '/shop/edit/(\d+)', '\\App\\Controllers\\ItemController', 'update');

Route::add('GET', '/shop/(\d+)/comment', '\\App\\Controllers\\CommentController', 'create');
Route::add('POST', '/shop/(\d+)/comment', '\\App\\Controllers\\CommentController', 'store');

Route::add('GET', '/shop/(\d+)', '\\App\\Controllers\\ItemController', 'show');

Route::add('GET', '/cart', '\\App\\Controllers\\CartController', 'index');
Route::add('GET', '/cart/add/(\d+)', '\\App\\Controllers\\CartController', 'add');
Route::add('GET', '/cart/remove/(\d+)', '\\App\\Controllers\\CartController', 'remove');

Route::add('GET', '/auth/login', '\\App\\Controllers\\AuthController', 'loginView');
Route::add('POST', '/auth/login', '\\App\\Controllers\\AuthController', 'login');
Route::add('GET', '/auth/register', '\\App\\Controllers\\AuthController', 'registerView');
Route::add('POST', '/auth/register', '\\App\\Controllers\\AuthController', 'register');
Route::add('GET', '/auth/logout', '\\App\\Controllers\\AuthController', 'logout');

/*
 * 404 error.
 */
Route::addCallback('ANY', '(.*)', function () {
    View::view('app', [
        'title' => '404',
        'view' => '404',
        'params' => [],
        ]
    );
});
