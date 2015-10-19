<?php

namespace App\Controllers;

use App\Library\View;
use App\Library\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        print_r($_POST);
    }
    public function register(Request $request)
    {
        print_r($_POST);
    }
    public function loginView(Request $request)
    {
        View::view('app', [
            'title' => 'Login',
            'view' => 'auth/login'
            ]
        );
    }
    public function registerView(Request $request)
    {
        View::view('app', [
            'title' => 'Register',
            'view' => 'auth/register'
            ]
        );
    }
}
