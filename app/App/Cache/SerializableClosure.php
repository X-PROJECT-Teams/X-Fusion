<?php

namespace XProject\XFusion\App\Cache;

use Opis\Closure\SerializableClosure as OpisSerializableClosure;

class SerializableClosure
{
    public static function serialize(\Closure $closure): string
    {
        return serialize(new OpisSerializableClosure($closure));
    }
    public static function unserialize(string $serializedClosure): \Closure
    {
        return (unserialize($serializedClosure))->getClosure();
    }
}