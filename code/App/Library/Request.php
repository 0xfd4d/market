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
        return $_SERVER['REQUEST_URI'];
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
    public function setParams($params)
    {
        array_shift($params);
        $this->params = $params;
        return $params;
    }
    public function formatUrl($url)
    {
        return '/'.trim($url, '/').'/';
    }
    public function run()
    {
        $this->url = $this->getUrl();
        $this->segments = $this->getSegments($this->url);
        $this->requestMethod = $this->getMethod();
    }
}
