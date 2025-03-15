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
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $userrole): Response //1 Useradmin, 2Admin, 3 Faculty, 4 student
    {

        if (!Auth::check() || Auth::user()->role_id !== (int)$userrole) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
