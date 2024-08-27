<?php

namespace XProject\XFusion\TodoList\Controller;

use XProject\XFusion\App\Core\Controller;
use XProject\XFusion\TodoList\Service\TestInjectService;
use XProject\XFusion\TodoList\Service\TestService;

class TestController extends Controller
{
    protected TestService $testService;
    protected TestInjectService $testInjectService;
    public function __construct(TestService $testService, TestInjectService $testInjectService)
    {
        $this->testService = $testService;
        $this->testInjectService = $testInjectService;
    }

    public function test(): void
    {

        $this->jsonResponse(['message' => 'Hello World']);

    }
}