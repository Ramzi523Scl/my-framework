<?php

namespace App\Controllers;

use MyFramework\Framework\Http\Request;

class Controller
{
    protected function json()
    {
        $jsonData = file_get_contents('php://input');
        $jsonDecoded = json_decode($jsonData, true);
        return $jsonDecoded;
    }
}