<?php

require_once __DIR__.'/../vendor/autoload.php';
session_start();

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

use Nakul\Routers\Web as Router;
use App\Controllers\HomeController;
use App\Controllers\PostController;



Router::get("/", [HomeController::class, 'all']);

Router::post("/create", [PostController::class, 'store']);

Router::post("/edit", [PostController::class, 'update']);

Router::post("/delete", [PostController::class, 'delete']);

Router::post("/active-or-dactive", [PostController::class, 'activeOrDactive']);

Router::get("/active", [HomeController::class, 'active']);

Router::get("/completed", [HomeController::class, 'completed']);

Router::post("/clear-completed", [PostController::class, 'clearCompleted']);



$action = $_SERVER['REQUEST_URI'];
Router::dispatch($action);