<?php

namespace App\Library;

use App\Library\URL;

class Route
{
    public static function add($url, $method)
    {
        if(URL::segments(URL::get()) == URL::segments($url))
        {
            $method();
            exit;
        }
    }
}
