<?php

namespace App\Controllers;

use App\Library\View;

class IndexController extends Controller
{
    public function index()
    {
        View::view('app', [
            'title' => 'Home',
            'view' => 'index/index',
            'params' => [],
            ]
        );
    }
}
