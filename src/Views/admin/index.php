<?php

require_once '../route.php';
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

            require __DIR__ . '/pages/sign-in.php';
        });
        $this->server->addRoute('GET', '/sign-up', function () {


            require __DIR__ . '/pages/sign-up.php';
        });
        $this->server->addRoute('GET', '/changePassword', function () {


            require __DIR__ . '/pages/changepassword.php';
        });
        $this->server->addRoute('GET', '/createProduct', function () {


            require __DIR__ . '/pages/createProduct.php';
        });
        $this->server->addRoute('GET', '/profile', function () {


            require __DIR__ . '/pages/profile.php';
        });
        $this->server->addRoute('GET', '/dashboard', function () {


            require __DIR__ . '/pages/dashboard.php';
        });
        $this->server->addRoute('GET', '/forgetPassword', function () {


            require __DIR__ . '/pages/forgetPassword.php';
        });
        $this->server->addRoute('GET', '/tables', function () {


            require __DIR__ . '/pages/tables.php';
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

