<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pengunjung - RuangPuan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F7F4D5] text-[#0A3323] font-sans min-h-screen flex flex-col">

    <!-- Navbar Pengunjung -->
    <header class="bg-[#0A3323] text-white sticky top-0 z-40 shadow-sm">
        <div class="max-w-6xl mx-auto px-5 py-4 flex items-center justify-between gap-4">
            <a href="{{ route('home') }}" class="text-2xl font-bold tracking-wide text-[#F7F4D5]">
                RuangPuan
            </a>

            <nav class="hidden md:flex items-center gap-6 text-sm">
                <a href="#beranda" class="hover:text-[#D3968C] transition">Beranda</a>
                <a href="#komunitas" class="hover:text-[#D3968C] transition">Komunitas</a>
                <a href="#regulasi-hak" class="hover:text-[#D3968C] transition">Perlindungan & Hukum</a>
            </nav>

            <a href="{{ route('login') }}"
                class="bg-[#D3968C] hover:bg-[#839958] text-[#0A3323] hover:text-white font-semibold px-4 py-2 rounded-xl text-sm transition">
                Login
            </a>
        </div>
    </header>

    <main class="flex-1 max-w-6xl w-full mx-auto px-5 py-8 space-y-10">

        <!-- Hero / Sambutan Pengunjung -->
        <section id="beranda" class="bg-white rounded-3xl shadow-md border-t-4 border-[#839958] p-6 md:p-10 grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
            <div class="space-y-4">
                <span class="inline-block text-xs font-semibold uppercase tracking-wider bg-[#F7F4D5] text-[#0A3323] px-3.5 py-1 rounded-full">
                    Ruang Aman & Edukasi
                </span>
                <h1 class="text-3xl md:text-4xl font-bold text-[#0A3323] leading-tight">
                    Selamat Datang di Dashboard Pengunjung
                </h1>
                <p class="text-sm md:text-base text-gray-600 leading-relaxed">
                    Jelajahi cerita kebersamaan perempuan, pahami payung hukum perlindungan perempuan dan anak, serta temukan ruang dukungan yang aman dan saling menguatkan.
                </p>
                <div class="flex flex-wrap gap-3 pt-2">
                    <a href="#regulasi-hak"
                        class="bg-[#839958] hover:bg-[#0A3323] text-white font-semibold px-5 py-2.5 rounded-xl text-sm transition">
                        Jelajahi Konten & Hukum
                    </a>
                    <a href="{{ route('login') }}"
                        class="bg-[#F7F4D5] hover:bg-[#D3968C]/40 text-[#0A3323] font-semibold px-5 py-2.5 rounded-xl text-sm transition">
                        Masuk ke Komunitas
                    </a>
                </div>
            </div>

            <!-- Visual Kegiatan Wanita Berkumpul -->
            <div id="komunitas" class="space-y-3">
                <div class="relative rounded-2xl overflow-hidden shadow-md border border-[#839958]/20 bg-[#F7F4D5]">
                    <img
                        src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?auto=format&fit=crop&w=1000&q=80"
                        alt="Sekelompok wanita berkumpul tertawa dan berdiskusi penuh semangat"
                        class="w-full h-72 object-cover"
                        onerror="this.style.display='none'; document.getElementById('img-fallback').classList.remove('hidden');"
                    >
                    <div id="img-fallback" class="hidden h-72 p-6 flex flex-col justify-center items-center text-center bg-[#0A3323] text-[#F7F4D5]">
                        <p class="text-lg font-bold">Lingkar Dukungan & Aktivitas Seru Perempuan</p>
                        <p class="text-xs text-[#F7F4D5]/80 mt-1 max-w-sm">
                            Ruang berkumpul, berbagi tawa, diskusi kreatif, dan saling menguatkan antarperempuan.
                        </p>
                    </div>
                </div>
                <div class="flex items-center justify-between text-xs text-gray-600 px-1">
                    <span class="font-medium text-[#0A3323]">Aktivitas Komunitas & Lingkar Dukungan</span>
                    <span>Saling Menguatkan • Aman • Inklusif</span>
                </div>
            </div>
        </section>

        <!-- Bagian Dasar Hukum & Perlindungan Perempuan dan Anak -->
        <section id="regulasi-hak" class="space-y-5">
            <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-[#0A3323] flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-[#839958]">Dasar Hukum & Hak Perlindungan</p>
                    <h2 class="text-2xl font-bold text-[#0A3323] mt-0.5">
                        Perlindungan Perempuan & Anak di Indonesia
                    </h2>
                    <p class="text-sm text-gray-600 mt-1">
                        Ringkasan regulasi utama terkait pencegahan kekerasan, kesetaraan hak, kesejahteraan ibu & anak, serta perlindungan kelompok rentan.
                    </p>
                </div>

                <!-- Filter Kategori Hukum -->
                <div class="flex flex-wrap gap-2" id="law-filters">
                    <button type="button" onclick="filterLaws('all')" data-law-filter="all"
                        class="law-filter-btn px-3.5 py-1.5 rounded-full text-xs font-semibold bg-[#0A3323] text-white transition">
                        Semua (4)
                    </button>
                    <button type="button" onclick="filterLaws('kekerasan')" data-law-filter="kekerasan"
                        class="law-filter-btn px-3.5 py-1.5 rounded-full text-xs font-semibold bg-white text-[#0A3323] border border-[#839958]/30 hover:bg-[#839958]/20 transition">
                        Kekerasan & TPPO
                    </button>
                    <button type="button" onclick="filterLaws('hak-diskriminasi')" data-law-filter="hak-diskriminasi"
                        class="law-filter-btn px-3.5 py-1.5 rounded-full text-xs font-semibold bg-white text-[#0A3323] border border-[#839958]/30 hover:bg-[#839958]/20 transition">
                        Diskriminasi & HAM
                    </button>
                    <button type="button" onclick="filterLaws('ibu-kerja')" data-law-filter="ibu-kerja"
                        class="law-filter-btn px-3.5 py-1.5 rounded-full text-xs font-semibold bg-white text-[#0A3323] border border-[#839958]/30 hover:bg-[#839958]/20 transition">
                        Ibu & Ketenagakerjaan
                    </button>
                    <button type="button" onclick="filterLaws('rentan')" data-law-filter="rentan"
                        class="law-filter-btn px-3.5 py-1.5 rounded-full text-xs font-semibold bg-white text-[#0A3323] border border-[#839958]/30 hover:bg-[#839958]/20 transition">
                        Perlindungan Ganda
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6" id="laws-grid">

                <!-- 1. Perlindungan dari Kekerasan Seksual & Kekerasan Domestik -->
                <article data-law-cat="kekerasan" class="law-card bg-white p-6 rounded-2xl shadow-sm border-t-4 border-[#839958] space-y-4">
                    <div class="flex items-start justify-between gap-2">
                        <div>
                            <span class="text-[11px] font-semibold bg-[#F7F4D5] text-[#0A3323] px-3 py-1 rounded-full">
                                1. Kekerasan Seksual, Domestik & TPPO
                            </span>
                            <h3 class="text-lg font-bold text-[#0A3323] mt-2">
                                Perlindungan dari Kekerasan Seksual & Kekerasan Domestik
                            </h3>
                        </div>
                    </div>

                    <ul class="space-y-3 text-sm text-gray-700 leading-relaxed">
                        <li class="p-3 rounded-xl bg-[#F7F4D5]/50">
                            <p class="font-bold text-[#0A3323]">UU No. 12 Tahun 2022 tentang Tindak Pidana Kekerasan Seksual (UU TPKS)</p>
                            <p class="text-xs text-gray-600 mt-1">
                                Undang-undang paling spesifik untuk melindungi korban kekerasan seksual, menjamin hak pelindungan, pemulihan (restitusi), hingga penanganan hukum secara komprehensif.
                            </p>
                        </li>
                        <li class="p-3 rounded-xl bg-[#F7F4D5]/50">
                            <p class="font-bold text-[#0A3323]">UU No. 23 Tahun 2004 tentang Penghapusan Kekerasan Dalam Rumah Tangga (UU PKDRT)</p>
                            <p class="text-xs text-gray-600 mt-1">
                                Melindungi perempuan (sebagai istri, anak, atau pekerja domestik) dari kekerasan fisik, psikis, seksual, dan penelantaran di lingkup rumah tangga.
                            </p>
                        </li>
                        <li class="p-3 rounded-xl bg-[#F7F4D5]/50">
                            <p class="font-bold text-[#0A3323]">UU No. 21 Tahun 2007 tentang Pemberantasan Tindak Pidana Perdagangan Orang (UU TPPO)</p>
                            <p class="text-xs text-gray-600 mt-1">
                                Melindungi perempuan dan anak-anak yang sering kali menjadi target utama eksploitasi dan perdagangan manusia.
                            </p>
                        </li>
                    </ul>
                </article>

                <!-- 2. Perlindungan dari Diskriminasi & Hak Asasi -->
                <article data-law-cat="hak-diskriminasi" class="law-card bg-white p-6 rounded-2xl shadow-sm border-t-4 border-[#0A3323] space-y-4">
                    <div>
                        <span class="text-[11px] font-semibold bg-[#F7F4D5] text-[#0A3323] px-3 py-1 rounded-full">
                            2. Kesetaraan & Hak Asasi
                        </span>
                        <h3 class="text-lg font-bold text-[#0A3323] mt-2">
                            Perlindungan dari Diskriminasi & Hak Asasi
                        </h3>
                    </div>

                    <ul class="space-y-3 text-sm text-gray-700 leading-relaxed">
                        <li class="p-3 rounded-xl bg-[#F7F4D5]/50">
                            <p class="font-bold text-[#0A3323]">UU No. 7 Tahun 1984 (Ratifikasi CEDAW)</p>
                            <p class="text-xs text-gray-600 mt-1">
                                Pengesahan/Ratifikasi Konvensi Mengenai Penghapusan Segala Bentuk Diskriminasi Terhadap Wanita (CEDAW). Dasar hukum internasional yang diadopsi ke Indonesia untuk menjamin kesetaraan gender.
                            </p>
                        </li>
                        <li class="p-3 rounded-xl bg-[#F7F4D5]/50">
                            <p class="font-bold text-[#0A3323]">UU No. 39 Tahun 1999 tentang Hak Asasi Manusia</p>
                            <p class="text-xs text-gray-600 mt-1">
                                Memiliki bab khusus (Pasal 45 hingga Pasal 51) yang memuat hak-hak khusus wanita demi perlindungan dan keterwakilan dalam sistem pemerintahan.
                            </p>
                        </li>
                    </ul>
                </article>

                <!-- 3. Perlindungan Hak Reproduksi, Ibu, & Ketenagakerjaan -->
                <article data-law-cat="ibu-kerja" class="law-card bg-white p-6 rounded-2xl shadow-sm border-t-4 border-[#839958] space-y-4">
                    <div>
                        <span class="text-[11px] font-semibold bg-[#F7F4D5] text-[#0A3323] px-3 py-1 rounded-full">
                            3. Ibu, Anak & Pekerja
                        </span>
                        <h3 class="text-lg font-bold text-[#0A3323] mt-2">
                            Perlindungan Hak Reproduksi, Ibu, & Ketenagakerjaan
                        </h3>
                    </div>

                    <ul class="space-y-3 text-sm text-gray-700 leading-relaxed">
                        <li class="p-3 rounded-xl bg-[#F7F4D5]/50">
                            <p class="font-bold text-[#0A3323]">UU No. 4 Tahun 2024 tentang Kesejahteraan Ibu dan Anak pada Fase Seribu Hari Pertama Kehidupan (UU KIA)</p>
                            <p class="text-xs text-gray-600 mt-1">
                                Melindungi ibu pekerja dengan jaminan hak cuti melahirkan paling singkat 3 bulan, dan dapat diperpanjang hingga maksimal 6 bulan jika ada kondisi medis khusus.
                            </p>
                        </li>
                        <li class="p-3 rounded-xl bg-[#F7F4D5]/50">
                            <p class="font-bold text-[#0A3323]">UU No. 13 Tahun 2003 tentang Ketenagakerjaan</p>
                            <p class="text-xs text-gray-600 mt-1">
                                Mengatur larangan mempekerjakan perempuan hamil pada malam hari, hak cuti keguguran, serta cuti haid.
                            </p>
                        </li>
                    </ul>
                </article>

                <!-- 4. Perlindungan Ganda (Kelompok Rentan) -->
                <article data-law-cat="rentan" class="law-card bg-white p-6 rounded-2xl shadow-sm border-t-4 border-[#D3968C] space-y-4">
                    <div>
                        <span class="text-[11px] font-semibold bg-[#F7F4D5] text-[#0A3323] px-3 py-1 rounded-full">
                            4. Kelompok Rentan
                        </span>
                        <h3 class="text-lg font-bold text-[#0A3323] mt-2">
                            Perlindungan Ganda (Kelompok Rentan)
                        </h3>
                    </div>

                    <ul class="space-y-3 text-sm text-gray-700 leading-relaxed">
                        <li class="p-3 rounded-xl bg-[#F7F4D5]/50">
                            <p class="font-bold text-[#0A3323]">UU No. 8 Tahun 2016 tentang Penyandang Disabilitas</p>
                            <p class="text-xs text-gray-600 mt-1">
                                Mengatur perlindungan berlapis bagi perempuan disabilitas dari diskriminasi dan segala bentuk kekerasan.
                            </p>
                        </li>
                    </ul>
                </article>

            </div>
        </section>

    </main>

    <!-- Footer Pengunjung -->
    <footer class="bg-[#0A3323] text-[#F7F4D5]/80 text-xs py-6 px-5 mt-8">
        <div class="max-w-6xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-2">
            <p class="font-semibold text-[#F7F4D5]">RuangPuan — Ruang Aman & Informasi Perlindungan Perempuan dan Anak</p>
            <p>Informasi edukasi hukum & komunitas</p>
        </div>
    </footer>

    <script>
        function filterLaws(category) {
            document.querySelectorAll('.law-filter-btn').forEach(btn => {
                const active = btn.dataset.lawFilter === category;
                btn.classList.toggle('bg-[#0A3323]', active);
                btn.classList.toggle('text-white', active);
                btn.classList.toggle('bg-white', !active);
                btn.classList.toggle('text-[#0A3323]', !active);
            });

            document.querySelectorAll('.law-card').forEach(card => {
                const show = category === 'all' || card.dataset.lawCat === category;
                card.classList.toggle('hidden', !show);
            });
        }
    </script>
</body>
</html>