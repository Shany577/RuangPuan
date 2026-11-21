<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pengguna - RuangPuan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F7F4D5] text-[#0A3323] font-sans min-h-screen flex flex-col lg:flex-row">

    <!-- Sidebar Menu Pengguna -->
    <aside class="w-full lg:w-64 bg-[#0A3323] text-white flex flex-col justify-between p-6 lg:min-h-screen shrink-0">
        <div>
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-2xl font-bold tracking-wide text-[#F7F4D5]">RuangPuan</h1>
                    <p class="text-xs text-[#F7F4D5]/75 mt-0.5">Ruang Aman & Komunitas</p>
                </div>
                <span class="text-[11px] bg-[#839958]/30 text-[#F7F4D5] px-2.5 py-1 rounded-full">
                    Anggota
                </span>
            </div>

            <nav class="space-y-2 text-sm" id="sidebar-nav">
                <button type="button" onclick="switchSection('beranda')" data-nav="beranda"
                    class="nav-item w-full text-left px-4 py-2.5 rounded-xl bg-[#839958] text-white font-semibold transition">
                    Beranda Komunitas
                </button>
                <button type="button" onclick="openModal('modal-postingan')"
                    class="nav-item w-full text-left px-4 py-2.5 rounded-xl hover:bg-[#839958]/30 transition">
                    + Buat Postingan
                </button>
                <button type="button" onclick="switchSection('postingan-saya')" data-nav="postingan-saya"
                    class="nav-item w-full text-left px-4 py-2.5 rounded-xl hover:bg-[#839958]/30 transition">
                    Postingan Saya
                </button>
                <button type="button" onclick="switchSection('bantuan')" data-nav="bantuan"
                    class="nav-item w-full text-left px-4 py-2.5 rounded-xl hover:bg-[#839958]/30 transition">
                    Direktori Bantuan
                </button>
                <button type="button" onclick="openModal('modal-lapor-konten')"
                    class="nav-item w-full text-left px-4 py-2.5 rounded-xl hover:bg-[#839958]/30 transition">
                    Laporkan Konten
                </button>
                <button type="button" onclick="openModal('modal-lapor-kejadian')"
                    class="nav-item w-full text-left px-4 py-2.5 rounded-xl hover:bg-[#839958]/30 transition">
                    Laporkan Kejadian
                </button>
            </nav>
        </div>

        <div class="pt-6 mt-8 border-t border-white/10 space-y-3">
            <div class="bg-white/10 rounded-xl p-3 text-xs">
                <p class="text-[#F7F4D5]/70">Masuk sebagai</p>
                <p class="font-semibold text-white truncate">{{ Auth::user()->name ?? 'Pengguna RuangPuan' }}</p>
            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="w-full bg-[#D3968C] hover:bg-red-500 text-[#0A3323] hover:text-white font-semibold py-2 rounded-xl text-sm transition">
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- Konten Utama Pengguna -->
    <main class="flex-1 p-5 md:p-8 space-y-6 max-w-6xl w-full mx-auto">

        <!-- Notifikasi Toast Interaktif -->
        <div id="toast-banner" class="hidden bg-[#0A3323] text-[#F7F4D5] px-4 py-3 rounded-xl shadow-md text-sm flex items-center justify-between">
            <span id="toast-message">Perubahan tersimpan.</span>
            <button type="button" onclick="hideToast()" class="text-xs underline ml-4">Tutup</button>
        </div>

        <!-- Header Sambutan & Aksi Cepat -->
        <div class="bg-white p-6 rounded-2xl shadow-md border-l-4 border-[#839958] flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <p class="text-xs uppercase tracking-wider font-semibold text-[#839958]">Dashboard Pengguna</p>
                <h2 class="text-2xl font-bold text-[#0A3323] mt-0.5">
                    Halo, {{ Auth::user()->name ?? 'Pengguna' }}!
                </h2>
                <p class="text-gray-600 text-sm mt-1">
                    Selamat datang di beranda komunitas RuangPuan. Bagikan cerita, beri dukungan, atau akses bantuan dengan aman.
                </p>
            </div>
            <div class="flex flex-wrap gap-3">
                <button type="button" onclick="openModal('modal-postingan')"
                    class="bg-[#839958] hover:bg-[#0A3323] text-white font-semibold px-4 py-2.5 rounded-xl text-sm transition shadow-sm">
                    + Buat Postingan
                </button>
                <button type="button" onclick="openModal('modal-lapor-kejadian')"
                    class="bg-[#D3968C] hover:bg-[#0A3323] text-[#0A3323] hover:text-white font-semibold px-4 py-2.5 rounded-xl text-sm transition shadow-sm">
                    Lapor Kejadian
                </button>
            </div>
        </div>

        <!-- Ringkasan Interaktif Singkat -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div class="bg-white p-4 rounded-2xl shadow-sm border border-[#839958]/20">
                <p class="text-xs text-gray-500">Total Postingan Komunitas</p>
                <p id="stat-total-post" class="text-2xl font-bold text-[#0A3323] mt-1">2</p>
            </div>
            <div class="bg-white p-4 rounded-2xl shadow-sm border border-[#839958]/20">
                <p class="text-xs text-gray-500">Postingan Saya</p>
                <p id="stat-my-post" class="text-2xl font-bold text-[#839958] mt-1">1</p>
            </div>
            <div class="bg-white p-4 rounded-2xl shadow-sm border border-[#839958]/20">
                <p class="text-xs text-gray-500">Layanan Bantuan Aktif</p>
                <p class="text-2xl font-bold text-[#0A3323] mt-1">3</p>
            </div>
        </div>

        <!-- Filter & Pencarian Beranda Komunitas -->
        <section id="section-beranda" class="space-y-4">
            <div class="bg-white p-4 rounded-2xl shadow-sm flex flex-col md:flex-row md:items-center md:justify-between gap-3">
                <div class="flex flex-wrap gap-2" id="category-filters">
                    <button type="button" onclick="setCategory('Semua')" data-cat="Semua"
                        class="cat-btn px-3.5 py-1.5 rounded-full text-xs font-semibold bg-[#0A3323] text-white transition">
                        Semua
                    </button>
                    <button type="button" onclick="setCategory('Dukungan & Cerita')" data-cat="Dukungan & Cerita"
                        class="cat-btn px-3.5 py-1.5 rounded-full text-xs font-semibold bg-[#F7F4D5] text-[#0A3323] hover:bg-[#839958]/30 transition">
                        Dukungan & Cerita
                    </button>
                    <button type="button" onclick="setCategory('Edukasi & Kesehatan')" data-cat="Edukasi & Kesehatan"
                        class="cat-btn px-3.5 py-1.5 rounded-full text-xs font-semibold bg-[#F7F4D5] text-[#0A3323] hover:bg-[#839958]/30 transition">
                        Edukasi & Kesehatan
                    </button>
                    <button type="button" onclick="setCategory('Keamanan')" data-cat="Keamanan"
                        class="cat-btn px-3.5 py-1.5 rounded-full text-xs font-semibold bg-[#F7F4D5] text-[#0A3323] hover:bg-[#839958]/30 transition">
                        Keamanan
                    </button>
                </div>

                <input type="text" id="search-input" oninput="renderPosts()" placeholder="Cari topik atau kata kunci..."
                    class="w-full md:w-64 px-3.5 py-2 text-xs rounded-xl border border-gray-200 focus:outline-none focus:border-[#839958]">
            </div>

            <div class="flex items-center justify-between">
                <h3 id="feed-heading" class="text-xl font-bold text-[#0A3323]">Beranda Komunitas</h3>
                <span id="feed-count" class="text-xs text-gray-500"></span>
            </div>

            <!-- Daftar Postingan Dirender Dinamis -->
            <div id="posts-container" class="space-y-4"></div>
        </section>

        <!-- Direktori Bantuan -->
        <section id="section-bantuan" class="bg-white p-6 rounded-2xl shadow-sm border-t-4 border-[#0A3323] space-y-4">
            <div>
                <h3 class="text-lg font-bold text-[#0A3323]">Direktori Bantuan</h3>
                <p class="text-sm text-gray-600 mt-0.5">
                    Temukan informasi layanan pendampingan, konseling, dan kontak bantuan terpercaya yang tersedia untukmu.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
                <div class="p-4 rounded-xl bg-[#F7F4D5]/70 border border-[#839958]/30 space-y-2">
                    <span class="text-[11px] font-semibold bg-[#839958] text-white px-2.5 py-0.5 rounded-full">Konseling</span>
                    <h4 class="font-bold text-[#0A3323]">Layanan Konseling Sebaya</h4>
                    <p class="text-xs text-gray-600">Pendampingan empatik untuk berbagi cerita dan menjaga kesehatan mental.</p>
                    <button type="button" onclick="showToast('Info kontak Layanan Konseling Sebaya siap dihubungi melalui kanal resmi RuangPuan.')"
                        class="text-xs font-semibold text-[#0A3323] underline">
                        Lihat Detail Layanan
                    </button>
                </div>

                <div class="p-4 rounded-xl bg-[#F7F4D5]/70 border border-[#839958]/30 space-y-2">
                    <span class="text-[11px] font-semibold bg-[#0A3323] text-white px-2.5 py-0.5 rounded-full">Pendampingan</span>
                    <h4 class="font-bold text-[#0A3323]">Bantuan Hukum & Advokasi</h4>
                    <p class="text-xs text-gray-600">Panduan awal dan rujukan pendampingan terkait hak dan keamanan diri.</p>
                    <button type="button" onclick="showToast('Panduan Bantuan Hukum & Advokasi tersedia untuk anggota terdaftar.')"
                        class="text-xs font-semibold text-[#0A3323] underline">
                        Lihat Detail Layanan
                    </button>
                </div>

                <div class="p-4 rounded-xl bg-[#F7F4D5]/70 border border-[#D3968C] space-y-2">
                    <span class="text-[11px] font-semibold bg-[#D3968C] text-[#0A3323] px-2.5 py-0.5 rounded-full">Darurat</span>
                    <h4 class="font-bold text-[#0A3323]">Saluran Respons Cepat</h4>
                    <p class="text-xs text-gray-600">Akses cepat informasi darurat saat kamu membutuhkan bantuan segera.</p>
                    <button type="button" onclick="openModal('modal-lapor-kejadian')"
                        class="text-xs font-semibold text-[#0A3323] underline">
                        Laporkan Kejadian Sekarang
                    </button>
                </div>
            </div>
        </section>
    </main>

    <!-- Modal Buat Postingan -->
    <div id="modal-postingan" class="fixed inset-0 bg-black/50 hidden items-center justify-center p-4 z-50">
        <div class="bg-white rounded-2xl max-w-lg w-full p-6 space-y-4 shadow-xl">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-bold text-[#0A3323]">Buat Postingan Baru</h3>
                <button type="button" onclick="closeModal('modal-postingan')" class="text-gray-400 hover:text-gray-700 text-xl">&times;</button>
            </div>
            <form onsubmit="handleCreatePost(event)" class="space-y-3 text-sm">
                <div>
                    <label class="block font-medium mb-1">Judul Postingan</label>
                    <input type="text" id="post-title" required placeholder="Contoh: Tips menjaga batas aman saat beraktivitas"
                        class="w-full px-3.5 py-2 rounded-xl border border-gray-200 focus:outline-none focus:border-[#839958]">
                </div>
                <div>
                    <label class="block font-medium mb-1">Kategori</label>
                    <select id="post-category" class="w-full px-3.5 py-2 rounded-xl border border-gray-200 focus:outline-none focus:border-[#839958]">
                        <option value="Dukungan & Cerita">Dukungan & Cerita</option>
                        <option value="Edukasi & Kesehatan">Edukasi & Kesehatan</option>
                        <option value="Keamanan">Keamanan</option>
                    </select>
                </div>
                <div>
                    <label class="block font-medium mb-1">Isi Cerita / Informasi</label>
                    <textarea id="post-body" rows="4" required placeholder="Tuliskan cerita atau pengalamanmu di ruang yang aman ini..."
                        class="w-full px-3.5 py-2 rounded-xl border border-gray-200 focus:outline-none focus:border-[#839958]"></textarea>
                </div>
                <div class="flex justify-end gap-2 pt-2">
                    <button type="button" onclick="closeModal('modal-postingan')" class="px-4 py-2 rounded-xl border text-gray-600">Batal</button>
                    <button type="submit" class="px-4 py-2 rounded-xl bg-[#839958] text-white font-semibold hover:bg-[#0A3323] transition">
                        Publikasikan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Laporkan Konten -->
    <div id="modal-lapor-konten" class="fixed inset-0 bg-black/50 hidden items-center justify-center p-4 z-50">
        <div class="bg-white rounded-2xl max-w-md w-full p-6 space-y-4 shadow-xl">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-bold text-[#0A3323]">Laporkan Konten</h3>
                <button type="button" onclick="closeModal('modal-lapor-konten')" class="text-gray-400 hover:text-gray-700 text-xl">&times;</button>
            </div>
            <form onsubmit="handleReport(event, 'Laporan konten diterima dan akan ditinjau tim moderasi.')" class="space-y-3 text-sm">
                <div>
                    <label class="block font-medium mb-1">Alasan Pelaporan</label>
                    <select class="w-full px-3.5 py-2 rounded-xl border border-gray-200">
                        <option>Konten tidak pantas atau melanggar aturan komunitas</option>
                        <option>Informasi menyesatkan</option>
                        <option>Spam atau promosi tidak relevan</option>
                    </select>
                </div>
                <div>
                    <label class="block font-medium mb-1">Catatan Tambahan</label>
                    <textarea rows="3" placeholder="Jelaskan secara singkat alasan pelaporan..."
                        class="w-full px-3.5 py-2 rounded-xl border border-gray-200"></textarea>
                </div>
                <div class="flex justify-end gap-2 pt-2">
                    <button type="button" onclick="closeModal('modal-lapor-konten')" class="px-4 py-2 rounded-xl border text-gray-600">Batal</button>
                    <button type="submit" class="px-4 py-2 rounded-xl bg-[#D3968C] text-[#0A3323] font-semibold">Kirim Laporan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Laporkan Kejadian -->
    <div id="modal-lapor-kejadian" class="fixed inset-0 bg-black/50 hidden items-center justify-center p-4 z-50">
        <div class="bg-white rounded-2xl max-w-md w-full p-6 space-y-4 shadow-xl">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-bold text-[#0A3323]">Laporkan Kejadian</h3>
                <button type="button" onclick="closeModal('modal-lapor-kejadian')" class="text-gray-400 hover:text-gray-700 text-xl">&times;</button>
            </div>
            <form onsubmit="handleReport(event, 'Laporan kejadian telah dicatat. Jika berada dalam bahaya langsung, segera hubungi layanan darurat terdekat.')" class="space-y-3 text-sm">
                <div>
                    <label class="block font-medium mb-1">Waktu / Lokasi Kejadian</label>
                    <input type="text" required placeholder="Contoh: Hari ini, area kampus / transportasi umum"
                        class="w-full px-3.5 py-2 rounded-xl border border-gray-200">
                </div>
                <div>
                    <label class="block font-medium mb-1">Kronologi Singkat</label>
                    <textarea rows="3" required placeholder="Ceritakan kejadian yang ingin kamu laporkan..."
                        class="w-full px-3.5 py-2 rounded-xl border border-gray-200"></textarea>
                </div>
                <div class="flex justify-end gap-2 pt-2">
                    <button type="button" onclick="closeModal('modal-lapor-kejadian')" class="px-4 py-2 rounded-xl border text-gray-600">Batal</button>
                    <button type="submit" class="px-4 py-2 rounded-xl bg-[#0A3323] text-white font-semibold">Kirim Laporan Kejadian</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const currentUserName = @json(Auth::user()->name ?? 'Pengguna');

        let posts = [
            {
                id: 1,
                author: currentUserName,
                isMine: true,
                title: 'Cerita Awal Menemukan Ruang Dukungan',
                category: 'Dukungan & Cerita',
                time: 'Baru saja',
                visibility: 'Publik',
                content: 'Ruang aman untuk berbagi pengalaman, saling menguatkan, dan berdiskusi secara positif di komunitas RuangPuan.',
                likes: 4,
                liked: false,
                comments: ['Semangat terus ya, terima kasih sudah berbagi!'],
                showComments: false
            },
            {
                id: 2,
                author: 'Komunitas RuangPuan',
                isMine: false,
                title: 'Panduan Singkat Menjaga Keamanan Digital & Ruang Publik',
                category: 'Keamanan',
                time: '1 jam lalu',
                visibility: 'Publik',
                content: 'Selalu periksa pengaturan privasi akun, simpan kontak tepercaya, dan jangan ragu memanfaatkan fitur pelaporan bila menemukan hal yang tidak nyaman.',
                likes: 9,
                liked: false,
                comments: [],
                showComments: false
            }
        ];

        let activeCategory = 'Semua';
        let onlyMyPosts = false;

        function switchSection(mode) {
            onlyMyPosts = (mode === 'postingan-saya');
            document.getElementById('feed-heading').textContent = onlyMyPosts ? 'Postingan Saya' : 'Beranda Komunitas';

            if (mode === 'bantuan') {
                document.getElementById('section-bantuan').scrollIntoView({ behavior: 'smooth' });
            } else {
                document.getElementById('section-beranda').scrollIntoView({ behavior: 'smooth' });
            }

            document.querySelectorAll('.nav-item').forEach(btn => {
                const isActive = btn.dataset.nav === mode;
                btn.classList.toggle('bg-[#839958]', isActive);
                btn.classList.toggle('text-white', isActive);
                btn.classList.toggle('font-semibold', isActive);
            });

            renderPosts();
        }

        function setCategory(cat) {
            activeCategory = cat;
            document.querySelectorAll('.cat-btn').forEach(btn => {
                const selected = btn.dataset.cat === cat;
                btn.classList.toggle('bg-[#0A3323]', selected);
                btn.classList.toggle('text-white', selected);
                btn.classList.toggle('bg-[#F7F4D5]', !selected);
                btn.classList.toggle('text-[#0A3323]', !selected);
            });
            renderPosts();
        }

        function toggleLike(id) {
            const post = posts.find(p => p.id === id);
            if (!post) return;
            post.liked = !post.liked;
            post.likes += post.liked ? 1 : -1;
            renderPosts();
        }

        function toggleComments(id) {
            const post = posts.find(p => p.id === id);
            if (!post) return;
            post.showComments = !post.showComments;
            renderPosts();
        }

        function addComment(event, id) {
            event.preventDefault();
            const input = document.getElementById(`comment-input-${id}`);
            const text = input.value.trim();
            if (!text) return;

            const post = posts.find(p => p.id === id);
            if (!post) return;
            post.comments.push(`${currentUserName}: ${text}`);
            post.showComments = true;
            input.value = '';
            renderPosts();
            showToast('Komentar berhasil ditambahkan.');
        }

        function deletePost(id) {
            posts = posts.filter(p => p.id !== id);
            renderPosts();
            showToast('Postingan dihapus dari tampilan saat ini.');
        }

        function handleCreatePost(event) {
            event.preventDefault();
            const title = document.getElementById('post-title').value.trim();
            const category = document.getElementById('post-category').value;
            const body = document.getElementById('post-body').value.trim();
            if (!title || !body) return;

            posts.unshift({
                id: Date.now(),
                author: currentUserName,
                isMine: true,
                title,
                category,
                time: 'Baru saja',
                visibility: 'Publik',
                content: body,
                likes: 0,
                liked: false,
                comments: [],
                showComments: false
            });

            event.target.reset();
            closeModal('modal-postingan');
            renderPosts();
            showToast('Postingan baru berhasil ditambahkan ke beranda.');
        }

        function handleReport(event, message) {
            event.preventDefault();
            event.target.reset();
            closeModal('modal-lapor-konten');
            closeModal('modal-lapor-kejadian');
            showToast(message);
        }

        function openModal(id) {
            const el = document.getElementById(id);
            el.classList.remove('hidden');
            el.classList.add('flex');
        }

        function closeModal(id) {
            const el = document.getElementById(id);
            el.classList.add('hidden');
            el.classList.remove('flex');
        }

        function showToast(msg) {
            const banner = document.getElementById('toast-banner');
            document.getElementById('toast-message').textContent = msg;
            banner.classList.remove('hidden');
        }

        function hideToast() {
            document.getElementById('toast-banner').classList.add('hidden');
        }

        function updateStats() {
            document.getElementById('stat-total-post').textContent = posts.length;
            document.getElementById('stat-my-post').textContent = posts.filter(p => p.isMine).length;
        }

        function renderPosts() {
            const query = (document.getElementById('search-input')?.value || '').toLowerCase().trim();
            const filtered = posts.filter(post => {
                const matchMine = !onlyMyPosts || post.isMine;
                const matchCat = activeCategory === 'Semua' || post.category === activeCategory;
                const matchSearch = !query ||
                    post.title.toLowerCase().includes(query) ||
                    post.content.toLowerCase().includes(query) ||
                    post.category.toLowerCase().includes(query);
                return matchMine && matchCat && matchSearch;
            });

            const container = document.getElementById('posts-container');
            document.getElementById('feed-count').textContent = `${filtered.length} postingan ditampilkan`;
            updateStats();

            if (filtered.length === 0) {
                container.innerHTML = `
                    <div class="bg-white p-8 rounded-2xl text-center text-sm text-gray-500 shadow-sm">
                        Belum ada postingan yang sesuai dengan filter atau kata kunci saat ini.
                    </div>`;
                return;
            }

            container.innerHTML = filtered.map(post => `
                <article class="bg-white p-6 rounded-2xl shadow-sm border-t-4 border-[#839958] space-y-4">
                    <div class="flex items-start justify-between gap-3">
                        <div>
                            <h4 class="font-bold text-[#0A3323] text-base">${post.title}</h4>
                            <p class="text-xs text-gray-500 mt-0.5">
                                Oleh <span class="font-medium text-[#0A3323]">${post.author}</span> • Kategori: ${post.category} • ${post.time}
                            </p>
                        </div>
                        <span class="text-xs bg-[#F7F4D5] text-[#0A3323] px-3 py-1 rounded-full font-medium shrink-0">
                            ${post.visibility}
                        </span>
                    </div>

                    <p class="text-sm text-gray-700 leading-relaxed">${post.content}</p>

                    <div class="flex flex-wrap items-center justify-between pt-3 border-t border-gray-100 text-sm gap-2">
                        <div class="flex items-center gap-4">
                            <button type="button" onclick="toggleLike(${post.id})"
                                class="${post.liked ? 'text-red-600' : 'text-[#839958] hover:text-[#0A3323]'} font-semibold transition">
                                ${post.liked ? '♥' : '♡'} Like (${post.likes})
                            </button>
                            <button type="button" onclick="toggleComments(${post.id})"
                                class="text-[#0A3323] hover:text-[#839958] font-semibold transition">
                                💬 Komentar (${post.comments.length})
                            </button>
                        </div>

                        <div class="flex items-center gap-3 text-xs">
                            ${post.isMine ? `
                                <button type="button" onclick="deletePost(${post.id})" class="text-gray-600 hover:text-red-600">
                                    Hapus
                                </button>
                            ` : ''}
                            <button type="button" onclick="openModal('modal-lapor-konten')" class="text-[#D3968C] hover:underline font-semibold">
                                Laporkan Konten
                            </button>
                        </div>
                    </div>

                    ${post.showComments ? `
                        <div class="bg-[#F7F4D5]/60 rounded-xl p-4 space-y-3">
                            <div class="space-y-1.5 text-xs text-gray-700">
                                ${post.comments.length > 0
                                    ? post.comments.map(c => `<p class="bg-white px-3 py-2 rounded-lg">${c}</p>`).join('')
                                    : `<p class="text-gray-500">Belum ada komentar. Jadilah yang pertama memberi dukungan.</p>`
                                }
                            </div>
                            <form onsubmit="addComment(event, ${post.id})" class="flex gap-2">
                                <input type="text" id="comment-input-${post.id}" required placeholder="Tulis komentar dukungan..."
                                    class="flex-1 px-3 py-1.5 text-xs rounded-lg border border-gray-200 bg-white focus:outline-none focus:border-[#839958]">
                                <button type="submit" class="px-3 py-1.5 rounded-lg bg-[#839958] text-white text-xs font-semibold hover:bg-[#0A3323] transition">
                                    Kirim
                                </button>
                            </form>
                        </div>
                    ` : ''}
                </article>
            `).join('');
        }

        renderPosts();
    </script>
</body>
</html>