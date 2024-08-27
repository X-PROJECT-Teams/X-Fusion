<?php

use \XProject\XFusion\App\Core\Route;



Route::get('/user/{id}/{test}', [\XProject\XFusion\TodoList\Controller\UserController::class, 'show'], []);
Route::get('/', [\XProject\XFusion\TodoList\Controller\UserController::class, 'home'], []);

Route::prefix('/books/store')->group(function () {
    Route::get('', [\XProject\XFusion\TokoBuku\Controller\HomeController::class, 'index']);
});