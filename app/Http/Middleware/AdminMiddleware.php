<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if (!function_exists('can_admin') || !can_admin()) {
            abort(403);
        }

        return $next($request);
    }
}
