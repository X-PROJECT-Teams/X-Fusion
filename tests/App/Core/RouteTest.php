<?php

namespace App\Core;

use PHPUnit\Framework\TestCase;
use XProject\XFusion\App\Core\Route;

class RouteTest extends TestCase
{
    protected function setUp(): void
    {
        $reflection = new \ReflectionClass(Route::class);
        $property = $reflection->getProperty('routes');
        $property->setAccessible(true);
        $property->setValue([]);
    }

    public function testGetRoute()
    {
        Route::get('/test', ['TestController', 'index']);
        $routes = Route::getRoutes();
        $this->assertCount(1, $routes);
        $this->assertEquals('GET', $routes[0]['method']);
        $this->assertEquals('/test', $routes[0]['route']);
        $this->assertEquals(['TestController', 'index'], $routes[0]['controller']);
    }
    public function testPostRoute()
    {
        Route::get('/test', ['TestController', 'index']);
        $routes = Route::getRoutes();
        $this->assertCount(1, $routes);
        $this->assertEquals('GET', $routes[0]['method']);
        $this->assertEquals('/test', $routes[0]['route']);
        $this->assertEquals(['TestController', 'index'], $routes[0]['controller']);
    }
    public function testPutRoute()
    {
        Route::get('/test', ['TestController', 'index']);
        $routes = Route::getRoutes();
        $this->assertCount(1, $routes);
        $this->assertEquals('GET', $routes[0]['method']);
        $this->assertEquals('/test', $routes[0]['route']);
        $this->assertEquals(['TestController', 'index'], $routes[0]['controller']);
    }
    public function testDeleteRoute()
    {
        Route::delete('/test', ['TestController', 'destroy']);
        $routes = Route::getRoutes();
        $this->assertCount(1, $routes);
        $this->assertEquals('DELETE', $routes[0]['method']);
        $this->assertEquals('/test', $routes[0]['route']);
        $this->assertEquals(['TestController', 'destroy'], $routes[0]['controller']);
    }

    public function testGetRoutes()
    {
        Route::get('/test1', ['TestController', 'index']);
        Route::post('/test2', ['TestController', 'store']);
        $routes = Route::getRoutes();
        $this->assertCount(2, $routes);
    }
    public function testInvalidMethod()
    {
        $this->expectException(\TypeError::class);
        Route::get('/test', 'InvalidController');
    }

    public function testMissingParameters()
    {
        $this->expectException(\ArgumentCountError::class);
        Route::get('/test');
    }
}
