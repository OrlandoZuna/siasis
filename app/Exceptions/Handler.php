<?php

namespace App\Exceptions;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

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
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */

    public function render($request, Throwable $exception)
    {
      $userLevelCheck = $exception instanceof \jeremykenedy\LaravelRoles\App\Exceptions\RoleDeniedException ||
      $exception instanceof \jeremykenedy\LaravelRoles\App\Exceptions\RoleDeniedException ||
      $exception instanceof \jeremykenedy\LaravelRoles\App\Exceptions\PermissionDeniedException ||
      $exception instanceof \jeremykenedy\LaravelRoles\App\Exceptions\LevelDeniedException;
      if ($userLevelCheck) {

        if ($request->expectsJson()) {
            return Response::json(array(
                'error'    =>  403,
                'message'   =>  'Unauthorized.'
            ), 403);
        }

        abort(403);
    }
        return parent::render($request, $exception);
    }

}
