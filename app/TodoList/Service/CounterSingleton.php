<?php

namespace XProject\XFusion\TodoList\Service;


class CounterSingleton {
    private static $instance;
    private static int $counter = 0;

    private function __construct() {}

    public static function getInstance(): CounterSingleton
    {
        if (null === self::$instance) {
            self::$instance = new CounterSingleton();
        }
        return self::$instance;
    }

    public function increment(): int
    {
        return ++self::$counter;
    }

    public function getCounter(): int
    {
        return self::$counter;
    }
}