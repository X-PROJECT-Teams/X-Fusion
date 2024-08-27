<?php

namespace XProject\XFusion\TodoList\Controller;

use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use XProject\XFusion\App\Core\Controller;
use XProject\XFusion\App\Core\View;

class ViewTestController extends Controller
{
    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function testView()
    {
       $this->render('Home.index', ['title' => 'John Doe']);
    }
    public function test()
    {
        $this->render("TestCombine.home", ['title' => 'Hello IMBA']);
    }
}