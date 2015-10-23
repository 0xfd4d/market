<?php

namespace App\Library;

use App\Library\DB;
use App\Library\Session;

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
