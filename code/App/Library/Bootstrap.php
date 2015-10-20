<?php

namespace App\Library;

use App\Library\DB;
use App\Library\Session;

class Bootstrap
{
    public function run()
    {
        DB::init();
        Session::init();
        require_once __DIR__.'/../routes.php';
    }
}
