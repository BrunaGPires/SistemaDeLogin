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

$params = [
    'controller' => $controller,
    'action' => $action,
    'item' => $_GET['id'] ?? null,
];

$route = 'App\\Controllers\\' . ucfirst($params['controller']) . 'Controller::' . $params['action'];
$classPath = '\\App\\Controllers\\' . ucfirst($params['controller']) . 'Controller';

include __DIR__ . '/includes/header.php';
if (method_exists($classPath, $params['action'])) {
    if ($params['controller'] === 'user' && $params['action'] === 'edit') {
        // rota para action edit pegando o id na url
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $response = call_user_func($route, $id); // passa id como parametro
    } elseif($params['controller'] === 'user' && $params['action'] === 'delete')
    {
        // rota para action delete pegando o id na url
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $response = call_user_func($route, $id);
    } else {
        $response = call_user_func($route);
    }
    echo $response;
} else {
    echo 'Controller: ' . $params['controller'] . ', Action: ' . $params['action'];
    require(__DIR__ . '/App/Views/404.php');
}
die();