<?php

namespace XProject\XFusion\App\Facades;

use DI\DependencyException;
use DI\NotFoundException;
use DI\Container;

class App
{
    protected static Container $container;

    public static function setContainer(Container $container): void
    {
        self::$container = $container;
    }

    public static function bind(string $abstract, callable $concrete)
    {
        self::$container->bind($abstract, $concrete);
    }

    public static function singleton(string $abstract, callable $concrete): void
    {
        self::$container->singleton($abstract, $concrete);
    }

    /**
     * @throws DependencyException
     * @throws NotFoundException
     */
    public static function make(string $name, $parameters = []): mixed
    {
        return self::$container->make($name, $parameters);
    }

    public static function getContainer(): Container
    {
        return self::$container;
    }

    public static function loadBindings()
    {
        $bindings = require __DIR__ . "/../Config/bindings.php";

        foreach ($bindings['bindings'] as $abstract => $concrete) {
            self::bind($abstract, $concrete);
        }

        foreach ($bindings['singletons'] as $abstract => $concrete) {
            self::singleton($abstract, $concrete);
        }
    }
}