<?php

namespace App\Library;

use App\Library\Request;

final class Route
{
    public static $routes = NULL;
    public static $request = NULL;

    public static function init()
    {
        self::$request = new Request();
        self::$request->run();
    }
    private static function match($pattern, $url)
    {
        return true;
    }
    public static function add($pattern, $class, $method)
    {
        if(self::match($pattern, self::$request->url))
        {
            CallMethod::call($class, $method, [self::$request]);
            exit;
        }
    }
    public static function addCallback($pattern, $callback)
    {
        if(self::match($pattern, self::$request->url))
        {
            $callback(self::$request);
            exit;
        }
    }
}
