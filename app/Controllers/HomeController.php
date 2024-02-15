<?php

namespace App\Controllers;

use MyFramework\Framework\Http\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return $this->render('home');
    }

}