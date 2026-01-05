<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            
            // Jika request AJAX, return JSON
            if ($request->expectsJson()) {
                $user = Auth::user();
                $redirect = $user->role === 'SUPER_ADMIN' ? '/super-admin/dashboard' : '/admin/dashboard';
                return response()->json(['redirect' => $redirect]);
            }
            
            return redirect()->intended('/admin/dashboard');
        }

        // Jika request AJAX, return error JSON
        if ($request->expectsJson()) {
            return response()->json(['message' => 'Email atau password salah'], 422);
        }

        throw ValidationException::withMessages([
            'email' => 'Email atau password salah',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}