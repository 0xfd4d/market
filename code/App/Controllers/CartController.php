<?php

namespace App\Controllers;

use App\Library\View;
use App\Library\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        View::view('cart');
    }
}
