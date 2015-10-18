<?php

namespace App\Library;

class Route
{
    public function get()
    {
        return $_SERVER['REQUEST_URI'];
    }
    public function segments($url)
    {
        return explode("/", $url);
    }
    public function add($url, $method)
    {
        if($this->segments($this->get()) == $this->segments($url))
        {
            $method();
            exit;
        }
    }
}
