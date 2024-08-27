<?php

require __DIR__ . "/../vendor/autoload.php";
require __DIR__ . "/../app/App/Helper/config.php";

use XProject\XFusion\App\Core\Handler\ErrorHandler;
use \XProject\XFusion\App\Core\Config\Config;
use \XProject\XFusion\App\Cache\RouterCache;
use \Dotenv\Dotenv;
use XProject\XFusion\App\Facades\App;
use \XProject\XFusion\App\Core\Container;
use XProject\XFusion\TodoList\Service\CounterService;

// Register Error Handler
ErrorHandler::register();

// load enviroment from .env
$dotenv = Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

$dotenv->required([
   'APP_NAME'
])->notEmpty();

Config::loadFromDirectory(__DIR__ . "/../app/App/Config");

$containerBuilder = new \DI\ContainerBuilder();
$containerBuilder->useAutowiring(true);




try {
    $container = $containerBuilder->build();
} catch (Exception $e) {
    echo $e->getMessage();
    exit();
}

App::setContainer($container);


if (!RouterCache::loadCachedRoutes()) {
    require __DIR__ . "/../app/Route/web.php";
    require __DIR__ . "/../app/Route/api.php";
    require __DIR__ . "/../app/Route/example.php";
    // disable feature cache router
    // RouterCache::cacheRoutes(Route::getRoutes());
}