<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function showForm()
    {
        // Cek jika email sudah diinput di forgot password
        if (!session()->has('reset_email')) {
            return redirect('/forgot-password')->withErrors(['general' => 'Anda belum menginput email']);
        }

        return view('auth.reset-password');
    }

    public function submit(Request $request)
    {
        // Cek session email
        if (!session()->has('reset_email')) {
            return redirect('/forgot-password')->withErrors(['general' => 'Anda belum menginput email']);
        }

        $request->validate([
            'password' => 'required|min:6|confirmed',
        ]);

        $email = session('reset_email');
        $user = User::where('email', $email)->first();

        if (!$user) {
            return redirect('/forgot-password')->withErrors(['general' => 'User tidak ditemukan']);
        }

        // Update password
        $user->password = Hash::make($request->password);
        $user->save();

        // Hapus session
        session()->forget('reset_email');

        return redirect('/login')->with('success', 'Password berhasil diganti');
    }
}
