<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Middleware\VerifyCsrfToken;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {

        $middleware->append(\App\Http\Middleware\EncryptCookies::class);
        $middleware->append(\Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class);

        $middleware->append(\Illuminate\Session\Middleware\StartSession::class);

        $middleware->append(VerifyCsrfToken::class);

        $middleware->alias([
            'auth.custom' => AuthMiddleware::class,
            'role'        => RoleMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })
    ->create();
