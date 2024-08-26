<?php

namespace XProject\XFusion\App\Exceptions;

class RouteConstraintException extends \Exception
{
    protected $message = 'Route constraint not met';
}