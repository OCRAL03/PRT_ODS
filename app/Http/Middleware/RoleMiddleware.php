<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        logger('RoleMiddleware handle method triggered.');
        if (!Auth::check() || !in_array(Auth::user()->role, $roles)) {
            return redirect('/');
        }

        return $next($request);
    }
}
