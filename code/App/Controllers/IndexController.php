<?php

namespace App\Controllers;

use App\Library\View;

class IndexController extends Controller
{
    public function index()
    {
        View::view('index');
    }
    public function test($id)
    {
        echo $id;
        //View::view('index');
    }
}
