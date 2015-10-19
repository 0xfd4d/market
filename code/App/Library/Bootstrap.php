<?php

namespace App\Library;

use App\Library\DB;

class Bootstrap
{
    public function run()
    {
        DB::init();
        require_once __DIR__.'/../routes.php';
    }
}
