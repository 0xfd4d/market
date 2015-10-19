<?php

namespace App\Library;

use App\Library\Request;

final class Route
{
    public static $request = NULL;

    public static function init()
    {
        self::$request = new Request();
        self::$request->run();
    }
    private static function match($pattern, $url)
    {
        $pattern = '#^'.$pattern.'$#';
        if(preg_match($pattern, $url, $params))
        {
            return $params;
        }
        return false;
    }
    public static function add($pattern, $class, $method)
    {
        if($params = self::match($pattern, self::$request->url))
        {
            array_shift($params);
            self::$request->params = $params;
            CallMethod::call($class, $method, [self::$request]);
            exit;
        }
    }
    public static function addCallback($pattern, $callback)
    {
        if($params = self::match($pattern, self::$request->url))
        {
            array_shift($params);
            self::$request->params = $params;
            $callback(self::$request);
            exit;
        }
    }
}
