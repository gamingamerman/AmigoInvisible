<?php

require_once '../vendor/autoload.php';

//Vistas
use Philo\Blade\Blade;

$views = '../src/views';
$cache = '../cache';

$blade = new Blade($views, $cache);

// Router system
$router = new AltoRouter();

// Lista de rutas
$router -> map('GET', '/', 'home');
$router -> map('GET', '/user', 'userController#index');
$router -> map('GET', '/user/[i:id]', 'userController#show');
// $router -> map('GET', '/user/create', 'userController#create');
$router -> map('GET', '/user/create', 'create');




// End of List

$match = $router->match();
if($match) {
 $target = $match["target"];
 if(is_string($target) && strpos($target, "#") !== false) {
     list($controller, $action) = explode("#", $target);
     $controller = "Dsw\\Amigoinvisible\\controllers\\" . $controller;
     $controller = new $controller;
     $controller->$action($match["params"]);
 } else {
     if(is_callable($match["target"])) call_user_func_array($match["target"], $match["params"]);
     else echo $blade->view()->make($match["target"])->render();
 }
} else {
 echo "Ruta no válida";
 die();
}
