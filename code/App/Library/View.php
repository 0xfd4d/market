<?php

namespace App\Library;

class View
{
    public static function view($name, $viewParams = null)
    {
        include __DIR__.'/../../resources/views/'.$name.'.view.php';
    }
    public static function escape($string)
    {
        return htmlspecialchars($string);
    }
}
