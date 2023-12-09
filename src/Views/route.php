<?php

class Router
{
    private $routes = [];

    public function __construct(){

    }

    public function addRoutes($method,array $routes):void
    {//["$routes" => "$routes"]
        if (!isset($this->routes[$method]) && isset($method) && is_array($routes) && isset($routes)) {
            $this->routes[$method] = $routes;
        }
    }

    public function route($method, $path)
    {
        if (isset($this->routes[$method]) && isset($this->routes[$method][$path])) {
            return $this->routes[$method][$path];
        } 
        
        // Handle 404 Not Found
        return function () {
            echo "404 Not Found";
        };
    }


    // public function addMiddlewareRoute($method, $path, $action, $middleware):void
    // {
    //     $actionAfterMiddleware = 
    //         function()use ($action,$middleware){ if ($middleware() === true) { $action(); } };

    //     $this->routes[] = [
    //         'method' => $method,
    //         'path' => $path,
    //         'action' => $actionAfterMiddleware,
    //     ];
    // }
}