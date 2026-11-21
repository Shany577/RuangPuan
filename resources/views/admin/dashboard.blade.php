<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - RuangPuan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F7F4D5] text-[#0A3323] font-sans min-h-screen flex">

    <!-- Sidebar Menu Admin (Sesuai Use Case) -->
    <aside class="w-64 bg-[#0A3323] text-white flex flex-col justify-between p-6">
        <div>
            <h1 class="text-2xl font-bold tracking-wide text-[#F7F4D5] mb-8">RuangPuan Admin</h1>
            <nav class="space-y-2 text-sm">
                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2.5 rounded-xl bg-[#839958] text-white font-semibold">
                    Dashboard Utama
                </a>
                <a href="{{ route('admin.pengguna.index') }}"
                    class="block px-4 py-2.5 rounded-xl hover:bg-[#839958]/30 transition">
                        Kelola Akun Pengguna
                </a>
                <a href="{{ route('admin.pendaftaran.index') }}"
                    class="block px-4 py-2.5 rounded-xl hover:bg-[#839958]/30 transition">
                        Persetujuan Pendaftaran
                </a>
                <a href="{{ route('admin.kategori.index') }}"
                    class="block px-4 py-2.5 rounded-xl hover:bg-[#839958]/30 transition">
                        Kelola Kategori
                </a>
                <a href="{{ route('admin.postingan.index') }}"
                    class="block px-4 py-2.5 rounded-xl hover:bg-[#839958]/30 transition">
                    Kelola Postingan
                </a>
                <a href="{{ route('admin.komentar.index') }}"
                    class="block px-4 py-2.5 rounded-xl hover:bg-[#839958]/30 transition">
                    Kelola Komentar
                </a>
                <a href="{{ route('admin.laporan-konten.index') }}"
                    class="block px-4 py-2.5 rounded-xl hover:bg-[#839958]/30 transition">
                    Tinjau Laporan Konten
                </a>
                <a href="{{ route('admin.laporan-kejadian.index') }}"
                    class="block px-4 py-2.5 rounded-xl hover:bg-[#839958]/30 transition">
                    Tinjau Laporan Kejadian
                </a>
                <a href="{{ route('admin.direktori-bantuan.index') }}"
                    class="block px-4 py-2.5 rounded-xl hover:bg-[#839958]/30 transition">
                    Kelola Direktori Bantuan
                </a>
            </nav>
        </div>

        <form action="{{ route('logout') }}" method="POST" class="mt-8">
            @csrf
            <button type="submit" class="w-full bg-[#D3968C] hover:bg-red-500 text-[#0A3323] hover:text-white font-semibold py-2 rounded-xl transition">
                Logout
            </button>
        </form>
    </aside>

    <!-- Konten Utama Admin -->
    <main class="flex-1 p-8">
        <div class="bg-white p-6 rounded-2xl shadow-md border-l-4 border-[#839958] mb-6">
            <h2 class="text-2xl font-bold">Selamat Datang, Admin!</h2>
            <p class="text-gray-600 text-sm mt-1">Gunakan panel di samping untuk mengelola komunitas, moderasi laporan, dan direktori bantuan RuangPuan.</p>
        </div>

        <!-- Ringkasan Kartu Moderasi -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-2xl shadow-sm border-t-4 border-[#0A3323]">
                <h3 class="text-sm font-semibold text-gray-500">Persetujuan Pendaftaran</h3>
                <p class="text-3xl font-bold mt-2 text-[#0A3323]">0</p>
                <p class="text-xs text-gray-400 mt-1">Menunggu verifikasi admin</p>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border-t-4 border-[#D3968C]">
                <h3 class="text-sm font-semibold text-gray-500">Laporan Konten</h3>
                <p class="text-3xl font-bold mt-2 text-[#0A3323]">0</p>
                <p class="text-xs text-gray-400 mt-1">Perlu ditinjau</p>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border-t-4 border-[#839958]">
                <h3 class="text-sm font-semibold text-gray-500">Laporan Kejadian</h3>
                <p class="text-3xl font-bold mt-2 text-[#0A3323]">0</p>
                <p class="text-xs text-gray-400 mt-1">Laporan masuk</p>
            </div>
        </div>
    </main>

</body>
</html>