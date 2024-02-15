<?php

namespace MyFramework\Framework\Http;

class Response
{
    public function __construct(
        private mixed $content,
        private int $statusCode = 200,
        private array $headers = []
    )
    {
    }

    public function send()
    {

        if (is_array($this->content) ) {
            $content = json_encode($this->content);
            dd($content);
        } elseif (is_object($this->content)) {
            dd($this->content);
        } else {
            echo $this->content;
        }

    }
}