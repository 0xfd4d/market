<?php

namespace App\Library;

use App\Library\CallMethod;

class Bootstrap
{
    public function run()
    {
        CallMethod::call('\\App\\Controllers\\IndexController', 'index');
    }
}
