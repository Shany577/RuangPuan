<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Unggahan;
use App\Models\Komentar;
use App\Models\laporanKonten;
use App\Models\LaporanKejadian;
use App\Models\DirektoriBantuan;


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

    // Menampilkan daftar postingan
    public function postingan()
    {
        $this->pastikanAdmin();

        $postingan = Unggahan::with(['pengguna', 'kategori'])
            ->orderBy('dibuat_pada', 'desc')
            ->get();

        return view('admin.postingan.index', compact('postingan'));
    }

    // Menampilkan daftar komentar
    public function komentar()
    {
        $this->pastikanAdmin();

        $komentar = Komentar::with(['pengguna', 'unggahan'])
            ->orderBy('dibuat_pada', 'desc')
            ->get();

        return view('admin.komentar.index', compact('komentar'));
    }

    // Menampilkan daftar laporan konten
    public function laporanKonten()
    {
        $this->pastikanAdmin();

        $laporan = LaporanKonten::with([
            'unggahan',
            'komentar',
            'pelapor',
            'peninjau'
        ])
        ->orderBy('dibuat_pada', 'desc')
        ->get();

        return view('admin.laporan-konten.index', compact('laporan'));
    }
    
    // Menampilkan daftar laporan kejadian
    public function laporanKejadian()
    {
        $this->pastikanAdmin();

        $laporan = LaporanKejadian::with([
            'pelapor',
            'peninjau',
            'direktoriBantuan'
        ])
        ->orderBy('dibuat_pada', 'desc')
        ->get();

        return view('admin.laporan-kejadian.index', compact('laporan'));
    }

    // Menampilkan daftar direktori bantuan
    public function direktoriBantuan()
    {
        $this->pastikanAdmin();

        $bantuan = DirektoriBantuan::orderBy('nama_lembaga', 'asc')->get();

        return view('admin.direktori-bantuan.index', compact('bantuan'));
    }

    // Menambahkan data direktori bantuan
    public function tambahDirektoriBantuan(Request $request)
    {
        $this->pastikanAdmin();

        $request->validate([
            'nama_lembaga' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kontak' => 'nullable|string|max:255',
            'alamat' => 'nullable|string',
            'tautan' => 'nullable|url|max:255',
            'status' => 'required|string|max:50',
        ]);

        DirektoriBantuan::create($request->all());

        return redirect()
            ->route('admin.direktori-bantuan.index')
            ->with('success', 'Data direktori bantuan berhasil ditambahkan.');
    }

    // Menampilkan halaman edit direktori bantuan
    public function editDirektoriBantuan($id)
    {
        $this->pastikanAdmin();

        $bantuan = DirektoriBantuan::findOrFail($id);

        return view('admin.direktori-bantuan.edit', compact('bantuan'));
    }

    // Memperbarui data direktori bantuan
    public function updateDirektoriBantuan(Request $request, $id)
    {
        $this->pastikanAdmin();

        $request->validate([
            'nama_lembaga' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kontak' => 'nullable|string|max:255',
            'alamat' => 'nullable|string',
            'tautan' => 'nullable|url|max:255',
            'status' => 'required|string|max:50',
        ]);

        $bantuan = DirektoriBantuan::findOrFail($id);

        $bantuan->update($request->only([
            'nama_lembaga',
            'deskripsi',
            'kontak',
            'alamat',
            'tautan',
            'status',
        ]));

        return redirect()
            ->route('admin.direktori-bantuan.index')
            ->with('success', 'Data direktori bantuan berhasil diperbarui.');
    }

    // Menghapus data direktori bantuan
    public function hapusDirektoriBantuan($id)
    {
        $this->pastikanAdmin();

        $bantuan = DirektoriBantuan::findOrFail($id);
        $bantuan->delete();

        return redirect()->route('admin.direktori-bantuan.index')
            ->with('success', 'Data direktori bantuan berhasil dihapus.');
    }

    
}
