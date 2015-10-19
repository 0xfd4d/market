<?php

namespace App\Library;

class View
{
    public static function view($name)
    {
        include __DIR__.'/../../resources/views/'.$name.'.view.php';
    }
}
