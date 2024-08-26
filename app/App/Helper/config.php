<?php

if (!function_exists('config')) {
    function config(string $key, $default = null)
    {
        return \XProject\XFusion\App\Facades\ConfigFacade::get($key, $default);
    }
}

if (!function_exists('env')) {
    function env(string $key, $default = null)
    {
        return \XProject\XFusion\App\Core\Config\Config::env($key, $default);
    }
}