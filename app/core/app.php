<?php


//this classes work as a router
class App
{
    private $controllers = "home";
    private $method = "index";
    private $params = []; 

    function __construct(){
        $url = $this->splitURL();
        if(file_exists("../app/controllers/". strtolower($url[0]) .".php")){
            $this->controllers = strtolower($url[0]);
            unset($url[0]);
        }

        require "../app/controllers/". $this->controllers .".php";
        $this->controllers = new $this->controllers;

        if(isset($url[1])){
            if(method_exists($this->controllers, $url[1])){
                $this->method= $url[1];
                unset($url[1]);
            }
        }

        //run the classes and method 

        $this->params = array_values($url);
        call_user_func_array([$this->controllers, $this->method] , $this->params);

    }

    private function splitURL(){
        $url = isset($_GET['url']) ? $_GET['url'] : "home";
        return explode("/", filter_var(trim($url,"/"),FILTER_SANITIZE_URL));
    }
}

