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
        $this->server->addRoute('GET', '/', function () {


            include_once __DIR__ . '/pages/homePage.php';
        });
        $this->server->addRoute('GET', '/about-us', function () {


            include_once __DIR__ . '/pages/about-us.php';
        });
        $this->server->addRoute('GET', '/sign-in', function () {


            include_once __DIR__ . '/pages/sign-in.php';
        });
        $this->server->addRoute('GET', '/sign-up', function () {


            include_once __DIR__ . '/pages/sign-up.php';
        });
        $this->server->addRoute('GET', '/cart', function () {


            include_once __DIR__ . '/pages/cart.php';
        });
        $this->server->addRoute('GET', '/forgetPassword', function () {


            include_once __DIR__ . '/pages/forgetPassword.php';
        });

        // $this->server->addRoute('POST', '/product', function () {


        //     include_once __DIR__ . '/pages/product.php';
        // });
         $this->server->addRoute('GET', '/product', function () {


            include_once __DIR__ . '/pages/product.php';
         });
        
        

        $this->server->addRoute('GET', '/profile', function () {


            include_once __DIR__ . '/pages/profile.php';
        });
        $this->server->addRoute('GET', '/profileAdmin', function () {


            include_once __DIR__ . '/pages/profileAdmin.php';
        });
        $this->server->addRoute('GET', '/contact-us', function () {


            include_once __DIR__ . '/pages/contact-us.php';
        });
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
