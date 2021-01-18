<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
        });
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function invalidJson($request, ValidationException $exception)
    {
        $errors = $exception->errors();
        $firstError = \reset($errors);

        return response()->json([
            'message' => '参数错误' ?? $firstError[0],
            'errors' => $errors,
        ], $exception->status);
    }
}
