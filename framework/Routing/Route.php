<?php

namespace MyFramework\Framework\Routing;

class Route
{
    public static function get(string $uri, array $handler): array
    {
        return ['GET', $uri, $handler];
    }
    public static function post(string $uri, array $handler): array
    {
        return ['POST', $uri, $handler];
    }
    public static function put(string $uri, array $handler): array
    {
        return ['PUT', $uri, $handler];
    }
    public static function patch(string $uri, array $handler): array
    {
        return ['PATCH', $uri, $handler];
    }
    public static function delete(string $uri, array $handler): array
    {
        return ['DELETE', $uri, $handler];
    }
}