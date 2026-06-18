<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $user = $request->user();

        if (! $user) {
            abort(401, 'Unauthenticated.');
        }

        foreach ($roles as $role) {
            if ($user->role === $role || ($role === 'admin' && $user->isAdmin()) || ($role === 'operator' && $user->isPrintOperator())) {
                return $next($request);
            }
        }

        abort(403, 'Insufficient permissions for this role.');
    }
}

