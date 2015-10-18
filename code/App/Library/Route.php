<?php

namespace App\Library;

use App\Library\Request;

class Route
{
    private $url = NULL;
    private $segments = NULL;
    public function __construct()
    {
        $this->url = $this->getURL();
        $this->segments = $this->getSegments($this->url);
    }
    public function getURL()
    {
        return $_SERVER['REQUEST_URI'];
    }
    public function getSegments($url)
    {
        array_shift(explode("/", $url));
        return $url;
    }
    private function match()
    {
        foreach($this->segments as $segment)
        {

        }
    }
    public function add($url, $class, $method)
    {
        if($this->segments == $this->getSegments($url))
        {
            $request['segments'] = $this->segments;
            CallMethod::call($class, $method, [$request]);
            exit;
        }
    }
}
