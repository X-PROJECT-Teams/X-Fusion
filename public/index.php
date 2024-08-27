<?php

require  __DIR__ . "/../bootstrap/app.php";


use XProject\XFusion\App\Core\{Handler\ErrorHandler, Router, Route};
use \XProject\XFusion\App\Facades\App;


// build the container

// Get all routes
$routes = Route::getRoutes();

// Initialize router
$router = new Router($routes, App::getContainer());

$request = \XProject\XFusion\App\Http\Request::capture();

$router->handleRequest($request);