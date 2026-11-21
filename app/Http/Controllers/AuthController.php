<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:pengguna,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'kata_sandi' => $request->password,
            'peran' => 'pengguna',
            'status_akun' => 'menunggu',
            'dibuat_pada' => now(),
        ]);

        return redirect()->route('register')
             ->with('success', 'Pendaftaran berhasil! Akun Anda sedang menunggu persetujuan admin. Silakan login setelah akun disetujui.');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $pengguna = Auth::user();

            // Admin tetap bisa masuk ke dashboard admin
            if ($pengguna->peran === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            // Periksa status akun pengguna
            if ($pengguna->status_akun === 'menunggu') {
                Auth::logout();

                return back()->withErrors([
                    'email' => 'Pendaftaran Anda masih menunggu persetujuan admin.',
                ])->onlyInput('email');
            }

            if ($pengguna->status_akun === 'ditolak') {
                Auth::logout();

                return back()->withErrors([
                    'email' => 'Pendaftaran akun Anda ditolak oleh admin.',
                ])->onlyInput('email');
            }

            // Pengguna yang sudah aktif masuk ke dashboard
            if ($pengguna->status_akun === 'aktif') {
                return redirect()->route('pengguna.dashboard');
            }

            Auth::logout();

            return back()->withErrors([
                'email' => 'Status akun tidak valid. Silakan hubungi admin.',
            ])->onlyInput('email');
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
