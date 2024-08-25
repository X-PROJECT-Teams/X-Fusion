<?php

namespace XProject\XFusion\App\Core\Handler;

use Whoops\Run;

class ErrorHandler
{
    public static function register(): void
    {
        $whoops = new Run();
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());
        $whoops->register();
    }
}