<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Support\Facades\Response;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
    public function render($request, Throwable $exception)
    {
        // if ($this->isHttpException($exception) && $exception->getStatusCode() == 500) {
        //         return response()->view('errors.500', [], 500);
        //     }
        // if ($this->isHttpException($exception) && in_array($exception->getStatusCode(), [404, 500])) {
        //     return response()->view('errors.404', [], $exception->getStatusCode());
        // }

        

        return parent::render($request, $exception);

        // if ($this->isHttpException($exception)) {
        //     switch ($exception->getStatusCode()) {
        //         case 404:
        //             return \Response::view('errors.404', [], 404);
        //             break;
        //         case 500:
        //             return \Response::view('errors.404', [], 404);
        //             break;

        //         default:
        //             return $this->renderHttpException($exception);
        //             break;
        //     }
        // } else {
        //     return parent::render($request, $e);
        // }
    }
}
