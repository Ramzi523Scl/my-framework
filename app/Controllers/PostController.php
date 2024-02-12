<?php

namespace App\Controllers;

use MyFramework\Framework\Http\Response;

class PostController extends Controller
{
    public function show(int $id): Response
    {
        $content = "<h1>Post - {$id}</h1>";
        return new Response($content);
    }
}