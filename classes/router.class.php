<?php

class Router
{

    protected $controller;
    
    protected $action;

    public $params;


    public function __construct()
    {
        $this->route();
    }

    public function route()
    {
        $uri = trim(str_ireplace(REL_URL, '', $_SERVER['REQUEST_URI']), '/');
        $uri_path = explode('/', $uri);
        print_r($uri_path);
        $this->controller = isset($uri_path[0]) ? array_shift($uri_path) : null;
        $this->action = sizeof($uri_path) ? array_shift($uri_path) : null;
        $this->params = sizeof($uri_path) ? $uri_path : null;

    }

    public function getController()
    {
        return $this->controller;
    }

    public function getAction()
    {
        return $this->controller;
    }

    public function getParam($key = null)
    {   
        if (isset($key)) {
            return $this->params[$key];
        }
        return isset($params[0]) ? array_shift($this->params) : null;
    }

    public function getAllParams()
    {
        return $this->params;
    }
}
