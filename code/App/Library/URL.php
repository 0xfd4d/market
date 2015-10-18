<?php

namespace App\Library;

class URL
{
    public static function get()
    {
        return $_SERVER['REQUEST_URI'];
    }
    public static function segments($url)
    {
        return explode("/", $url);
    }
}
