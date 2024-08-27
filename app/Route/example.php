<?php


use \XProject\XFusion\App\Core\Route;


// Test route with a callable
Route::get("/test", function () {
    echo "Hello World";
});

Route::get("/tests/{id}", function ($id) {
    // how to trigger a 404
    echo "Hello World" . $id;
})->missing(function () {
    echo "Missing Callback";
});

// Test route with a string controller method
Route::controller(\XProject\XFusion\TodoList\Controller\UserController::class)->group(function () {
    Route::get("/user", "index");
    Route::get("/user/{id}", "show");
    Route::post("/user", "store");
    Route::put("/user/{id}", "update");
    Route::delete("/user/{id}", "destroy");
});

Route::middleware([])->prefix("/hello")->group(function () {
    Route::get("/world", function () {
        echo "Hello World";
    });
    Route::post("/world", function () {
        echo "Hello World";
    });
    Route::put("/world", function () {
        echo "Hello World";
    });
    Route::all("/all", function () {
        echo "Hello All";
    });
    Route::get("/put", [\XProject\XFusion\TodoList\Controller\UserController::class, 'home'], []);
});

// Test route with an array controller
Route::get("/array", [\XProject\XFusion\TodoList\Controller\UserController::class, 'home']);

// Test route with a prefix and callable
Route::prefix('/prefix')->group(function () {
    Route::get("/callable", function () {
        echo "Hello from prefix";
    });
});

// Test route with a prefix and string controller method
Route::prefix('/prefix')->controller(\XProject\XFusion\TodoList\Controller\UserController::class)->group(function () {
    Route::get("/string", "index");
});

// Test route with a prefix and array controller
Route::prefix('/prefix')->group(function () {
    Route::get("/array", [\XProject\XFusion\TodoList\Controller\UserController::class, 'home']);
});

Route::controller(\XProject\XFusion\TodoList\Controller\UserController::class)->group(function () {
    Route::get("/user", "index");
    Route::get("/user/{id}", "show");
    Route::post("/user", "store");
    Route::put("/user/{id}", "update");
    Route::delete("/user/{id}", "destroy");
});

Route::get("/naming/{id}", function ($id) {
    echo "Hello World " . $id;
})->name("naming.show");


Route::get("/test/number/{id:[0-9]+}", function ($id) {
    echo "Hello World " . $id;
});


Route::get('/test/depedency', [\XProject\XFusion\TodoList\Controller\TestController::class, 'test']);

Route::get("/counter1", [\XProject\XFusion\TodoList\Controller\CounterController::class, 'index']);
Route::get("/counter2", [\XProject\XFusion\TodoList\Controller\Counter2Controller::class, 'index']);

Route::get("/view", [\XProject\XFusion\TodoList\Controller\ViewTestController::class, 'testView']);
Route::get("/view2", [\XProject\XFusion\TodoList\Controller\ViewTestController::class, 'test']);