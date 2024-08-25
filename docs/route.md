# X-Fusion Routing

## Description
`Route` digunakan untuk mendefinisikan rute dalam aplikasi. Rute menghubungkan URL tertentu dengan controller dan metode yang akan menangani permintaan tersebut. Kelas ini mendukung berbagai metode HTTP seperti GET, POST, PUT, DELETE, PATCH, dan OPTIONS.

## Metode

### `get`
Mendefinisikan rute dengan metode HTTP GET.

```php
public static function get(string $route, $controller, array $middleware = []): self
```

#### Parameter
- `$route` (string) - URL rute.
- `$controller` (string|array) - Nama controller atau array yang berisi nama controller dan metode yang akan menangani permintaan.
- `$middleware` (array) - Middleware yang akan dijalankan sebelum controller.
- Return: `Route`
- Exception: `InvalidArgumentException`

#### Contoh
```php
Route::get('/user/{id}', [UserController::class, 'show']);

Route::get('/user/{id}', function ($id) {
    return "User ID: $id";
});
```

### `post`
Mendefinisikan rute dengan metode HTTP POST.

```php
public static function post(string $route, $controller, array $middleware = []): self
```

#### Parameter
- `$route` (string) - URL rute.
- `$controller` (string|array) - Nama controller atau array yang berisi nama controller dan metode yang akan menangani permintaan.
- `$middleware` (array) - Middleware yang akan dijalankan sebelum controller.
- Return: `Route`
- Exception: `InvalidArgumentException`

#### Contoh
```php
Route::post('/user', [UserController::class, 'store']);

Route::post('/user', function () {
    return "User created";
});
```

### `put`
Mendefinisikan rute dengan metode HTTP PUT.

```php
public static function put(string $route, $controller, array $middleware = []): self
```

#### Parameter
- `$route` (string) - URL rute.
- `$controller` (string|array) - Nama controller atau array yang berisi nama controller dan metode yang akan menangani permintaan.
- `$middleware` (array) - Middleware yang akan dijalankan sebelum controller.
- Return: `Route`
- Exception: `InvalidArgumentException`

#### Contoh
```php
Route::put('/user/{id}', [UserController::class, 'update']);

Route::put('/user/{id}', function ($id) {
    return "User ID: $id updated";
});
```

### `delete`
Mendefinisikan rute dengan metode HTTP DELETE.

```php
public static function delete(string $route, $controller, array $middleware = []): self
```

#### Parameter
- `$route` (string) - URL rute.
- `$controller` (string|array) - Nama controller atau array yang berisi nama controller dan metode yang akan menangani permintaan.
- `$middleware` (array) - Middleware yang akan dijalankan sebelum controller.
- Return: `Route`
- Exception: `InvalidArgumentException`

#### Contoh
```php
Route::delete('/user/{id}', [UserController::class, 'destroy']);

Route::delete('/user/{id}', function ($id) {
    return "User ID: $id deleted";
});
```

### `patch`
Mendefinisikan rute dengan metode HTTP PATCH.

```php
public static function patch(string $route, $controller, array $middleware = []): self
```

#### Parameter
- `$route` (string) - URL rute.
- `$controller` (string|array) - Nama controller atau array yang berisi nama controller dan metode yang akan menangani permintaan.
- `$middleware` (array) - Middleware yang akan dijalankan sebelum controller.
- Return: `Route`
- Exception: `InvalidArgumentException`

#### Contoh
```php
Route::patch('/user/{id}', [UserController::class, 'update']);

Route::patch('/user/{id}', function ($id) {
    return "User ID: $id updated";
});
```

### `options`
Mendefinisikan rute dengan metode HTTP OPTIONS.

```php
public static function options(string $route, $controller, array $middleware = []): self
```

#### Parameter
- `$route` (string) - URL rute.
- `$controller` (string|array) - Nama controller atau array yang berisi nama controller dan metode yang akan menangani permintaan.
- `$middleware` (array) - Middleware yang akan dijalankan sebelum controller.
- Return: `Route`
- Exception: `InvalidArgumentException`

#### Contoh
```php
Route::options('/user/{id}', [UserController::class, 'show']);

Route::options('/user/{id}', function ($id) {
    return "User ID: $id";
});
```

### `all`
Mendefinisikan rute dengan semua metode HTTP.

```php
public static function all(string $route, $controller, array $middleware = []): self
```

#### Parameter
- `$route` (string) - URL rute.
- `$controller` (string|array) - Nama controller atau array yang berisi nama controller dan metode yang akan menangani permintaan.
- `$middleware` (array) - Middleware yang akan dijalankan sebelum controller.
- Return: `Route`
- Exception: `InvalidArgumentException`

#### Contoh
```php
Route::all('/user/{id}', [UserController::class, 'show']);

Route::all('/user/{id}', function ($id) {
    return "User ID: $id";
});
```

### `middleware`
Menambahkan middleware ke rute.

```php
public static function middleware(array $middleware): self
```

#### Parameter
- `$middleware` (array) - Middleware yang akan dijalankan sebelum controller.
- Return: `Route`
- Exception: `InvalidArgumentException`

#### Contoh
```php
Route::middleware([Middleware::class])->get('/user/{id}', [UserController::class, 'show']);

Route::middleware(['auth'])->get('/user/{id}', function ($id) {
    return "User ID: $id";
});

Route::middleware([Middleware::class])->group(function () {
    Route::get('/user/{id}', [UserController::class, 'show']);
    Route::post('/user', [UserController::class, 'store']);
});
```

### `group`
Membuat grup rute.

```php
public static function group(Closure $callback): void
```

#### Parameter
- `$callback` (Closure) - Fungsi yang berisi definisi rute.
- Return: void
- Exception: `InvalidArgumentException`

#### Contoh
```php
Route::group(function () {
    Route::get('/user/{id}', [UserController::class, 'show']);
    Route::post('/user', [UserController::class, 'store']);
});
```


