<?php

namespace Nakul\Routers;




class Web
{
    public $routes = [];

    public function __construct()
    {
        //
    }




    function route($action, \Closure $callback)
    {
        $action = trim($action, '/');
        $this->routes[$action] = $callback;
    }


    

    function dispatch($action)
    {
        $action = trim($action, '/');

        if (!array_key_exists($action, $this->routes)){
            echo "<pre>";
            print_r("Page Not Found || 404");
            echo "<pre>";
            exit();
        }

        $callback = $this->routes[$action];
        call_user_func($callback);
    }

}

