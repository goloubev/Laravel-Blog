<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

// php artisan make:middleware MustBeAdministrator
class MustBeAdministrator
{
    /**
     * Handle an incoming request.
     * @param Request                      $request
     * @param Closure(Request): (Response) $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Not logged in
        if (auth()->guest() || auth()->user()->username != 'goloubev') {
            abort(Response::HTTP_FORBIDDEN);
        }

        return $next($request);
    }
}
