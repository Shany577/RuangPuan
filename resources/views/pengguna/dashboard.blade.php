<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pengguna - RuangPuan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F7F4D5] text-[#0A3323] font-sans min-h-screen flex">

    <!-- Sidebar Menu Pengguna (Sesuai Use Case) -->
    <aside class="w-64 bg-[#0A3323] text-white flex flex-col justify-between p-6">
        <div>
            <h1 class="text-2xl font-bold tracking-wide text-[#F7F4D5] mb-8">RuangPuan</h1>
            <nav class="space-y-2 text-sm">
                <a href="{{ route('pengguna.dashboard') }}" class="block px-4 py-2.5 rounded-xl bg-[#839958] text-white font-semibold">
                    Beranda Komunitas
                </a>
                <a href="#buat-postingan" class="block px-4 py-2.5 rounded-xl hover:bg-[#839958]/30 transition">
                    Buat Postingan
                </a>
                <a href="#postingan-saya" class="block px-4 py-2.5 rounded-xl hover:bg-[#839958]/30 transition">
                    Postingan Saya
                </a>
                <a href="#direktori-bantuan" class="block px-4 py-2.5 rounded-xl hover:bg-[#839958]/30 transition">
                    Direktori Bantuan
                </a>
                <a href="#lapor-konten" class="block px-4 py-2.5 rounded-xl hover:bg-[#839958]/30 transition">
                    Laporkan Konten
                </a>
                <a href="#lapor-kejadian" class="block px-4 py-2.5 rounded-xl hover:bg-[#839958]/30 transition">
                    Laporkan Kejadian
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

    <!-- Konten Utama Pengguna -->
    <main class="flex-1 p-8 space-y-6">
        <!-- Header Sambutan & Aksi Cepat -->
        <div class="bg-white p-6 rounded-2xl shadow-md border-l-4 border-[#839958] flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h2 class="text-2xl font-bold text-[#0A3323]">Halo, {{ Auth::user()->name ?? 'Pengguna' }}!</h2>
                <p class="text-gray-600 text-sm mt-1">Selamat datang di beranda komunitas RuangPuan. Bagikan cerita, beri dukungan, atau akses bantuan.</p>
            </div>
            <div class="flex flex-wrap gap-3">
                <a href="#buat-postingan" class="bg-[#839958] hover:bg-[#0A3323] text-white font-semibold px-4 py-2.5 rounded-xl text-sm transition">
                    + Buat Postingan
                </a>
                <a href="#lapor-kejadian" class="bg-[#D3968C] hover:bg-[#0A3323] text-[#0A3323] hover:text-white font-semibold px-4 py-2.5 rounded-xl text-sm transition">
                    Lapor Kejadian
                </a>
            </div>
        </div>

        <!-- Beranda Komunitas (Feed Postingan, Like & Komentar) -->
        <section id="beranda-komunitas" class="space-y-4">
            <h3 class="text-xl font-bold text-[#0A3323]">Beranda Komunitas</h3>

            <div class="bg-white p-6 rounded-2xl shadow-sm border-t-4 border-[#839958] space-y-4">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="font-bold text-[#0A3323]">Contoh Postingan Komunitas</p>
                        <p class="text-xs text-gray-500">Kategori: Dukungan & Cerita • Baru saja</p>
                    </div>
                    <span class="text-xs bg-[#F7F4D5] text-[#0A3323] px-3 py-1 rounded-full font-medium">
                        Publik
                    </span>
                </div>

                <p class="text-sm text-gray-700 leading-relaxed">
                    Ruang aman untuk berbagi pengalaman, saling menguatkan, dan berdiskusi secara positif di komunitas RuangPuan.
                </p>

                <!-- Aksi Like, Komentar, Laporkan Konten, Ubah/Hapus Postingan Sendiri -->
                <div class="flex flex-wrap items-center justify-between pt-3 border-t border-gray-100 text-sm gap-2">
                    <div class="flex items-center gap-4">
                        <button type="button" class="text-[#839958] hover:text-[#0A3323] font-semibold">
                            ♥ Like (0)
                        </button>
                        <button type="button" class="text-[#0A3323] hover:text-[#839958] font-semibold">
                            💬 Komentar (0)
                        </button>
                    </div>

                    <div class="flex items-center gap-3 text-xs">
                        <button type="button" class="text-gray-600 hover:text-[#0A3323]">Ubah</button>
                        <button type="button" class="text-gray-600 hover:text-red-600">Hapus</button>
                        <button type="button" class="text-[#D3968C] hover:underline font-semibold">Laporkan Konten</button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Direktori Bantuan -->
        <section id="direktori-bantuan" class="bg-white p-6 rounded-2xl shadow-sm border-t-4 border-[#0A3323]">
            <h3 class="text-lg font-bold text-[#0A3323] mb-2">Direktori Bantuan</h3>
            <p class="text-sm text-gray-600">
                Temukan informasi layanan pendampingan, konseling, dan kontak bantuan terpercaya yang tersedia untukmu.
            </p>
        </section>
    </main>

</body>
</html>