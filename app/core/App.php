<?php

class App{
    public function __construct()
    {
        $url = $this->parseUrl();

        $controller = $this->createController($url);
        $method = $this->getMethod($controller, $url);

        if($method !== null) {
            $params = $this->getParams($url);
            call_user_func_array([$controller, $method], $params);
        }
        $controller->Show();
    }

    function createController($url){

        if(isset($url[0])){
            $controller = $url[0];
            $controllerPath = CONTROLLERS . $controller . '.php';

            if(file_exists($controllerPath)){
                require_once $controllerPath;
                $controller = new $controller();
                return $controller;
            }
        }

        $this->error404();
        exit();
    }

    function getMethod($controller, $url){
        if(isset($url[1])){
            if(method_exists($controller, $url[1])){
                return $url[1];
            }
        }
        return null;
    }

    function getParams($url){
        unset($url[0]);
        unset($url[1]);
        return array_values($url);
    }

    function error404(){
        $this->createController(['E404']);
    }

    function parseUrl(){
        if(isset($_GET['url'])){
            $cleanUrl = filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL);
            return explode('/', $cleanUrl);
        }
        return [];
    }
}