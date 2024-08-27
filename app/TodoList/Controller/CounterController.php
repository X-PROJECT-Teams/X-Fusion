<?php

namespace XProject\XFusion\TodoList\Controller;

use XProject\XFusion\App\Core\Controller;
use XProject\XFusion\TodoList\Service\CounterService;

class CounterController extends Controller
{
    protected CounterService $counterService;

    public function __construct(CounterService $counterService)
    {
        $this->counterService = $counterService;
    }

    public function index()
    {
        $this->counterService->increment();
        $this->counterService->increment();
        $this->counterService->increment();

        $this->jsonResponse(['counter' => $this->counterService->getCounter()]);
    }
}