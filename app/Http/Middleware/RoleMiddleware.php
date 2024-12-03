<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Check if the user is authenticated
        if (!$request->user()) {
            return redirect('login')->with('error', 'You need to login first.');
        }

        // Check if the user has the required role
        if ($request->user()->role !== $role) {
            session()->flash('error', 'Access Denied: You are not authorized to access this page.');
        return redirect('/');
        }

        return $next($request);
    }
}
