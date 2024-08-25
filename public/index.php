<?php

require  __DIR__ . "/../bootstrap/app.php";


use XProject\XFusion\App\Core\{Handler\ErrorHandler, Router, Route};

// Get all routes
$routes = Route::getRoutes();

// Initialize router
$router = new Router($routes);

$request = \XProject\XFusion\App\Http\Request::capture();

$router->handleRequest($request);