
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tinjau Laporan Konten - RuangPuan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#F7F4D5] text-[#0A3323] font-sans min-h-screen">

    <header class="bg-[#0A3323] text-white px-8 py-5">
        <h1 class="text-2xl font-bold">RuangPuan Admin</h1>
        <p class="text-sm text-[#F7F4D5]">Tinjau Laporan Konten</p>
    </header>

    <main class="p-8">

        <a href="{{ route('admin.dashboard') }}"
           class="text-[#839958] hover:underline text-sm font-semibold">
            &larr; Kembali ke Dashboard
        </a>

        <div class="bg-white rounded-2xl shadow-md p-6 mt-5">

            <h2 class="text-2xl font-bold mb-2">
                Daftar Laporan Konten
            </h2>

            <p class="text-gray-500 text-sm mb-6">
                Tinjau laporan postingan dan komentar yang dikirim oleh anggota RuangPuan.
            </p>

            @if ($laporan->isEmpty())
                <div class="text-center py-10 text-gray-500">
                    Belum ada laporan konten.
                </div>
            @else

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">

                        <thead class="bg-[#0A3323] text-white">
                            <tr>
                                <th class="p-4">No.</th>
                                <th class="p-4">Jenis Konten</th>
                                <th class="p-4">Konten yang Dilaporkan</th>
                                <th class="p-4">Pelapor</th>
                                <th class="p-4">Alasan</th>
                                <th class="p-4">Keterangan</th>
                                <th class="p-4">Status Laporan</th>
                                <th class="p-4">Tanggal Laporan</th>
                                <th class="p-4">Peninjau</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($laporan as $index => $item)
                                <tr class="border-b hover:bg-[#F7F4D5]">

                                    <td class="p-4">
                                        {{ $index + 1 }}
                                    </td>

                                    <td class="p-4 font-semibold">
                                        @if ($item->unggahan_id_unggahan)
                                            Postingan
                                        @elseif ($item->komentar_id_komentar)
                                            Komentar
                                        @else
                                            Tidak diketahui
                                        @endif
                                    </td>

                                    <td class="p-4">
                                        @if ($item->unggahan)
                                            {{ $item->unggahan->judul }}
                                        @elseif ($item->komentar)
                                            {{ $item->komentar->isi_komentar }}
                                        @else
                                            Konten tidak ditemukan
                                        @endif
                                    </td>

                                    <td class="p-4">
                                        {{ $item->pelapor->nama ?? 'Tidak diketahui' }}
                                    </td>

                                    <td class="p-4">
                                        {{ $item->alasan ?? '-' }}
                                    </td>

                                    <td class="p-4">
                                        {{ $item->keterangan ?? '-' }}
                                    </td>

                                    <td class="p-4">
                                        {{ $item->status_laporan ?? '-' }}
                                    </td>

                                    <td class="p-4">
                                        {{ $item->dibuat_pada ?? '-' }}
                                    </td>

                                    <td class="p-4">
                                        {{ $item->peninjau->nama ?? 'Belum ditinjau' }}
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
