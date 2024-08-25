<?php

use \XProject\XFusion\App\Core\Route;



Route::get('/user/{id}/{test}', [\XProject\XFusion\TodoList\Controller\UserController::class, 'show'], []);
Route::get('/', [\XProject\XFusion\TodoList\Controller\UserController::class, 'home'], []);