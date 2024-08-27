<?php

namespace XProject\XFusion\TodoList\Controller;

use XProject\XFusion\TodoList\Service\CounterService;

class Counter2Controller
{
    protected CounterService $counterService;

    public function __construct(CounterService $counterService)
    {
        $this->counterService = $counterService;
    }

    public function index()
    {
        $this->counterService->increment();

        echo "Counter: " . $this->counterService->getCounter() . PHP_EOL;
    }
}