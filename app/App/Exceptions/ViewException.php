<?php

namespace XProject\XFusion\App\Exceptions;

class ViewException extends \Exception
{
    public function __construct($message = "View not found", $code = 404, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}