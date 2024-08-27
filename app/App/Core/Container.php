<?php

namespace XProject\XFusion\App\Core;

use DI\ContainerBuilder;

class Container
{
    protected $container;

    /**
     * @throws \Exception
     */
    public function __construct(array $definitions = [])
    {
        $builder = new ContainerBuilder();
        $builder->addDefinitions($definitions);
        $this->container = $builder->build();
    }
    public function bind(string $abstract, callable $concrete)
    {
        $this->set($abstract, $concrete);
    }
    public function singleton(string $abstract, callable $concrete): void
    {
        $this->singletons[$abstract] = $concrete;
        $this->set($abstract, function () use ($concrete) {
            static $instance;
            if ($instance === null) {
                $instance = $concrete($this);
            }
            return $instance;
        });
    }
    public function make(string $name, $parameters = []): mixed
    {
        return $this->get($name);
    }

    public function set(string $abstract, \Closure $param): void
    {
        $this->container->set($abstract, $param);
    }
    public function get(string $name): mixed
    {
        return $this->container->get($name);
    }
}