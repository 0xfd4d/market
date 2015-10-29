<?php

namespace App\Library;

class Bootstrap
{
    public function run()
    {
        $dotenv = new \Dotenv\Dotenv(__DIR__.'/../../');
        $dotenv->load();
        DB::init();
        Session::init();
        require_once __DIR__.'/../routes.php';
    }
}
