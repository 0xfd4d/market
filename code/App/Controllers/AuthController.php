<?php

namespace App\Controllers;

use App\Library\DB;
use App\Library\Auth;
use App\Library\View;
use App\Library\Request;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        $errors = Auth::validateLogin($request);
        if(empty($errors[0]))
        {
            Auth::login($request);
            header('Location: /');
        }
        else
        {
            $request->errors = $errors;
            $this->loginView($request);
        }
    }
    public function register(Request $request)
    {
        $errors = Auth::validateRegistration($request);
        if(empty($errors[0]))
        {
            Auth::register($request);
            View::view('app', [
                'title' => 'Register',
                'view' => 'auth/success.register'
                ]
            );
        }
        else
        {
            $request->errors = $errors;
            $this->registerView($request);
        }
    }
    public function loginView(Request $request)
    {
        View::view('app', [
            'title' => 'Login',
            'view' => 'auth/login',
            'request' => $request
            ]
        );
    }
    public function registerView(Request $request)
    {
        View::view('app', [
            'title' => 'Register',
            'view' => 'auth/register',
            'request' => $request
            ]
        );
    }
}
