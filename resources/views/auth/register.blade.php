
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - RuangPuan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F7F4D5] min-h-screen flex items-center justify-center p-4">

    <div class="bg-white w-full max-w-md rounded-2xl shadow-lg p-8">

        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-[#0A3323]">RuangPuan</h1>
            <p class="text-gray-500 mt-2">Buat akun untuk bergabung bersama kami</p>
        </div>

        @if (session('success'))
            <div class="bg-[#839958]/20 border border-[#839958] text-[#0A3323] p-3 rounded-lg mb-4 text-sm">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded-lg mb-4">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('register.post') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-[#0A3323] font-semibold mb-2">
                    Nama Lengkap
                </label>
                <input type="text" name="nama" value="{{ old('nama') }}"
                    placeholder="Masukkan nama lengkap"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#839958]"
                    required>
            </div>

            <div class="mb-4">
                <label class="block text-[#0A3323] font-semibold mb-2">
                    Email
                </label>
                <input type="email" name="email" value="{{ old('email') }}"
                    placeholder="Masukkan email"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#839958]"
                    required>
            </div>

            <div class="mb-4">
                <label class="block text-[#0A3323] font-semibold mb-2">
                    Kata Sandi
                </label>
                <input type="password" name="password"
                    placeholder="Minimal 8 karakter"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#839958]"
                    required>
            </div>

            <div class="mb-6">
                <label class="block text-[#0A3323] font-semibold mb-2">
                    Konfirmasi Kata Sandi
                </label>
                <input type="password" name="password_confirmation"
                    placeholder="Masukkan ulang kata sandi"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#839958]"
                    required>
            </div>

            <button type="submit"
                class="w-full bg-[#0A3323] text-white font-semibold py-3 rounded-lg hover:bg-[#839958] transition">
                Daftar Sekarang
            </button>
        </form>

        <p class="text-center text-gray-600 mt-6">
            Sudah punya akun?
            <a href="{{ route('login') }}"
                class="text-[#839958] font-semibold hover:underline">
                Login
            </a>
        </p>

        <p class="text-center text-sm mt-4">
            <a href="{{ route('home') }}"
                class="text-gray-500 hover:underline">
                ← Kembali ke Beranda
            </a>
        </p>

    </div>

</body>
</html>
