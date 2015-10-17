<?php

namespace app\Library;

class Bootstrap
{
    public function run()
    {
        require_once __DIR__.'/../resources/views/index.php';
    }
}
