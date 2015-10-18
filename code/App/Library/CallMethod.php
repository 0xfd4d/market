<?php

namespace App\Library;

class CallMethod
{
    public static function call($class, $method, $args = NULL)
    {
        if(class_exists($class))
        {
            $object = new $class();
            if(method_exists($object, $method))
            {
                if($args)
                {
                    call_user_func_array([$object, $method], $args);
                }
                else
                {
                    call_user_func([$object, $method]);
                }
            }
        }
    }
}
