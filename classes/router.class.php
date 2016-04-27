<?php

class Router
{

    protected $controller;
    
    protected $action;

    protected $params;


    public function __construct()
    {
        $this->route();
    }

    public function route()
    {
        $uri = rtrim(str_ireplace(REL_URL, '', $_SERVER['REQUEST_URI']), '/');                        
        $patern = '#\/([A-Za-z0-9\-\.\{\}]+)#i';
        preg_match_all($patern, $uri, $uri_out, PREG_PATTERN_ORDER);
        $uri_path = $uri_out[1];                 
        // print_r($uri_path);
        $this->controller = isset($uri_path[0]) ? array_shift($uri_path) : null;
        $this->action = isset($uri_path[0]) ? array_shift($uri_path) : null;
        $this->params = isset($uri_path[0]) ? $uri_path : null;
    }

    public function getController()
    {
        return $this->controller;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getParam($key = null)
    {   
        if (isset($key)) {
            return $this->params[$key];
        }
        return isset($this->params[0]) ? array_shift($this->params) : null;
    }

    public function getAllParams()
    {
        return $this->params;
    }
}
