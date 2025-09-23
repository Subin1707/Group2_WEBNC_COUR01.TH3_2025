protected $routeMiddleware = [
    'auth' => \App\Http\Middleware\Authenticate::class,
    'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,

    // custom
    'role' => \App\Http\Middleware\RoleMiddleware::class,
];
