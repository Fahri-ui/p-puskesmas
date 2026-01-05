<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Pastikan user login
        if (!Auth::check()) {
            return redirect('/')->with('error', 'Anda belum melakukan login.');
        }

        $user = Auth::user();

        // Periksa apakah role user ada di antara role yang diizinkan
        if (in_array($user->role, $roles)) {
            return $next($request);
        }

        // Jika tidak punya akses, redirect sesuai role
        if ($user->role === 'SUPER_ADMIN') {
            return redirect('/super-admin/dashboard')->with('error', 'Anda adalah SUPER ADMIN.');
        } elseif ($user->role === 'ADMIN') {
            return redirect('/admin/dashboard')->with('error', 'Anda adalah ADMIN.');
        }

        // Fallback
        return redirect('/')->with('error', 'Akses ditolak.');
    }
}