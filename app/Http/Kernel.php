<?php
protected $routeMiddleware = [
    // ...middleware lain...
    'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
];