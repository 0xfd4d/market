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
        return explode("/", $url);
    }
    private function match()
    {
        foreach($this->segments as $segment)
        {

        }
    }
    public function add($url, $method)
    {
        if($this->segments == $this->getSegments($url))
        {
            $request['segments'] = $this->segments;
            $method($request);
            exit;
        }
    }
}
