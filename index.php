<?php

require __DIR__ . '/vendor/autoload.php';

if (!isset($_GET['page'])) {
    $page = 'home';
} else {
    $page = $_GET['page'];
}

$uri = $_SERVER['REQUEST_URI'];
$uri = explode('/', $uri);
$uri = array_filter($uri);
rsort($uri);

$controller = isset($uri[0]) ? $uri[0] : 'home';
$action = isset($uri[1]) ? explode("?", $uri[1])[0] : 'view';
$routeParam = $uri[2] ?? null;

$payload = [
    'controller' => $controller,
    'action' => $action,
    'routeParam' => $routeParam,
];

$route = 'App\\Controllers\\' . ucfirst($payload['controller']) . 'Controller::' . $payload['action'];
$classPath = '\\App\\Controllers\\' . ucfirst($payload['controller']) . 'Controller';

include __DIR__ . '/includes/header.php';

if (!method_exists($classPath, $payload['action'])) {
    echo 'Controller: ' . $payload['controller'] . ', Action: ' . $payload['action'];
    require(__DIR__ . '/App/Views/404.php');
}

$response = call_user_func($route, $payload['routeParam']);
echo $response;