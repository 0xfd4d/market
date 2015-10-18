<?php

namespace App\Controllers;

use App\Library\View;
use App\Library\Request;

class IndexController extends Controller
{
    public function index()
    {
        View::view('index');
    }
    public function test($request)
    {
        echo $id;
        //View::view('index');
    }
}
