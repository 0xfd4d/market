<?php

namespace App\Controllers;

use App\Library\View;

class cartController extends Controller
{
    public function index($request)
    {
        View::view('cart');
    }
    public function add($request)
    {
        
    }
}
