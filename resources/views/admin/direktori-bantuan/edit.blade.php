
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Direktori Bantuan - RuangPuan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F7F4D5] min-h-screen">

    <div class="bg-[#0A3323] text-white px-8 py-5">
        <h1 class="text-2xl font-bold">RuangPuan</h1>
        <p class="text-sm text-gray-200">Panel Administrator</p>
    </div>

    <main class="p-8 max-w-4xl mx-auto">

        <a href="{{ route('admin.direktori-bantuan.index') }}"
           class="text-[#0A3323] hover:underline">
            ← Kembali ke Direktori Bantuan
        </a>

        <div class="bg-white rounded-xl shadow-md p-6 mt-6">

            <h2 class="text-2xl font-bold text-[#0A3323] mb-6">
                Edit Direktori Bantuan
            </h2>

            <form action="{{ route('admin.direktori-bantuan.update', $bantuan->id_bantuan) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="space-y-4">

                    <div>
                        <label class="block mb-1 font-medium">Nama Lembaga</label>
                        <input type="text" name="nama_lembaga"
                            value="{{ old('nama_lembaga', $bantuan->nama_lembaga) }}"
                            class="w-full border rounded-lg p-2" required>
                    </div>

                    <div>
                        <label class="block mb-1 font-medium">Deskripsi</label>
                        <textarea name="deskripsi"
                            class="w-full border rounded-lg p-2">{{ old('deskripsi', $bantuan->deskripsi) }}</textarea>
                    </div>

                    <div>
                        <label class="block mb-1 font-medium">Kontak</label>
                        <input type="text" name="kontak"
                            value="{{ old('kontak', $bantuan->kontak) }}"
                            class="w-full border rounded-lg p-2">
                    </div>

                    <div>
                        <label class="block mb-1 font-medium">Alamat</label>
                        <textarea name="alamat"
                            class="w-full border rounded-lg p-2">{{ old('alamat', $bantuan->alamat) }}</textarea>
                    </div>

                    <div>
                        <label class="block mb-1 font-medium">Tautan</label>
                        <input type="url" name="tautan"
                            value="{{ old('tautan', $bantuan->tautan) }}"
                            class="w-full border rounded-lg p-2">
                    </div>

                    <div>
                        <label class="block mb-1 font-medium">Status</label>
                        <select name="status" class="w-full border rounded-lg p-2" required>
                            <option value="Aktif" {{ $bantuan->status == 'Aktif' ? 'selected' : '' }}>
                                Aktif
                            </option>
                            <option value="Tidak Aktif" {{ $bantuan->status == 'Tidak Aktif' ? 'selected' : '' }}>
                                Tidak Aktif
                            </option>
                        </select>
                    </div>

                </div>

                <div class="flex gap-3 mt-6">
                    <button type="submit"
                        class="bg-[#0A3323] text-white px-5 py-2 rounded-lg hover:bg-[#839958]">
                        Simpan Perubahan
                    </button>

                    <a href="{{ route('admin.direktori-bantuan.index') }}"
                       class="bg-gray-300 text-gray-800 px-5 py-2 rounded-lg">
                        Batal
                    </a>
                </div>

            </form>
        </div>
    </main>

</body>
</html>
