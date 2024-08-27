<?php

namespace XProject\XFusion\App\Core\Traits;

trait SingletonTrait
{
    private static $instance;

    protected function __construct() {}
    private function __clone() {}
    public function __wakeup()
    {

    }

    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }
}