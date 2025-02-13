<?php

namespace App\Kernel\Router;
/**
 * @method action
 */
class Route
{
    public function __construct(
        public readonly string $url,
        public                 $action,
        public readonly string $method,
        public readonly array  $middleware,
    )
    {
    }

    public function hasMiddleware(): bool
    {
        return !empty($this->middleware);
    }

    public static function get(string $url, $action, $middleware = []): static
    {
        return new static($url, $action, 'GET', $middleware);
    }

    public static function post(string $url, $action, $middleware = []): static
    {
        return new static($url, $action, 'POST', $middleware);
    }
}