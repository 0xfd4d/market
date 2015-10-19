<?php

namespace App\Controllers;

use App\Library\View;
use App\Library\Request;

class UserController extends Controller
{
    public function login(Request $request)
    {
        View::view('app', [
            'title' => 'Login',
            'view' => 'user/login'
            ]
        );
    }
    public function register(Request $request)
    {
        View::view('app', [
            'title' => 'Register',
            'view' => 'user/register'
            ]
        );
    }
}
