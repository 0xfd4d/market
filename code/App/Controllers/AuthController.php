<?php

namespace App\Controllers;

use App\Library\Auth;
use App\Library\View;
use App\Library\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::check()) {
            header('Location: /');
            exit();
        }
        $errors = Auth::validateLogin($request);
        if (empty($errors[0])) {
            Auth::login($request);
            header('Location: /');
        } else {
            $request->errors = $errors;
            $this->loginView($request);
        }
    }
    public function register(Request $request)
    {
        if (Auth::check()) {
            header('Location: /');
            exit();
        }
        $errors = Auth::validateRegistration($request);
        if (empty($errors[0])) {
            Auth::register($request);
            View::view('app', [
                'title' => 'Регистарация',
                'view' => 'auth/success.register',
                'params' => [],
                ]
            );
        } else {
            $request->errors = $errors;
            $this->registerView($request);
        }
    }
    public function loginView(Request $request)
    {
        if (Auth::check()) {
            header('Location: /');
            exit();
        }
        View::view('app', [
            'title' => 'Логин',
            'view' => 'auth/login',
            'params' => [
                    'request' => $request,
                ],
            ]
        );
    }
    public function registerView(Request $request)
    {
        if (Auth::check()) {
            header('Location: /');
            exit();
        }
        View::view('app', [
            'title' => 'Регистарация',
            'view' => 'auth/register',
            'params' => [
                    'request' => $request,
                ],
            ]
        );
    }
    public function logout()
    {
        Auth::logout();
        header('Location: /');
    }
}
