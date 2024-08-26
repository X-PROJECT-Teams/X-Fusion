<?php

require __DIR__ . "/../vendor/autoload.php";
require __DIR__ . "/../app/App/Helper/config.php";

use XProject\XFusion\App\Core\Handler\ErrorHandler;
use \XProject\XFusion\App\Core\Config\Config;
use \XProject\XFusion\App\Cache\RouterCache;
use \Dotenv\Dotenv;


// Register Error Handler
ErrorHandler::register();

// load enviroment from .env
$dotenv = Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

$dotenv->required([
   'APP_NAME'
])->notEmpty();

Config::loadFromDirectory(__DIR__ . "/../app/App/Config");

if (!RouterCache::loadCachedRoutes()) {
    require __DIR__ . "/../app/Route/web.php";
    require __DIR__ . "/../app/Route/api.php";
    require __DIR__ . "/../app/Route/example.php";
    // disable feature cache router
    // RouterCache::cacheRoutes(Route::getRoutes());
}