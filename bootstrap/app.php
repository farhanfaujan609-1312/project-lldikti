<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

/**
 * Bootstrap the Laravel application.
 *
 * On Vercel, only /tmp is writable. Set APP_STORAGE_PATH=/tmp in Vercel
 * environment variables so Laravel can write cache, sessions, and compiled views.
 */
return tap(
    Application::configure(basePath: dirname(__DIR__))
        ->withRouting(
            web: __DIR__.'/../routes/web.php',
            commands: __DIR__.'/../routes/console.php',
            health: '/up',
        )
        ->withMiddleware(function (Middleware $middleware): void {
            //
        })
        ->withExceptions(function (Exceptions $exceptions): void {
            $exceptions->shouldRenderJsonWhen(
                fn (Request $request) => $request->is('api/*') || $request->expectsJson(),
            );
        })->create(),
    function (Application $app): void {
        $storagePath = env('APP_STORAGE_PATH');

        if ($storagePath) {
            $app->useStoragePath($storagePath);
        }
    }
);
