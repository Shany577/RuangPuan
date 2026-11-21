<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;

class AdminController extends Controller
{
    // Memastikan hanya admin yang bisa mengakses
    private function pastikanAdmin()
    {
        abort_unless(auth()->user()?->peran === 'admin', 403);
    }

    // Dashboard utama admin
    public function index()
    {
        $this->pastikanAdmin();

        return view('admin.dashboard');
    }

    // Menampilkan daftar akun pengguna
    public function pengguna()
    {
        $this->pastikanAdmin();

        $pengguna = User::where('peran', 'pengguna')
            ->orderBy('dibuat_pada', 'desc')
            ->get();

        return view('admin.pengguna.index', compact('pengguna'));
    }

    // Mengubah status akun pengguna
    public function ubahStatusPengguna(Request $request, $id)
    {
        $this->pastikanAdmin();

        $request->validate([
            'status_akun' => [
                'required',
                Rule::in(['aktif', 'non aktif'])
            ]
        ]);

        $pengguna = User::where('peran', 'pengguna')
            ->findOrFail($id);

        $pengguna->status_akun = $request->status_akun;
        $pengguna->save();

        return back()->with(
            'success',
            'Status akun berhasil diperbarui.'
        );
    }
    
    public function pendaftaran()
    {
        $this->pastikanAdmin();

        $pendaftaran = User::where('peran', 'pengguna')
            ->where('status_akun', 'menunggu')
            ->orderBy('dibuat_pada', 'desc')
            ->get();

        return view('admin.pendaftaran.index', compact('pendaftaran'));
    }

    public function ubahStatusPendaftaran(Request $request, $id)
    {
        $this->pastikanAdmin();

        $request->validate([
            'status_akun' => [
                'required',
                Rule::in(['aktif', 'ditolak'])
            ]
        ]);

        $pengguna = User::where('peran', 'pengguna')
            ->where('status_akun', 'menunggu')
            ->findOrFail($id);

        $pengguna->status_akun = $request->status_akun;
        $pengguna->save();

        return back()->with('success', 'Status pendaftaran berhasil diperbarui.');
    }
    
}
