<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

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
        'token',
        'access_token',
        'authorization',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            if (!config('app.debug')) {
                Log::error('Unhandled application exception', [
                    'exception_class' => $e::class,
                    'request_id' => request()?->attributes->get('request_id'),
                    'route' => request()?->route()?->getName(),
                ]);

                return false;
            }
        });
    }
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof TokenMismatchException) {
            // Możesz zwrócić np. redirect do tej samej strony
            return redirect()
                ->back()
                ->withInput()
                ->with('fail', 'Sesja wygasła. Strona została odświeżona automatycznie. Spróbuj ponownie.');
        }

        if ($request->expectsJson()) {
            if ($exception instanceof ValidationException) {
                return parent::render($request, $exception);
            }

            $status = match (true) {
                $exception instanceof AuthenticationException => 401,
                $exception instanceof AuthorizationException => 403,
                $exception instanceof ModelNotFoundException => 404,
                $exception instanceof HttpExceptionInterface => $exception->getStatusCode(),
                default => 500,
            };

            if ($status >= 500) {
                $message = config('app.debug') ? $exception->getMessage() : 'Wewnętrzny błąd serwera.';
            } else {
                $message = match ($status) {
                    401 => 'Brak uwierzytelnienia.',
                    403 => 'Brak uprawnień.',
                    404 => 'Nie znaleziono zasobu.',
                    429 => 'Zbyt wiele żądań.',
                    default => $exception->getMessage() ?: 'Żądanie nie może zostać obsłużone.',
                };
            }

            return response()->json([
                'message' => $message,
                'request_id' => $request->attributes->get('request_id'),
            ], $status);
        }

        return parent::render($request, $exception);
    }

    protected function context(): array
    {
        return array_merge(parent::context(), [
            'request_id' => request()?->attributes->get('request_id'),
        ]);
    }
}
