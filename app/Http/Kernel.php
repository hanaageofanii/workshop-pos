<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middlewareGroups = [
        'web' => [
            \Illuminate\Session\Middleware\StartSession::class,
        ],
    ];

    protected $routeMiddleware = [
        // 🔥 INI YANG KAMU PAKE DI ROUTE
        'auth.custom' => \App\Http\Middleware\AuthMiddleware::class,
        'role'        => \App\Http\Middleware\RoleMiddleware::class,
    ];
}