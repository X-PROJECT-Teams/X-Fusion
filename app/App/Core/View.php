<?php

namespace XProject\XFusion\App\Core;

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;
use XProject\XFusion\App\Exceptions\ViewException;

class View
{
    protected static Environment $twig;

    public static function init(): void
    {
        $loader = new FilesystemLoader(__DIR__ . '/../../');
        self::$twig = new Environment($loader);
    }


    /**
     * @throws ViewException
     */
    public static function render ($template, $data = []): void
    {
        try {
            if (!isset(self::$twig)) {
                self::init();
            }

            $backtrace = debug_backtrace();
            $callerFile = $backtrace[1]['file'];


            $pathParts = explode(DIRECTORY_SEPARATOR, $callerFile);
            $parentFolder = $pathParts[count($pathParts) - 3];
            $templatePath = $parentFolder . '/View/' . self::normalizeTemplatePath($template) . '.twig';


            echo self::$twig->render($templatePath, $data);
        } catch (LoaderError | RuntimeError | SyntaxError $e) {
            throw new ViewException($e->getMessage());
        }
    }
    protected static function normalizeTemplatePath(string $template): string
    {
        return str_replace('.', '/', $template);
    }
}