<?php
define('ROOT_DIR', __DIR__);
define('REL_URL', str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']));

require "vendor/autoload.php";

$route = new Router();
$view = new View();

$templ = 'view-page';
$data = [
    'page' => $route->getController(),
    'title' => $route->getAction(),
    'items' => $route->getAllParams()
];

echo $view->render($templ, $data);