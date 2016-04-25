<?php
define('REL_URL', str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']));
class Router
{
    public $data;

    public function __construct()
    {
        $this->route();
    }

    public function route()
    {
        $uri = trim(str_ireplace(REL_URL, '', $_SERVER['REQUEST_URI']), '/');
        $uri_path = explode('/', $uri);
        $this->data = $uri_path;
    }

    public function getData()
    {
        return array_shift($this->data);
    }

    public function getAllData()
    {
        return $this->data;
    }
}

Class View
{
    function render($template, $data = [])
    {
        ob_start();
        extract($data);
        include_once __DIR__ . '/' . $template . '.html';
        $res = ob_get_contents();
        ob_end_clean();
        return $res;
    }
}

$route = new Router();
$view = new View();

$templ = 'view-page';
$data = [
    'title' => $route->getData(),
    'text' => $route->getData(),
    'items' => $route->getAllData()
];

echo $view->render($templ, $data);