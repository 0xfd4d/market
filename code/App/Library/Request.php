<?php

namespace App\Library;

class Request
{
    public $url = null;
    public $params = null;
    public $segments = null;
    public $requestMethod = null;
    public $post = [];
    public $errors = null;

    public function getURL()
    {
        return $this->formatUrl($_SERVER['REQUEST_URI']);
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
    public function formatPost()
    {
        $posts = $_POST;
        foreach ($posts as $post => $key) {
            $posts[$key] = trim($post);
        }

        return $posts;
    }
    public function hasPost($post)
    {
        if (isset($this->post[$post])) {
            if (strlen($this->post[$post])) {
                return $this->post[$post];
            }
        }

        return false;
    }
    public function run()
    {
        $this->url = $this->getUrl();
        $this->segments = $this->getSegments($this->url);
        $this->requestMethod = $this->getMethod();
        $this->post = $this->formatPost();
    }
}
