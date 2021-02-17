<?php

require_once __DIR__.'/../vendor/autoload.php';
session_start();

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

use Nakul\Routers\Web as Router;
use App\Controllers\HomeController;
use App\Controllers\PostController;

$web = new Router();


$web->route("/", function (){
    $app = new HomeController();
    print_r($app->all());
});

$web->route("/create", function (){
    $app = new PostController();
    $app->store();
});

$web->route("/edit", function (){
    $app = new PostController();
    $app->update();
});

$web->route("/delete", function (){
    $app = new PostController();
    $app->delete();
});

$web->route("/active-or-dactive", function (){
    $app = new PostController();
    $app->activeOrDactive();
});

$web->route("/active", function (){
    $app = new HomeController();
    print_r($app->active());
});

$web->route("/completed", function (){
    $app = new HomeController();
    print_r($app->completed());
});

$web->route("/clear-completed", function (){
    $app = new PostController();
    print_r($app->clearCompleted());
});



$action = $_SERVER['REQUEST_URI'];
$web->dispatch($action);