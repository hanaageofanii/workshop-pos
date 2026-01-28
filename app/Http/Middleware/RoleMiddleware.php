<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!session()->has('user')) {
            return redirect('/login');
        }

        if (session('user.role') !== $role) {
            abort(403, 'Akses ditolak');
        }

        return $next($request);
    }
}
