<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            abort(403, 'Unauthorized access: User is not authenticated');
        }

        // Exploding the roles passed in the route definition to handle multiple roles
        $roles = explode('|', $role);

        if (!in_array(Auth::user()->role, $roles)) {
            abort(403, 'Unauthorized access: User does not have the required role');
        }

        return $next($request);
    }
}

