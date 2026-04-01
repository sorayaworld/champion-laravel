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
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $role = $request->user()->role !== $role; {
            return response()->json([
                'message' => 'forbidden'
            ], 401);
        }
        return $next($request);
    }
}
