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
            '/'               => fn() => View('homePage'),
            '/about-us'       => fn() => View('about-us'),
            '/sign-in'        => fn() => View('sign-in'),
            '/sign-up'        => fn() => View('sign-up'),
            '/cart'           => fn() => View('cart'),
            '/forgetPassword' => fn() => View('forgetPassword'),
            '/product'        => fn() => View('product'),
            '/profileAdmin'   => fn() => View('profileAdmin'),
            '/contact-us'     => fn() => View('contact-us'),
            '/admin'          => fn() => header('Location: http://localhost:8001/'),

            '/profile'        => fn() => handleMiddlewareAndView('profile','userAuth'),
        ];

        $this->server->addRoutes('GET',$routesGet);

        $routesPost = [
            '/sign-in'        => fn() => View('sign-in'),
            '/sign-up'        => fn() => View('sign-up'),
            '/forgetPassword' => fn() => View('forgetPassword'),

            '/profile'        => fn() => handleMiddlewareAndView('profile','userAuth'),
        ];

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
