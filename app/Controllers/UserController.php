<?php

namespace App\Controllers;

use App\Model\User;
use MyFramework\Framework\Http\Request;
use MyFramework\Framework\Http\Response;

class UserController extends Controller
{
    public function show(int $id): Response
    {
        $content = "<h1>User - 1</h1>";
        return new Response($content);
    }

    public function update()
    {
    }
    public function create()
    {
        $user = new User();
        $result = $user->create(['email' => 'fff@gmail.com', 'password' => '1234']);
        dd($result);
    }
}