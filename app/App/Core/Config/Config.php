<?php

namespace XProject\XFusion\App\Core\Config;

class Config
{
    protected static array $config = [];
    public static function set(string $key, $value): void
    {
        $keys = explode('.', $key);
        $temp = &self::$config;

        foreach ($keys as $key) {
            if (!isset($temp[$key])) {
                $temp[$key] = [];
            }
            $temp = &$temp[$key];
        }

        $temp = $value;
    }

    public static function get(string $key, $default = null)
    {
        $keys = explode('.', $key);
        $temp = self::$config;

        foreach ($keys as $key) {
            if (isset($temp[$key])) {
                $temp = $temp[$key];
            } else {
                return $default;
            }
        }
        return $temp;
    }

    public static function load(array $configs): void
    {
        self::$config = array_merge(self::$config, $configs);
    }
    public static function loadFromDirectory(string $directory): void
    {
        foreach (glob($directory . "/*.php") as $file) {
            $config = require $file;
            $filename = pathinfo($file, PATHINFO_FILENAME);
            self::set($filename, $config);
        }
    }
    public static function env(string $key, $default = null)
    {
        $value = $_ENV[$key] ?? false;
        return $value === false ? $default : $value;
    }
}