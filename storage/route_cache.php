<?php return array (
  0 => 
  array (
    'method' => 'GET',
    'route' => '/user/{id}/{test}',
    'controller' => 
    array (
      0 => 'XProject\\XFusion\\TodoList\\Controller\\UserController',
      1 => 'show',
    ),
    'middleware' => 
    array (
    ),
    'missing' => NULL,
  ),
  1 => 
  array (
    'method' => 'GET',
    'route' => '/',
    'controller' => 
    array (
      0 => 'XProject\\XFusion\\TodoList\\Controller\\UserController',
      1 => 'home',
    ),
    'middleware' => 
    array (
    ),
    'missing' => NULL,
  ),
  2 => 
  array (
    'method' => 'GET',
    'route' => '/test',
    'controller' => 'C:32:"Opis\\Closure\\SerializableClosure":164:{a:5:{s:3:"use";a:0:{}s:8:"function";s:41:"function () {
    echo "Hello World";
}";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000000080000000000000000";}}',
    'middleware' => 
    array (
    ),
    'missing' => NULL,
  ),
  3 => 
  array (
    'method' => 'GET',
    'route' => '/tests/{id}',
    'controller' => 'C:32:"Opis\\Closure\\SerializableClosure":202:{a:5:{s:3:"use";a:0:{}s:8:"function";s:79:"function ($id) {
    // how to trigger a 404
    echo "Hello World" . $id;
}";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000000090000000000000000";}}',
    'middleware' => 
    array (
    ),
    'missing' => NULL,
  ),
  4 => 
  array (
    'method' => 'GET',
    'route' => '/user',
    'controller' => 
    array (
      0 => 'XProject\\XFusion\\TodoList\\Controller\\UserController',
      1 => 'index',
    ),
    'middleware' => 
    array (
    ),
    'missing' => NULL,
  ),
  5 => 
  array (
    'method' => 'GET',
    'route' => '/user/{id}',
    'controller' => 
    array (
      0 => 'XProject\\XFusion\\TodoList\\Controller\\UserController',
      1 => 'show',
    ),
    'middleware' => 
    array (
    ),
    'missing' => NULL,
  ),
  6 => 
  array (
    'method' => 'POST',
    'route' => '/user',
    'controller' => 
    array (
      0 => 'XProject\\XFusion\\TodoList\\Controller\\UserController',
      1 => 'store',
    ),
    'middleware' => 
    array (
    ),
    'missing' => NULL,
  ),
  7 => 
  array (
    'method' => 'PUT',
    'route' => '/user/{id}',
    'controller' => 
    array (
      0 => 'XProject\\XFusion\\TodoList\\Controller\\UserController',
      1 => 'update',
    ),
    'middleware' => 
    array (
    ),
    'missing' => NULL,
  ),
  8 => 
  array (
    'method' => 'DELETE',
    'route' => '/user/{id}',
    'controller' => 
    array (
      0 => 'XProject\\XFusion\\TodoList\\Controller\\UserController',
      1 => 'destroy',
    ),
    'middleware' => 
    array (
    ),
    'missing' => NULL,
  ),
  9 => 
  array (
    'method' => 'GET',
    'route' => '/hello/world',
    'controller' => 'C:32:"Opis\\Closure\\SerializableClosure":172:{a:5:{s:3:"use";a:0:{}s:8:"function";s:49:"function () {
        echo "Hello World";
    }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"000000000000000b0000000000000000";}}',
    'middleware' => 
    array (
    ),
    'missing' => NULL,
  ),
  10 => 
  array (
    'method' => 'POST',
    'route' => '/hello/world',
    'controller' => 'C:32:"Opis\\Closure\\SerializableClosure":172:{a:5:{s:3:"use";a:0:{}s:8:"function";s:49:"function () {
        echo "Hello World";
    }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"000000000000000c0000000000000000";}}',
    'middleware' => 
    array (
    ),
    'missing' => NULL,
  ),
  11 => 
  array (
    'method' => 'PUT',
    'route' => '/hello/world',
    'controller' => 'C:32:"Opis\\Closure\\SerializableClosure":172:{a:5:{s:3:"use";a:0:{}s:8:"function";s:49:"function () {
        echo "Hello World";
    }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"000000000000000d0000000000000000";}}',
    'middleware' => 
    array (
    ),
    'missing' => NULL,
  ),
  12 => 
  array (
    'method' => 'GET',
    'route' => '/hello/all',
    'controller' => 'C:32:"Opis\\Closure\\SerializableClosure":170:{a:5:{s:3:"use";a:0:{}s:8:"function";s:47:"function () {
        echo "Hello All";
    }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"000000000000000e0000000000000000";}}',
    'middleware' => 
    array (
    ),
    'missing' => NULL,
  ),
  13 => 
  array (
    'method' => 'POST',
    'route' => '/hello/all',
    'controller' => 'C:32:"Opis\\Closure\\SerializableClosure":170:{a:5:{s:3:"use";a:0:{}s:8:"function";s:47:"function () {
        echo "Hello All";
    }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"000000000000000e0000000000000000";}}',
    'middleware' => 
    array (
    ),
    'missing' => NULL,
  ),
  14 => 
  array (
    'method' => 'PUT',
    'route' => '/hello/all',
    'controller' => 'C:32:"Opis\\Closure\\SerializableClosure":170:{a:5:{s:3:"use";a:0:{}s:8:"function";s:47:"function () {
        echo "Hello All";
    }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"000000000000000e0000000000000000";}}',
    'middleware' => 
    array (
    ),
    'missing' => NULL,
  ),
  15 => 
  array (
    'method' => 'DELETE',
    'route' => '/hello/all',
    'controller' => 'C:32:"Opis\\Closure\\SerializableClosure":170:{a:5:{s:3:"use";a:0:{}s:8:"function";s:47:"function () {
        echo "Hello All";
    }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"000000000000000e0000000000000000";}}',
    'middleware' => 
    array (
    ),
    'missing' => NULL,
  ),
  16 => 
  array (
    'method' => 'PATCH',
    'route' => '/hello/all',
    'controller' => 'C:32:"Opis\\Closure\\SerializableClosure":170:{a:5:{s:3:"use";a:0:{}s:8:"function";s:47:"function () {
        echo "Hello All";
    }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"000000000000000e0000000000000000";}}',
    'middleware' => 
    array (
    ),
    'missing' => NULL,
  ),
  17 => 
  array (
    'method' => 'OPTIONS',
    'route' => '/hello/all',
    'controller' => 'C:32:"Opis\\Closure\\SerializableClosure":170:{a:5:{s:3:"use";a:0:{}s:8:"function";s:47:"function () {
        echo "Hello All";
    }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"000000000000000e0000000000000000";}}',
    'middleware' => 
    array (
    ),
    'missing' => NULL,
  ),
  18 => 
  array (
    'method' => 'GET',
    'route' => '/hello/put',
    'controller' => 
    array (
      0 => 'XProject\\XFusion\\TodoList\\Controller\\UserController',
      1 => 'home',
    ),
    'middleware' => 
    array (
    ),
    'missing' => NULL,
  ),
  19 => 
  array (
    'method' => 'GET',
    'route' => '/array',
    'controller' => 
    array (
      0 => 'XProject\\XFusion\\TodoList\\Controller\\UserController',
      1 => 'home',
    ),
    'middleware' => 
    array (
    ),
    'missing' => NULL,
  ),
  20 => 
  array (
    'method' => 'GET',
    'route' => '/prefix/callable',
    'controller' => 'C:32:"Opis\\Closure\\SerializableClosure":178:{a:5:{s:3:"use";a:0:{}s:8:"function";s:55:"function () {
        echo "Hello from prefix";
    }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"000000000000000f0000000000000000";}}',
    'middleware' => 
    array (
    ),
    'missing' => NULL,
  ),
  21 => 
  array (
    'method' => 'GET',
    'route' => '/prefix/string',
    'controller' => 
    array (
      0 => 'XProject\\XFusion\\TodoList\\Controller\\UserController',
      1 => 'index',
    ),
    'middleware' => 
    array (
    ),
    'missing' => NULL,
  ),
  22 => 
  array (
    'method' => 'GET',
    'route' => '/prefix/array',
    'controller' => 
    array (
      0 => 'XProject\\XFusion\\TodoList\\Controller\\UserController',
      1 => 'home',
    ),
    'middleware' => 
    array (
    ),
    'missing' => NULL,
  ),
  23 => 
  array (
    'method' => 'GET',
    'route' => '/naming/{id}',
    'controller' => 'C:32:"Opis\\Closure\\SerializableClosure":174:{a:5:{s:3:"use";a:0:{}s:8:"function";s:51:"function ($id) {
    echo "Hello World " . $id;
}";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"000000000000000a0000000000000000";}}',
    'middleware' => 
    array (
    ),
    'missing' => NULL,
  ),
  24 => 
  array (
    'method' => 'GET',
    'route' => '/test/number/{id:[0-9]+}',
    'controller' => 'C:32:"Opis\\Closure\\SerializableClosure":174:{a:5:{s:3:"use";a:0:{}s:8:"function";s:51:"function ($id) {
    echo "Hello World " . $id;
}";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000000100000000000000000";}}',
    'middleware' => 
    array (
    ),
    'missing' => NULL,
  ),
);