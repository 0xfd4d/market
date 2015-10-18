<?php

namespace App\Library;

class View
{
    public static function view($name)
    {
        require_once __DIR__.'/../../resources/views/'.$name.'.php';
    }
}
