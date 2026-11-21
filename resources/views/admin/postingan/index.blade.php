
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Postingan - RuangPuan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#F7F4D5] text-[#0A3323] font-sans min-h-screen">

    <header class="bg-[#0A3323] text-white px-8 py-5">
        <h1 class="text-2xl font-bold">RuangPuan Admin</h1>
        <p class="text-sm text-[#F7F4D5]">Kelola Postingan</p>
    </header>

    <main class="p-8">

        <a href="{{ route('admin.dashboard') }}"
           class="text-[#839958] hover:underline text-sm font-semibold">
            &larr; Kembali ke Dashboard
        </a>

        <div class="bg-white rounded-2xl shadow-md p-6 mt-5">

            <h2 class="text-2xl font-bold mb-2">
                Daftar Postingan
            </h2>

            <p class="text-gray-500 text-sm mb-6">
                Lihat dan pantau postingan yang dibuat oleh anggota RuangPuan.
            </p>

            @if ($postingan->isEmpty())
                <div class="text-center py-10 text-gray-500">
                    Belum ada postingan.
                </div>
            @else

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">

                        <thead class="bg-[#0A3323] text-white">
                            <tr>
                                <th class="p-4">No.</th>
                                <th class="p-4">Judul</th>
                                <th class="p-4">Isi Postingan</th>
                                <th class="p-4">Penulis</th>
                                <th class="p-4">Kategori</th>
                                <th class="p-4">Status Moderasi</th>
                                <th class="p-4">Tanggal Dibuat</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($postingan as $index => $post)
                                <tr class="border-b hover:bg-[#F7F4D5]">

                                    <td class="p-4">
                                        {{ $index + 1 }}
                                    </td>

                                    <td class="p-4 font-semibold">
                                        {{ $post->judul }}
                                    </td>

                                    <td class="p-4">
                                        {{ $post->isi }}
                                    </td>

                                    <td class="p-4">
                                        {{ $post->pengguna->nama ?? 'Tidak diketahui' }}
                                    </td>

                                    <td class="p-4">
                                        {{ $post->kategori->nama_kategori ?? 'Tidak ada kategori' }}
                                    </td>

                                    <td class="p-4">
                                        {{ $post->status_moderasi ?? '-' }}
                                    </td>

                                    <td class="p-4">
                                        {{ $post->dibuat_pada ?? '-' }}
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>

            @endif

        </div>
    </main>

</body>
</html>
