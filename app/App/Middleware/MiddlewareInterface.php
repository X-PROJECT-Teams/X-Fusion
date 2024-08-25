<?php

namespace XProject\XFusion\App\Middleware;

interface MiddlewareInterface
{
    public function handle(array $request, callable $next): void;
}