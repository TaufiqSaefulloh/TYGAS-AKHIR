<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is not logged in
        if (!Auth::check()) {
            return redirect('login');
        }

        // Check if the user role is not 'user'
        if (Auth::user()->role !== 'user') {
            return redirect('/login');
        }

        return $next($request);
    }
}
