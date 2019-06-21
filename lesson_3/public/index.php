<?php

use App\models\User;

include($_SERVER['DOCUMENT_ROOT'] . '/../services/Autoload.php');

spl_autoload_register([new \App\services\Autoload(), 'loadClass']);

$controllerName = $_GET['c'] ?: 'user';
$actionName = $_GET['a'];

$controllerName = 'App\\controllers\\' . ucfirst($controllerName) . 'Controller';

if (class_exists($controllerName)) {
    $controller = new $controllerName();
    $controller->run($actionName);
}