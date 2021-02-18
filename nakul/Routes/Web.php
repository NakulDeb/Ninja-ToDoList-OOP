<?php

namespace Nakul\Routes;




class Web
{
    public $routes = [];

    public function __construct()
    {
        //
    }


    static function get($action, $callback)
    {
        global $routes;
        $action = trim($action, '/');
        $routes[$action] = $callback;
    }


    static function post($action, $callback)
    {
        global $routes;
        $action = trim($action, '/');
        $routes[$action] = $callback;
    }


    

    function dispatch($action)
    {
        global $routes;
        $action = trim($action, '/');

        if (!array_key_exists($action, $routes)){
            echo "<pre>";
            print_r("Page Not Found || 404");
            echo "<pre>";
            exit();
        }

        $callback = $routes[$action];
        print_r(call_user_func($callback));
    }


}

