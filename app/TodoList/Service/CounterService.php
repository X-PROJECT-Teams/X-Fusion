<?php

namespace XProject\XFusion\TodoList\Service;


use XProject\XFusion\App\Annotations\Singleton;
use XProject\XFusion\App\Core\Traits\SingletonTrait;



class CounterService
{

    protected  CounterSingleton $counterSingleton;
    public function __construct() {
        $this->counterSingleton = CounterSingleton::getInstance();
    } // Constructor can be empty

    public function increment(): int
    {
        return $this->counterSingleton->increment();
    }

    public function getCounter(): int
    {
        return $this->counterSingleton->increment();
    }
}