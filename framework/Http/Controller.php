<?php

namespace MyFramework\Framework\Http;

use MyFramework\Framework\View\Page;
use MyFramework\Framework\View\View;

class Controller
{
    protected $layout = 'default';
    protected function render(string $view, array $data = [])
    {
        $page = new Page($view, $data);
        return (new View())->render($page);
    }
    protected function json()
    {
        $jsonData = file_get_contents('php://input');
        $jsonDecoded = json_decode($jsonData, true);
        return $jsonDecoded;
    }
}