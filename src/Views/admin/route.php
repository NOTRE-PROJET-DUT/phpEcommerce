<?php

class Router
{
    private $routes = [];

    public function __construct(){

    }
    public function addRoute($method, $path, $action):void
    {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'action' => $action,
        ];
    }


    public function addMiddlewareRoute($method, $path, $action, $middleware):void
    {
        $actionAfterMiddleware = 
            function()use ($action,$middleware){ if ($middleware() === true) { $action(); } };

        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'action' => $actionAfterMiddleware,
        ];
    }

    public function route($method, $path)
    {
        foreach ($this->routes as $route) {
            if ($route['method'] == $method && $this->matchPath($route['path'], $path)) {
                return $route['action'];
            }
        }

        // Handle 404 Not Found
        return function () {
            echo "404 Not Found";
        };
    }

    private function matchPath($routePath, $requestPath)
    {
        // Simple path matching for demonstration purposes
        return $routePath == $requestPath;
    }
}