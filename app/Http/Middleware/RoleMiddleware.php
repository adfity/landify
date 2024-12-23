<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Pastikan pengguna sudah login dan memiliki role yang sesuai
        if (!$request->user() || $request->user()->role != $role) {
            // Pengguna yang tidak sesuai akan diarahkan ke halaman utama atau halaman lain
            return redirect('/');
        }

        return $next($request);
    }
}



