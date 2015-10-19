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
        $pattern = self::$request->formatUrl($pattern);
        if(preg_match('#^'.$pattern.'$#', $url, $params))
        {
            self::$request->setParams($params);
            return true;
        }
        return false;
    }
    public static function methodRequestMatch($requestMethod)
    {
        if(self::$request->requestMethod == $requestMethod)
        {
            return true;
        }
        if($requestMethod == 'ANY')
        {
            return true;
        }
        return false;
    }
    public static function add($requestMethod, $pattern, $class, $method)
    {
        if(self::match($pattern, self::$request->url) && self::methodRequestMatch($requestMethod))
        {
            CallMethod::call($class, $method, [self::$request]);
            exit;
        }
    }
    public static function addCallback($requestMethod, $pattern, $callback)
    {
        if(self::match($pattern, self::$request->url) && self::methodRequestMatch($requestMethod))
        {
            $callback(self::$request);
            exit;
        }
    }
}
