<?php

namespace XProject\XFusion\App\Facades;

use http\Exception\RuntimeException;

abstract class Facade
{
    protected static array $resolvedInstances = [];

    protected static function getFacadeAccessor()
    {
        throw new RuntimeException('Facade does not implement getFacadeAccessor method.');
    }

    public static function __callStatic($method, $args)
    {
        $instance = static::resolvedInstances(static::getFacadeAccessor());

        if (!$instance) {
            throw new RuntimeException('A facade root has not been set.');
        }

        return $instance->$method(...$args);
    }

    protected static function resolveFacadeInstance($name)
    {
        if (is_object($name)) {
            return $name;
        }

        if (isset(static::$resolvedInstances[$name])) {
            return static::$resolvedInstances[$name];
        }

        return static::$resolvedInstances[$name] =  new $name;
    }
}