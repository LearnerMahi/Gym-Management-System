<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ( Admin::user()->admin_id != 2) {
            // If not, return a JSON response indicating lack of permission
            return response()->json('Oops! You do not have permission to access.');
        }
        return $next($request);
    }
}
