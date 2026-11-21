
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persetujuan Pendaftaran - RuangPuan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F7F4D5] min-h-screen p-8">

    <div class="max-w-6xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-[#0A3323]">
                    Persetujuan Pendaftaran
                </h1>
                <p class="text-gray-600 mt-2">
                    Periksa dan kelola pendaftaran pengguna RuangPuan.
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

        <div class="bg-white rounded-2xl shadow p-6">
            @if ($pendaftaran->isEmpty())
                <p class="text-gray-600 text-center py-8">
                    Belum ada pendaftaran yang menunggu persetujuan.
                </p>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="border-b text-[#0A3323]">
                                <th class="p-3">No</th>
                                <th class="p-3">Nama</th>
                                <th class="p-3">Email</th>
                                <th class="p-3">Tanggal Daftar</th>
                                <th class="p-3">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($pendaftaran as $index => $user)
                                <tr class="border-b">
                                    <td class="p-3">{{ $index + 1 }}</td>
                                    <td class="p-3">{{ $user->nama }}</td>
                                    <td class="p-3">{{ $user->email }}</td>
                                    <td class="p-3">
                                        {{ $user->dibuat_pada ?? '-' }}
                                    </td>
                                    <td class="p-3">
                                        <div class="flex gap-2">
                                            <form
                                                action="{{ route('admin.pendaftaran.status', $user->id_pengguna) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden"
                                                    name="status_akun"
                                                    value="aktif">

                                                <button type="submit"
                                                    class="bg-[#839958] text-white px-3 py-2 rounded-lg">
                                                    Setujui
                                                </button>
                                            </form>

                                            <form
                                                action="{{ route('admin.pendaftaran.status', $user->id_pengguna) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden"
                                                    name="status_akun"
                                                    value="ditolak">

                                                <button type="submit"
                                                    class="bg-[#D3968C] text-white px-3 py-2 rounded-lg">
                                                    Tolak
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
