<?php

namespace XProject\XFusion\TokoBuku\Controller;

use XProject\XFusion\App\Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $this->render('index', ['message' => 'Ini adalah Rumah']);
    }
}