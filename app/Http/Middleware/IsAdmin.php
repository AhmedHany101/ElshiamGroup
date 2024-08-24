<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role_as == '1!_1$') {
            // User is authenticated and has the appropriate role
            return $next($request);
        } else {
            // User is not authenticated or does not have the appropriate role
            return response(view('users_pages/errors-404'), 404);
        }
    }
}
