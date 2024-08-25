<?php

namespace XProject\XFusion\App\Http;

use Nyholm\Psr7\Response as NyholmResponse;
use Psr\Http\Message\ResponseInterface;

class Response extends NyholmResponse
{
    public static function json (array $data, int $status = 200): ResponseInterface
    {
        $response = new self($status);
        $response->getBody()->write(json_encode($data));
        return $response->withHeader('Content-Type', 'application/json');
    }
}