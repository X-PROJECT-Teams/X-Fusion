<?php

namespace XProject\XFusion\App\Core;

use http\Exception\InvalidArgumentException;
use XProject\XFusion\App\Cache\RouterCache;

class Route
{
    private static array $routes = [];
    private static array $constraints = [];
    private static ?string $prefix = null;
    private static ?string $controller = null;
    private static array $middleware = [];
    private static  $missingCallback = null;

    public static function where (string $constraints): self
    {
        $lastRoute = &self::$routes[count(self::$routes) - 1];
        self::$constraints[$lastRoute['route']] = $constraints;
        return new self;
    }
    public static function getConstraints(): array {
        return self::$constraints;
    }

    public static function get(string $route, $controller, array $middleware = []): self
    {
        return self::setRoutes('GET', $route, $controller, $middleware);
    }

    public static function post(string $route, $controller, array $middleware = []): self
    {
        return self::setRoutes('POST', $route, $controller, $middleware);
    }

    public static function put(string $route, $controller, array $middleware = []): self
    {
        return self::setRoutes('PUT', $route, $controller, $middleware);
    }

    public static function delete(string $route, $controller, array $middleware = []): self
    {
        self::setRoutes('DELETE', $route, $controller, $middleware);
        return new self;
    }
    public static function patch(string $route, $controller, array $middleware = []): self
    {
        self::setRoutes('PATCH', $route, $controller, $middleware);
        return new self;
    }
    public static function options(string $route, $controller, array $middleware = []): self
    {
        self::setRoutes('OPTIONS', $route, $controller, $middleware);
        return new self;
    }
    public static function all(string $route, $controller, array $middleware = []): self
    {
        $methods = ["GET", "POST", "PUT", "DELETE", "PATCH", "OPTIONS"];
        foreach ($methods as $method) {
            self::setRoutes($method, $route, $controller, $middleware);
        }
        return new self;
    }

    public static function prefix(string $prefix): self
    {
        self::$prefix = $prefix;
        return new self;
    }
    public static function controller(string $controller): self
    {
        self::$controller = $controller;
        return new self;
    }
    public static function middleware(array $middleware): self
    {
        self:$middleware = $middleware;
        return new self;
    }

    public static function group(callable $routes): void
    {
        $routes();
        self::resetGroupSettings();
    }
    public function missing(callable $callback): self
    {
        self::$missingCallback = $callback;
        return new self;
    }

    public static function name(string $name): self
    {
        $lastRoute = &self::$routes[count(self::$routes) - 1];
        RouteManager::addNamedRoute($name, $lastRoute);
        return new self;
    }
    public static function setRoutes(string $method, string $route, $controller, array $middleware = []): self
    {
        self::validateController($controller);
        $route = self::formatRoute($route);
        $controller = self::formatController($controller);
        $middleware = self::mergeMiddleware($middleware);

        if (self::isDuplicateRoute($method, $route)) {
            return new self;
        }

        $routeInstance = new self();
        self::$routes[] = [
            'method' => $method,
            'route' => $route,
            'controller' => $controller,
            'middleware' => $middleware,
            'missing' => &self::$missingCallback
        ];
        return $routeInstance;
    }
    public static function getRoutes(): array
    {
        $cachedRoutes = RouterCache::loadCachedRoutes();
        if ($cachedRoutes) {
            return $cachedRoutes;
        }
        return self::$routes;
    }
    private static function resetGroupSettings(): void
    {
        self::$prefix = null;
        self::$controller = null;
        self::$middleware = [];
        self::$missingCallback = null;
    }
    private static function validateController($controller): void
    {
        if (!is_callable($controller) && !is_string($controller) && !is_array($controller)) {
            throw new InvalidArgumentException("Controller must be a string, array, or callable function");
        }
    }
    private static function formatRoute(string $route): string
    {
        return self::$prefix ? self::$prefix . $route : $route;
    }

    private static function formatController($controller)
    {
        if (is_string($controller) && self::$controller) {
            return [self::$controller, $controller];
        }
        return $controller;
    }
    private static function mergeMiddleware(array $middleware): array
    {
        return array_merge(self::$middleware, $middleware);
    }
    private static function isDuplicateRoute(string $method, string $route): bool
    {
        foreach (self::$routes as $existingRoute) {
            if ($existingRoute['method'] === $method && $existingRoute['route'] === $route) {
                return true;
            }
        }
        return false;
    }
}