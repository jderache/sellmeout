<?php
spl_autoload_register(function($class){
    include_once($class . ".php");
});

session_start();

$json = file_get_contents("route.json");

$routes = json_decode($json);

$result = [];
foreach ($routes as $route) {
    if(preg_match("|^".$route->path. "$|",$_SERVER["REQUEST_URI"]) && $route->method == $_SERVER["REQUEST_METHOD"]){
        array_push($result, $route);
    }
}
if (count($result) == 1) {
    if(!empty($result[0]->auth)) {
        if(!isset($_SESSION['user'])) {
            header('Location: /Login');
        }elseif(array_search($_SESSION['user']->role, $result[0]->auth) === false) {
            header("Location: /error");
        }
    }

    preg_match("|^".$result[0]->path. "$|",$_SERVER["REQUEST_URI"],$match);
    unset($match[0]);
    $params = array_merge($match, $_POST);
    $controllerName = "\\Controller\\" .$result[0]->controller."Controller";
    $controller = new $controllerName($result[0]);

    $controller->{$result[0]->action}(...$params);
} else {
    echo 'pas de route :(';
}
