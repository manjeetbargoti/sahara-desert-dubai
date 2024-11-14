<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
// use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: [
            __DIR__.'/../routes/web.php',
            __DIR__.'/../routes/auth.php',
            __DIR__.'/../routes/admin.php'
        ],
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        // using: function() {
        //     Route::middleware('web')
        //         ->group(base_path('routes/web.php'));
        //     Route::namespace('App\Http\Controllers\Admin')
        //         ->group(base_path('routes/admin.php'));
        // }
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'role-permission' => \App\Http\Middleware\RolePermission::class,
            'Excel' => Maatwebsite\Excel\Facades\Excel::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
