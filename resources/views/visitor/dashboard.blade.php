<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pengunjung - RuangPuan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'ruang-dark': '#0A3323',
                        'ruang-moss': '#839958',
                        'ruang-beige': '#F7F4D5',
                        'ruang-rose': '#D3968C',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-[#F7F4D5] text-[#0A3323] font-sans"> <!-- Menggunakan latar belakang Beige dan teks Dark Green -->

    <!-- Contoh Navbar / Header -->
    <header class="bg-[#0A3323] text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold tracking-wide">RuangPuan</h1>
            <nav class="space-x-4">
                <a href="#" class="hover:text-[#D3968C] transition">Beranda</a>
                <a href="#" class="hover:text-[#D3968C] transition">Artikel</a>
                <a href="#" class="hover:text-[#D3968C] transition">Event</a>
                <a href="{{ route('login') }}" class="bg-[#D3968C] hover:bg-[#839958] text-[#0A3323] hover:text-white font-semibold px-5 py-2 rounded-xl transition duration-300 shadow-sm">
                Login
                </a>
            </nav>
        </div>
    </header>

    <!-- Konten Utama Dashboard -->
    <main class="container mx-auto p-6 mt-6">
        <div class="bg-white p-8 rounded-2xl shadow-lg border-t-4 border-[#839958]">
            <h2 class="text-3xl font-bold text-[#0A3323] mb-3">Selamat Datang di Dashboard Pengunjung</h2>
            <p class="text-gray-600 mb-6">Jelajahi berbagai informasi, direktori bantuan, dan cerita menarik di RuangPuan.</p>
            
            <button class="bg-[#839958] hover:bg-[#0A3323] text-white font-semibold px-6 py-2 rounded-xl transition duration-300">
                Jelajahi Konten
            </button>
        </div>
    </main>

</body>
</html>