<?php

include_once '../route.php';
include_once '../globalViewFunction.php';


class App
{
    private static ?App $instance = null; // Specify null as the default value
    private $server;

    private function __construct()
    {
        $this->server = new Router();
        $this->route();
    }

    public static function getServer(): Router
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance->server;
    }

    private function route()
    {
        $routesGet = [
            '/'               => fn() => include_once  'pages/sign-in.php',
            '/sign-up'        => fn() => include_once  'pages/sign-up.php',
            '/changePassword' => fn() => include_once  'pages/changepassword.php',
            '/createProduct'  => fn() => include_once  'pages/createProduct.php',
            '/profile'        => fn() => include_once  'pages/profile.php',
            '/dashboard'      => fn() => include_once  'pages/dashboard.php',
            '/forgetPassword' => fn() => include_once  'pages/forgetPassword.php',
            '/tables'         => fn() => include_once  'pages/tables.php',
            '/editProduct'  => fn() => include_once  'pages/editProduct.php',
        ];
        $routesPost = [
            '/createProduct'  => fn() => include_once  'pages/createProduct.php',
            '/editProduct'  => fn() => include_once  'pages/editProduct.php',
            '/tables'         => fn() => include_once  'pages/tables.php',
        ];
        
        $this->server->addRoutes('GET',$routesGet);
        $this->server->addRoutes('POST',$routesPost);
        
    }
}






// Simulate a request
$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestPath = $_SERVER['REQUEST_URI'];
$urlParts = parse_url($requestPath);
$requestPWithoutQuery = isset($urlParts['path']) ? $urlParts['path'] : '/';

// Route the request
$server = App::getServer();
$action = $server->route($requestMethod, $requestPWithoutQuery);

// Execute the matched action
$action();





// explain
// parse_url($therequestPath);
// Array
// (
//     [scheme] => https
//     [host] => www.example.com
//     [path] => /path/to/page
//     [query] => name=John&age=25
//     [fragment] => section
// )

