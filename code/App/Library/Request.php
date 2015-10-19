<?php

namespace App\Library;

class Request
{
    public $url = NULL;
    public $segments = NULL;
    public $requestMethod = NULL;

    public function getURL()
    {
        return $_SERVER['REQUEST_URI'];
    }
    public function getSegments($url)
    {
        $return = $url;
        $return = urldecode(rtrim($return, '/'));
        $return = preg_split("/\//", $return);
        array_shift($return);
        return $return;
    }
    public function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
    public function run()
    {
        $this->url = $this->getUrl();
        $this->segments = $this->getSegments($this->getUrl());
        $this->requestMethod = $this->getMethod();
    }
}
