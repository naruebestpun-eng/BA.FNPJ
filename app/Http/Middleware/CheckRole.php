<?php

namespace App\Http\Middleware;

use App\Enums\UserRole;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        if (!$request->user()) {
            return response('Unauthorized', 401);
        }

        $userRole = $request->user()->role;

        foreach ($roles as $role) {
            // Convert string to UserRole enum
            $roleEnum = UserRole::tryFrom($role);
            
            if ($roleEnum && $userRole === $roleEnum) {
                return $next($request);
            }
        }

        return response('Forbidden', 403);
    }
}
