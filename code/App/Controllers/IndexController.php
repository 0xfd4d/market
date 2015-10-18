<?php

namespace App\Controllers;

use App\Library\View;

class IndexController extends Controller
{
    public function index($request)
    {
        View::view('index');
    }
}
