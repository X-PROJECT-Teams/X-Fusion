<?php

namespace XProject\XFusion\App\Http;

use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;
use Psr\Http\Message\ServerRequestInterface;

class Request
{
    protected $method;
    protected $uri;
    public static function capture(): self
    {
        $psr17Factory = new Psr17Factory();
        $creator = new ServerRequestCreator(
            $psr17Factory, // ServerRequestFactory
            $psr17Factory, // UriFactory
            $psr17Factory, // UploadedFileFactory
            $psr17Factory  // StreamFactory
        );
        $serverRequest = $creator->fromGlobals();

        $instance = new self();
        $instance->method = $serverRequest->getMethod();
        $instance->uri = $serverRequest->getUri()->getPath();

        return $instance;
    }

    public function getMethod(): string
    {
        return $this->method;
    }
    public function getUri(): string
    {
        return $this->uri;
    }
}