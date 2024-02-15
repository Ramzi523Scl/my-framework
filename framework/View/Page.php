<?php

namespace MyFramework\Framework\View;

class Page
{
//    private $layout;
//    private $title;
    private $view;
    private $data = [];

    public function __construct($view, $data)
    {

        $this->view = $view;
        $this->data = $data;
    }
    public function __get($property)
    {
        return $this->$property;
    }
}