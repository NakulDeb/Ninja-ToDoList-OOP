<?php


session_start();



require_once __DIR__.'/../vendor/autoload.php';





$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();




require_once __DIR__.'/../routes/web.php';





$route = new \Nakul\Routes\Web();

$action = $_SERVER['REQUEST_URI'];

$route->dispatch($action);

