<?php

namespace XProject\XFusion\App\Core;

use XProject\XFusion\App\Exceptions\RouteNotFoundException;

class RouteManager
{
    private static array $namedRoutes = [];

    public static function addNamedRoute(string $name, array $route): void
    {
        self::$namedRoutes[$name] = $route;
    }

    /**
     * @throws RouteNotFoundException
     */
    public static function getRouteByName(string $name): ?array
    {
        if (!isset(self::$namedRoutes[$name])) {
            throw new RouteNotFoundException("Route with name '{$name}' not found");
        }
        return self::$namedRoutes[$name];
    }
    public  static function generateUrl(string $name, array $params = []): ?string
    {
        $route = self::getRouteByName($name);
        if (!$route) {
            return null;
        }

        $url = $route['route'];
        foreach ($params as $key => $value) {
            $url = str_replace('{' . $key . '}', $value, $url);
        }
        return $url;
    }

    public static function redirectToRoute(string $name, array $params = []): void
    {
        $url = self::generateUrl($name, $params);
        if ($url) {
            header("Location: $url");
            exit;
        }
    }
}