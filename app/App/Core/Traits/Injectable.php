<?php

namespace XProject\XFusion\App\Core\Traits;

use Psr\Container\ContainerInterface;

trait Injectable
{
    protected $container;

    public function setContainer(ContainerInterface $container)
    {
        $this->container = $container;
    }

}