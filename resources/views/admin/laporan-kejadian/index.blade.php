
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tinjau Laporan Kejadian - RuangPuan</title>
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
                Tinjau Laporan Kejadian
            </h2>

            <p class="text-gray-600 mt-1">
                Daftar laporan kejadian yang dikirimkan oleh pengguna RuangPuan.
            </p>
        </div>

        <div class="bg-white rounded-xl shadow-md overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-[#0A3323] text-white">
                    <tr>
                        <th class="p-4">No</th>
                        <th class="p-4">Pelapor</th>
                        <th class="p-4">Jenis Kegiatan</th>
                        <th class="p-4">Kronologi</th>
                        <th class="p-4">Tanggal Kejadian</th>
                        <th class="p-4">Tingkat Urgensi</th>
                        <th class="p-4">Direktori Bantuan</th>
                        <th class="p-4">Status Laporan</th>
                        <th class="p-4">Catatan Admin</th>
                        <th class="p-4">Tanggal Dibuat</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @forelse ($laporan as $item)
                        <tr class="hover:bg-[#F7F4D5]">
                            <td class="p-4">{{ $loop->iteration }}</td>

                            <td class="p-4">
                                {{ $item->pelapor->nama ?? '-' }}
                            </td>

                            <td class="p-4">
                                {{ $item->jenis_kegiatan }}
                            </td>

                            <td class="p-4">
                                {{ $item->kronologi }}
                            </td>

                            <td class="p-4">
                                {{ $item->tanggal_kejadian?->format('d-m-Y') ?? '-' }}
                            </td>

                            <td class="p-4">
                                {{ $item->tingkat_urgensi ?? '-' }}
                            </td>

                            <td class="p-4">
                                {{ $item->direktoriBantuan->nama_bantuan ?? '-' }}
                            </td>

                            <td class="p-4">
                                {{ $item->status_laporan ?? '-' }}
                            </td>

                            <td class="p-4">
                                {{ $item->catatan_admin ?? '-' }}
                            </td>

                            <td class="p-4">
                                {{ $item->dibuat_pada?->format('d-m-Y H:i') ?? '-' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10"
                                class="p-8 text-center text-gray-500">
                                Belum ada laporan kejadian.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>

</body>
</html>
