<?php

namespace App\Library;

class CallMethod
{
    public static function call($class, $method)
    {
        if(class_exists($class))
        {
            $object = new $class();
            if(method_exists($object, $method))
            {
                call_user_func([$object, $method]);
            }
        }
    }
}
