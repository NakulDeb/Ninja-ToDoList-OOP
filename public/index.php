<?php

require_once __DIR__.'/../vendor/autoload.php';
session_start();

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

use Nakul\Routers\Web as Router;
use App\Controllers\HomeController;
use App\Controllers\PostController;



Router::get("/", function (){
    $app = new HomeController();
    print_r($app->all());
});

Router::post("/create", function (){
    $app = new PostController();
    $app->store();
});

Router::post("/edit", function (){
    $app = new PostController();
    $app->update();
});

Router::post("/delete", function (){
    $app = new PostController();
    $app->delete();
});

Router::post("/active-or-dactive", function (){
    $app = new PostController();
    $app->activeOrDactive();
});

Router::get("/active", function (){
    $app = new HomeController();
    print_r($app->active());
});

Router::get("/completed", function (){
    $app = new HomeController();
    print_r($app->completed());
});

Router::post("/clear-completed", function (){
    $app = new PostController();
    print_r($app->clearCompleted());
});



$action = $_SERVER['REQUEST_URI'];
Router::dispatch($action);