<?php

namespace App\Controllers;

class IndexController
{
    public function index()
    {
        $title = "Market";
        require_once __DIR__.'/../../resources/views/index.php';
    }
}
