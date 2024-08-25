<?php

namespace XProject\XFusion\App\Core\Contracts;

interface RouterInterface
{
    public function dispatch (string $httpMethod, string $uri): void;

    public function addRoute (string $method, string $route, array $controller, array $middleware = []): void;
}