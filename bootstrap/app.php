<?php

require __DIR__ . "/../vendor/autoload.php";

use XProject\XFusion\App\Core\Handler\ErrorHandler;
use XProject\XFusion\App\Core\Route;
use XProject\XFusion\App\Http\Request;
use \XProject\XFusion\App\Cache\RouterCache;


// Register Error Handler
ErrorHandler::register();

if (!RouterCache::loadCachedRoutes()) {
    require __DIR__ . "/../app/Route/web.php";
    require __DIR__ . "/../app/Route/api.php";
    require __DIR__ . "/../app/Route/example.php";
    RouterCache::cacheRoutes(Route::getRoutes());

}