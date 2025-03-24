<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated and has the "admin" role
        if (Auth::check() && Auth::user()->isAdmin()) {
            return $next($request);
        }

        // Redirect unauthorized users to home page with an error message
        return redirect('/')->with('error', 'You do not have admin access.');
    }
}
