<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Support\Facades\Log;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class Handler extends ExceptionHandler
{
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ValidationException) {
            return response()->json(
                [
                    'errors' => $exception->errors(),
                ]
            )->setStatusCode(422);
        }

        if ($exception instanceof MethodNotAllowedHttpException) {
            return response()->json(
                [
                    'error' => $exception->getMessage(),
                ]
            )->setStatusCode(405);
        }

        if ($exception instanceof AuthenticationException
            || $exception instanceof TokenBlacklistedException
            || $exception instanceof TokenExpiredException
        ) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        Log::error(
            'Internal error',
            [
                'exception' => $exception,
            ]
        );

        return response()->json(
            [
                'error' => $exception->getMessage(),
            ]
        )->setStatusCode(500);
    }
}
