<?php

use App\Exceptions\AziELuni;
use App\Exceptions\UserNotVerifiedException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'must-verify-email' => \App\Http\Middleware\MustVerifyEmail::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (Exception $exception) {

            $code = $exception->getCode() && $exception->getCode() >= 0 ? $exception->getCode() : 400;

            if ($exception instanceof UserNotVerifiedException) {
                return response()->json([
                    'message' => $exception->getMessage(),
                ], $code);
            }

            if ($exception instanceof AziELuni) {
                return response()->json([
                    'message' => "Nu-i chiar atat de naspa",
                ], $code);
            }

        });
    })->create();
