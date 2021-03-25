<?php

require __DIR__. '/../vendor/autoload.php';

$rotas = require __DIR__ . '/../config/routes.php';

if(!isset($_SERVER['PATH_INFO']) || !array_key_exists($_SERVER['PATH_INFO'], $rotas)) 
{
    http_response_code(404);
    exit();
}

$classController = $rotas[$_SERVER['PATH_INFO']];
$controller = new $classController();
$controller->processRequest();