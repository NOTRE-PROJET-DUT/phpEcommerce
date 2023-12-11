<?php

function Model($nameModel){
    include_once "../../Models/$nameModel.php";
}
function View(string $nameView){
    include_once "pages/$nameView.php";
}

function handleMiddleware(string  $nameMiddleware){
    include_once "../../Middleware/$nameMiddleware.php";
    $Middleware->handleRequest(); 
}

function handleMiddlewareAndView(string $view,string $nameMiddleware){
    handleMiddleware($nameMiddleware);
    View($view);
}

 