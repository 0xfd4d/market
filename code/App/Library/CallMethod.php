<?php

namespace App\Library;

class CallMethod
{
    public static function call($class, $method, $args = null)
    {
        if (class_exists($class)) {
            $object = new $class();
            if (method_exists($object, $method)) {
                call_user_func_array([$object, $method], $args);
            }
        }
    }
}
