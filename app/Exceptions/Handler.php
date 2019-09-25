<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
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
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param \Exception $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Exception $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if (PHP_SAPI == 'cli') {
            return parent::render($request, $exception);
        }
        if ($exception instanceof NotFoundHttpException) {
            return jsonResponse(1, null, '请求地址不存在');
        } else if ($exception instanceof MethodNotAllowedException || $exception instanceof MethodNotAllowedHttpException) {
            return jsonResponse(2, null, '请求不合法');
        } elseif ($exception instanceof AuthException||$exception instanceof ParamsException||$exception instanceof HttpException ||$exception  instanceof ServiceException) {
            return jsonResponse($exception->getCode(), null, $exception->getMessage());
        } else {
            return jsonResponse(-1, env('APP_DEBUG') ?
                [
                    'messgae' => $exception->getMessage(),
                    'file' => $exception->getFile(),
                    'line' => $exception->getLine(),
                    'track' => $exception->getTrace()
                ] : null,
                '服务器异常');
        }

    }
}
