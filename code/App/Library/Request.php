<?php

namespace App\Library;

class Request
{
    public $url = NULL;
    public $params = NULL;
    public $segments = NULL;
    public $requestMethod = NULL;

    public function getURL()
    {
        return urldecode(rtrim($_SERVER['REQUEST_URI'], '/'));
    }
    public function getSegments($url)
    {
        $return = preg_split("/\//", $url);
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
        $this->segments = $this->getSegments($this->url);
        $this->requestMethod = $this->getMethod();
    }
}
