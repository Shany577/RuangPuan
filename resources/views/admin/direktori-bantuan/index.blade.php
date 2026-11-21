<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Direktori Bantuan - RuangPuan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F7F4D5] min-h-screen">

    <div class="bg-[#0A3323] text-white px-8 py-5">
        <h1 class="text-2xl font-bold">RuangPuan</h1>
        <p class="text-sm text-gray-200">Panel Administrator</p>
    </div>

    <main class="p-8">
        <div class="mb-6">
            <a href="{{ route('admin.dashboard') }}"
               class="text-[#0A3323] hover:underline">
                ← Kembali ke Dashboard
            </a>

            <h2 class="text-2xl font-bold text-[#0A3323] mt-4">
                Kelola Direktori Bantuan
            </h2>

            <p class="text-gray-600 mt-1">
                Daftar lembaga dan layanan bantuan yang tersedia.
            </p>
        </div>


@if (session('success'))
    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-lg">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="bg-white rounded-xl shadow-md p-6 mb-6">
    <h3 class="text-lg font-bold text-[#0A3323] mb-4">
        Tambah Lembaga Bantuan
    </h3>

    <form action="{{ route('admin.direktori-bantuan.store') }}" method="POST">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block mb-1 font-medium">Nama Lembaga</label>
                <input type="text" name="nama_lembaga"
                    value="{{ old('nama_lembaga') }}"
                    class="w-full border rounded-lg p-2" required>
            </div>

            <div>
                <label class="block mb-1 font-medium">Kontak</label>
                <input type="text" name="kontak"
                    value="{{ old('kontak') }}"
                    class="w-full border rounded-lg p-2">
            </div>

            <div>
                <label class="block mb-1 font-medium">Alamat</label>
                <textarea name="alamat"
                    class="w-full border rounded-lg p-2">{{ old('alamat') }}</textarea>
            </div>

            <div>
                <label class="block mb-1 font-medium">Tautan</label>
                <input type="url" name="tautan"
                    value="{{ old('tautan') }}"
                    placeholder="https://contoh.com"
                    class="w-full border rounded-lg p-2">
            </div>

            <div>
                <label class="block mb-1 font-medium">Status</label>
                <select name="status" class="w-full border rounded-lg p-2" required>
                    <option value="">Pilih Status</option>
                    <option value="Aktif">Aktif</option>
                    <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
            </div>

            <div>
                <label class="block mb-1 font-medium">Deskripsi</label>
                <textarea name="deskripsi"
                    class="w-full border rounded-lg p-2">{{ old('deskripsi') }}</textarea>
            </div>
        </div>

        <button type="submit"
            class="mt-5 bg-[#0A3323] text-white px-5 py-2 rounded-lg hover:bg-[#839958]">
            Simpan Data
        </button>
    </form>
</div>


        <div class="bg-white rounded-xl shadow-md overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-[#0A3323] text-white">
                    <tr>
                        <th class="p-4">No</th>
                        <th class="p-4">Nama Lembaga</th>
                        <th class="p-4">Deskripsi</th>
                        <th class="p-4">Kontak</th>
                        <th class="p-4">Alamat</th>
                        <th class="p-4">Tautan</th>
                        <th class="p-4">Status</th>
                        <th class="p-4">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @forelse ($bantuan as $item)
                        <tr class="hover:bg-[#F7F4D5]">
                            <td class="p-4">{{ $loop->iteration }}</td>
                            <td class="p-4 font-semibold">
                                {{ $item->nama_lembaga }}
                            </td>
                            <td class="p-4">{{ $item->deskripsi ?? '-' }}</td>
                            <td class="p-4">{{ $item->kontak ?? '-' }}</td>
                            <td class="p-4">{{ $item->alamat ?? '-' }}</td>
                            <td class="p-4">
                                @if ($item->tautan)
                                    <a href="{{ $item->tautan }}"
                                       target="_blank"
                                       class="text-[#839958] underline">
                                        Kunjungi
                                    </a>
                                @else
                                    -
                                @endif
                            </td>
                            <td class="p-4">{{ $item->status ?? '-' }}</td>

                            <td class="p-4">
                                <div class="flex gap-2">
                                    <a href="{{ route('admin.direktori-bantuan.edit', $item->id_bantuan) }}"
                                    class="bg-[#839958] text-white px-3 py-2 rounded-lg hover:bg-[#0A3323]">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.direktori-bantuan.destroy', $item->id_bantuan) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="bg-[#D3968C] text-white px-3 py-2 rounded-lg hover:bg-red-700">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8"
                                class="p-8 text-center text-gray-500">
                                Belum ada data direktori bantuan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>

</body>
</html>
