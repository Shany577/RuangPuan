
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Kategori - RuangPuan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#F7F4D5] min-h-screen p-8">

    <div class="max-w-6xl mx-auto">

        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-[#0A3323]">
                    Kelola Kategori
                </h1>
                <p class="text-gray-600 mt-2">
                    Tambah, ubah, dan hapus kategori RuangPuan.
                </p>
            </div>

            <a href="{{ route('admin.dashboard') }}"
               class="bg-[#0A3323] text-white px-5 py-3 rounded-xl">
                Kembali ke Dashboard
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded-xl mb-5">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded-xl mb-5">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form Tambah Kategori -->
        <div class="bg-white rounded-2xl shadow p-6 mb-8">
            <h2 class="text-xl font-bold text-[#0A3323] mb-5">
                Tambah Kategori
            </h2>

            <form action="{{ route('admin.kategori.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block font-medium mb-2">
                        Nama Kategori
                    </label>
                    <input type="text"
                           name="nama_kategori"
                           maxlength="50"
                           value="{{ old('nama_kategori') }}"
                           required
                           class="w-full border rounded-xl p-3">
                </div>

                <div class="mb-4">
                    <label class="block font-medium mb-2">
                        Deskripsi
                    </label>
                    <textarea name="deskripsi"
                              rows="3"
                              class="w-full border rounded-xl p-3">{{ old('deskripsi') }}</textarea>
                </div>

                <button type="submit"
                        class="bg-[#839958] text-white px-5 py-3 rounded-xl">
                    Tambah Kategori
                </button>
            </form>
        </div>

        <!-- Daftar Kategori -->
        <div class="bg-white rounded-2xl shadow p-6">
            <h2 class="text-xl font-bold text-[#0A3323] mb-5">
                Daftar Kategori
            </h2>

            @if ($kategori->isEmpty())
                <p class="text-gray-600 text-center py-8">
                    Belum ada kategori.
                </p>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="border-b text-[#0A3323]">
                                <th class="p-3">No</th>
                                <th class="p-3">Nama Kategori</th>
                                <th class="p-3">Deskripsi</th>
                                <th class="p-3">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($kategori as $index => $item)
                                <tr class="border-b align-top">
                                    <td class="p-3">{{ $index + 1 }}</td>

                                    <td class="p-3">
                                        {{ $item->nama_kategori }}
                                    </td>

                                    <td class="p-3">
                                        {{ $item->deskripsi ?? '-' }}
                                    </td>

                                    <td class="p-3">
                                        <div class="flex flex-col gap-3 min-w-52">

                                            <!-- Form Edit -->
                                            <form action="{{ route('admin.kategori.update', $item->id_kategori) }}"
                                                  method="POST">
                                                @csrf
                                                @method('PUT')

                                                <input type="text"
                                                       name="nama_kategori"
                                                       value="{{ $item->nama_kategori }}"
                                                       maxlength="50"
                                                       required
                                                       class="w-full border rounded-lg p-2 mb-2">

                                                <textarea name="deskripsi"
                                                          rows="2"
                                                          class="w-full border rounded-lg p-2 mb-2">{{ $item->deskripsi }}</textarea>

                                                <button type="submit"
                                                        class="bg-[#839958] text-white px-3 py-2 rounded-lg">
                                                    Simpan Perubahan
                                                </button>
                                            </form>

                                            <!-- Form Hapus -->
                                            <form action="{{ route('admin.kategori.destroy', $item->id_kategori) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="bg-[#D3968C] text-white px-3 py-2 rounded-lg">
                                                    Hapus
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

    </div>

</body>
</html>
