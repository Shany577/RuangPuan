
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Akun Pengguna - RuangPuan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#F7F4D5] text-[#0A3323] font-sans min-h-screen">

    <header class="bg-[#0A3323] text-white px-8 py-5">
        <h1 class="text-2xl font-bold">RuangPuan Admin</h1>
        <p class="text-sm text-[#F7F4D5]">Kelola Akun Pengguna</p>
    </header>

    <main class="p-8">

        <a href="{{ route('admin.dashboard') }}"
           class="text-[#839958] hover:underline text-sm font-semibold">
            &larr; Kembali ke Dashboard
        </a>

        <div class="bg-white rounded-2xl shadow-md p-6 mt-5">

            <h2 class="text-2xl font-bold mb-2">
                Daftar Akun Pengguna
            </h2>

            <p class="text-gray-500 text-sm mb-6">
                Lihat dan kelola status akun anggota RuangPuan.
            </p>

            @if (session('success'))
                <div class="bg-[#839958]/20 border border-[#839958]
                            p-3 rounded-lg mb-4 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            @if ($pengguna->isEmpty())
                <div class="text-center py-10 text-gray-500">
                    Belum ada akun pengguna.
                </div>
            @else

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">

                        <thead class="bg-[#0A3323] text-white">
                            <tr>
                                <th class="p-4">No.</th>
                                <th class="p-4">Nama</th>
                                <th class="p-4">Email</th>
                                <th class="p-4">Status Akun</th>
                                <th class="p-4">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($pengguna as $index => $user)
                                <tr class="border-b hover:bg-[#F7F4D5]">

                                    <td class="p-4">
                                        {{ $index + 1 }}
                                    </td>

                                    <td class="p-4 font-semibold">
                                        {{ $user->nama }}
                                    </td>

                                    <td class="p-4">
                                        {{ $user->email }}
                                    </td>

                                    <td class="p-4">
                                        @if ($user->status_akun === 'aktif')
                                            <span class="bg-[#839958]/20 text-[#0A3323]
                                                         px-3 py-1 rounded-full">
                                                Aktif
                                            </span>
                                        @elseif ($user->status_akun === 'non aktif')
                                            <span class="bg-[#D3968C]/30 text-[#0A3323]
                                                         px-3 py-1 rounded-full">
                                                Nonaktif
                                            </span>
                                        @elseif ($user->status_akun === 'menunggu')
                                            <span class="bg-yellow-100 text-yellow-800
                                                         px-3 py-1 rounded-full">
                                                Menunggu
                                            </span>
                                        @else
                                            <span class="bg-gray-200 text-gray-700
                                                         px-3 py-1 rounded-full">
                                                Ditolak
                                            </span>
                                        @endif
                                    </td>

                                    <td class="p-4">

                                        @if (in_array($user->status_akun, ['aktif', 'non aktif']))

                                            <form
                                                action="{{ route('admin.pengguna.status', $user->id_pengguna) }}"
                                                method="POST">

                                                @csrf
                                                @method('PUT')

                                                @if ($user->status_akun === 'aktif')
                                                    <input type="hidden"
                                                           name="status_akun"
                                                           value="non aktif">

                                                    <button type="submit"
                                                        class="bg-[#D3968C] hover:opacity-80
                                                               px-3 py-2 rounded-lg font-semibold">
                                                        Nonaktifkan
                                                    </button>
                                                @else
                                                    <input type="hidden"
                                                           name="status_akun"
                                                           value="aktif">

                                                    <button type="submit"
                                                        class="bg-[#839958] hover:opacity-80
                                                               px-3 py-2 rounded-lg text-white font-semibold">
                                                        Aktifkan
                                                    </button>
                                                @endif

                                            </form>

                                        @else
                                            <span class="text-gray-400">
                                                Dikelola melalui pendaftaran
                                            </span>
                                        @endif

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
