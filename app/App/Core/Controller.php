<?php

namespace XProject\XFusion\App\Core;

use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use XProject\XFusion\App\Core\Traits\Injectable;
use XProject\XFusion\App\Exceptions\ViewException;
use XProject\XFusion\App\Facades\App;

class Controller
{
    use Injectable;
    protected function jsonResponse($data, $status = 200)
    {
        header('Content-Type: application/json');
        http_response_code($status);
        echo json_encode($data);
        exit();
    }


    /**
     * @throws ViewException
     */
    protected function render($template, $data = []): void
    {
        View::render($template, $data);
    }
}

