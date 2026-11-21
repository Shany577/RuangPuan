<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    private function pastikanAdmin()
    {
        abort_unless(auth()->user()?->peran === 'admin', 403);
    }

    // Menampilkan daftar kategori
    public function index()
    {
        $this->pastikanAdmin();

        $kategori = Kategori::orderBy('id_kategori', 'desc')->get();

        return view('admin.kategori.index', compact('kategori'));
    }

    // Menambahkan kategori
    public function store(Request $request)
    {
        $this->pastikanAdmin();

        $request->validate([
            'nama_kategori' => 'required|string|max:50',
            'deskripsi' => 'nullable|string',
        ]);

        Kategori::create($request->only('nama_kategori', 'deskripsi'));

        return back()->with('success', 'Kategori berhasil ditambahkan.');
    }

    // Mengedit kategori
    public function update(Request $request, $id)
    {
        $this->pastikanAdmin();

        $request->validate([
            'nama_kategori' => 'required|string|max:50',
            'deskripsi' => 'nullable|string',
        ]);

        $kategori = Kategori::findOrFail($id);

        $kategori->update($request->only('nama_kategori', 'deskripsi'));

        return back()->with('success', 'Kategori berhasil diperbarui.');
    }

    // Menghapus kategori
    public function destroy($id)
    {
        $this->pastikanAdmin();

        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return back()->with('success', 'Kategori berhasil dihapus.');
    }
}
