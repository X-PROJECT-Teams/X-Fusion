<?php

namespace XProject\XFusion\App\Exceptions;

class RouteNotFoundException extends \Exception
{
    public function __construct($message = "404 Not Found", $code = 404, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}