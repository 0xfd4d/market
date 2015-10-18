<?php

namespace App\Library;

class Bootstrap
{
    public function run()
    {
        require_once __DIR__.'/../routes.php';
    }
}
