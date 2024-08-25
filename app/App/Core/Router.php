<?php

namespace XProject\XFusion\App\Core;

use FastRoute\Dispatcher;
use FastRoute\RouteCollector;
use XProject\XFusion\App\Core\Handler\ErrorHandler;
use \XProject\XFusion\App\Http\Request;
use XProject\XFusion\App\Core\Contracts\RouterInterface;
use XProject\XFusion\App\Http\Response;
use XProject\XFusion\App\Middleware\MiddlewareInterface;
use function FastRoute\simpleDispatcher;

class Router implements RouterInterface
{
    protected $dispatcher;

    public function __construct(array $routes)
    {


        $this->dispatcher = simpleDispatcher(function (RouteCollector $r) use ($routes) {
            foreach ($routes as $route) {
                $r->addRoute($route['method'], $route['route'], $route['controller']);
            }
        });
    }

    public function addRoute(string $method, string $route, array $controller, array $middleware = []): void
    {
        Route::setRoutes($method, $route, $controller, $middleware);
    }

    public function dispatch(string $httpMethod, string $uri): void
    {
        // Strip query string (?foo=bar) and decode URI
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        $uri = rawurldecode($uri);

        $routeInfo = $this->dispatcher->dispatch($httpMethod, $uri);
        switch($routeInfo[0]) {
            case Dispatcher::NOT_FOUND:
                // handle 404
                $missingCallback = $this->findMissingCallback($httpMethod, $uri);
                if ($missingCallback) {
                    $request = new Request($_REQUEST);
                    call_user_func_array($missingCallback, (array) $request);
                } else {
                    header("HTTP/1.0 404 Not Found");
                    echo json_encode(['error' => '404 Not Found']);
                }

                break;
            case Dispatcher::METHOD_NOT_ALLOWED:
                $allowedMethods = $routeInfo[1];
                header("HTTP/1.0 405 Method Not Allowed");
                echo json_encode(['error' => '405 Method Not Allowed']);
                break;
            case Dispatcher::FOUND:
                $handler = $routeInfo[1];
                $vars = $routeInfo[2];

                if (is_callable($handler)) {
                    call_user_func_array($handler, $vars);
                } else {
                    [$class, $method] = $handler;

                    if (class_exists($class) && method_exists($class, $method)) {
                        $classInstance = new $class;
                        $this->applyMiddleware($classInstance, $vars, $routeInfo);
                        call_user_func_array([$classInstance, $method], $vars);
                    }
                }
                break;
        }
    }

    private function applyMiddleware($controller, $vars, $routeInfo): void
    {
        $middlewares = $routeInfo['middleware'] ?? [];
        $request = [
            'controller' => $controller,
            'vars' => $vars
        ];

        $next = function ($request) use ($routeInfo) {
            [$class, $method] = $routeInfo[1];
            call_user_func_array([$request['controller'], $method], $request['vars']);
        };

        foreach (array_reverse($middlewares) as $middleware) {
            $next = function ($request) use ($middleware, $next) {
                $middlewareInstance = new $middleware();
                if ($middlewareInstance instanceof MiddlewareInterface) {
                    $middlewareInstance->handle($request, $next);
                }
            };
        }

        $next($request);
    }

    public function handleRequest(Request $request): void
    {
        $httpMethod = $request->getMethod();
        $uri = $request->getUri();
        $this->dispatch($httpMethod, $uri);
    }

    private function findMissingCallback(string $httpMethod, string $uri)
    {
        foreach (Route::getRoutes() as $route) {
            if ($route['method'] === $httpMethod && $route['route'] === $uri) {
                return $route['missing'] ?? null;
            }
        }
        return null;
    }
}