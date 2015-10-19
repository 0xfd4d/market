<?php

namespace App\Library;

class View
{
    public static function view($name, $viewParams = NULL)
    {
        include __DIR__.'/../../resources/views/'.$name.'.view.php';
    }
}
