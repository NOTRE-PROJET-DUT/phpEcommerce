<?php

require_once 'route.php';


class App
{
    private static ?App $instance = null; // Specify null as the default value
    private $server;
    private static $Output = null;

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


            require __DIR__ . '/dashboard.php';
        });
    }
}






// Simulate a request
$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestPath = $_SERVER['REQUEST_URI'];

// Route the request
$server = App::getServer();
$action = $server->route($requestMethod, $requestPath);

// Execute the matched action
$action();



// require_once 'route.php';


// // Define routes
// $router->addRoute('GET', '/', function () {
//     include 'Views/user/page/profile.php';;
//     // exit;
// });

// $router->addRoute('GET', '/about', function () {
//     header('Location: /login');
//     exit;
// });

// $router->addRoute('GET', 'src/contact', function () {
//     header('Location: /login');
//     exit;
// });
