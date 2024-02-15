<?php

namespace MyFramework\Framework\Http;

readonly class Request
{
    public function __construct(
        private array $getParams,
        private array $postData,
        private array $cookies,
        private array $files,
        private array $server,
    )
    {
    }
    public static function createFromGlobals(): static
    {
        return new static($_GET, $_POST, $_COOKIE, $_FILES, $_SERVER);
    }

    public function getJson()
    {
        if ($this->server['REQUEST_METHOD'] === 'POST' && str_contains($this->server['CONTENT_TYPE'], 'application/json')) {
            $jsonData = file_get_contents('php://input');
            $jsonDecoded = json_decode($jsonData, true);

            if (is_array($jsonDecoded)) {
                return $jsonDecoded;
            }
        }
        return null;
    }
    public function getServer(): array
    {
        return $this->server;
    }

    public function getPath(): string
    {
        return strtok($this->server['REQUEST_URI'], '?');
    }

    public function getMethod(): string
    {
        return $this->server['REQUEST_METHOD'];
    }
}