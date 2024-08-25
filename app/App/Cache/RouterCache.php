<?php

namespace XProject\XFusion\App\Cache;

class RouterCache
{
    private static $cacheFile = __DIR__ . "/../../../storage/route_cache.php";

    public static function cacheRoutes(array $routes): void
    {
        foreach ($routes as &$route) {
            if ($route['controller'] instanceof  \Closure) {
                $route['controller'] = SerializableClosure::serialize($route['controller']);
            }
        }
        $content = "<?php return " . var_export($routes, true) . ";";
        file_put_contents(self::$cacheFile, $content);
    }

    public static function loadCachedRoutes(): ?array
    {
        if (file_exists(self::$cacheFile)) {
            $routes = require self::$cacheFile;
            foreach ($routes as &$route) {
                if (is_string($route['controller']) && strpos($route['controller'], 'Opis\Closure\SerializableClosure') !== false) {
                    $route['controller'] = SerializableClosure::unserialize($route['controller']);
                }
            }
            return $routes;
        }
        return null;
    }

    public static function clearCache(): void
    {
        if (file_exists(self::$cacheFile)) {
            unlink(self::$cacheFile);
        }
    }
}