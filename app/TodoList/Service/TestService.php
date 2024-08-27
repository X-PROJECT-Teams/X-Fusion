<?php

namespace XProject\XFusion\TodoList\Service;

class TestService
{
    protected TestInjectService $test;
    public function __construct(TestInjectService $test)
    {
        $this->test = $test;
    }
    public function test()
    {
        $this->test->inject();
        echo "Hello Test Dependency" .  PHP_EOL;
    }
}