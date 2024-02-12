<?php

namespace App\Controllers;

use MyFramework\Framework\Http\Response;

class HomeController extends Controller
{
    public function index(): Response
    {
        $content = "<h1>Home page</h1>";
        return new Response($content);
    }
}