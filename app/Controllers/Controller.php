<?php


namespace App\Controllers;


use App\Models\Post;

class Controller
{

    public function __construct()
    {
        //
    }



    
    public function View($view, $parames = [])
    {
        $renderedLayout = $this->renderLayout($parames);
        $renderedView =  $this->renderView($view, $parames);
        return str_replace("@yield('content')", $renderedView, $renderedLayout);
    }




    protected function renderLayout($parames)
    {
        ob_start();
        extract($parames);
        require_once __DIR__."/../../view/layouts/app.php";
        return ob_get_clean();
    }




    protected function renderView($view, $parems)
    {
        ob_start();
        extract($parems);
        include_once __DIR__."/../../view/$view.php";;
        return ob_get_clean();
    }




    public static function back(){
        header("location: ".$_SESSION['REDIRECT_PATH']);
    }



    
    public static function sanitize($data){
        $data = filter_var($data, FILTER_SANITIZE_STRING);
        $data = strip_tags($data);
        $data = htmlspecialchars($data);
        return $data;
    }





    protected static function methodMustBe(string $method = 'GET')
    {
        echo $method;
        if($_SERVER['REQUEST_METHOD'] !== strtoupper($method)){
            echo '<pre>';
            print_r('POST method do not support Get Mothod...');
            exit();
        }
    }
}

