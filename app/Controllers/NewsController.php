<?php

namespace App\Controllers;

use MyFramework\Framework\Http\Controller;

class NewsController extends Controller
{
    public function index()
    {
        return $this->render('news');
    }

}