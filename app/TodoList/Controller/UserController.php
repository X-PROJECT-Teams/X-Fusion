<?php

namespace XProject\XFusion\TodoList\Controller;

class UserController
{
    public function show($id)
    {
        echo "User ID: " . $id;
    }
    public function home()
    {
        echo "Home Page";
    }
    public function index()
    {
        echo "Index Page";
    }
    public function store()
    {
        echo "Store Page";
    }
    public function update($id)
    {
        echo "Update Page";
    }
    public function destroy($id)
    {
        echo "Destroy Page";
    }
}