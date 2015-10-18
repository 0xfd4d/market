<?php

namespace App\Libary;

class Request
{
    public $segments = NULL;


    public function setSegments($segments)
    {
        $this->segments = $segments;
    }
}
