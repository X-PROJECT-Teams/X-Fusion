<?php

use XProject\XFusion\App\Core\{Route, RouteManager};

if (!function_exists('redirect')) {
    function redirect($url = null)
    {
        if ($url) {
            header("Location: $url");
            exit();
        }
        return new class {
            public function action(array $action, array $params = [])
            {
                [$controller, $method] = $action;
                if (class_exists($controller) && method_exists($controller, $method)) {
                    $controllerInstance = new $controller;
                    call_user_func_array([$controllerInstance, $method], $params);
                } else {
                    throw new InvalidArgumentException("Controller or method does not exist");
                }
            }

            public function route(string $name, array $params = [])
            {
                $route = RouteManager::getRouteByName($name);
                if ($route) {
                    $url = $route['route'];
                    foreach ($params as $key => $value) {
                        $url = str_replace("{{$key}}", $value, $url);
                    }
                    header("Location: $url");
                    exit;
                } else {
                    throw new InvalidArgumentException("Route does not exist");
                }
            }

        };
    }
}