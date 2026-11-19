<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Cek apakah role pengguna adalah admin (sesuaikan nama kolom di DB jika berbeda)
            if (Auth::user()->role === 'admin') {
                return redirect()->intended(route('admin.dashboard'));
            }

            // Jika bukan admin (pengguna biasa)
            return redirect()->intended(route('pengguna.dashboard'));
        }

        return back()->withErrors([
            'email' => 'Email atau kata sandi yang dimasukkan salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}