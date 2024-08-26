<?php

namespace XProject\XFusion\App\Facades;



class ConfigFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \XProject\XFusion\App\Core\Config\Config::class;
    }
}