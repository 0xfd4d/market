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
        return rtrim($_SERVER['REQUEST_URI'], '/');
    }
    public function getSegments($url)
    {
        $return = preg_split('/\//', $url, -1, PREG_SPLIT_NO_EMPTY);
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
