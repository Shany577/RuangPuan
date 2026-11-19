<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - RuangPuan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F7F4D5] text-[#0A3323] min-h-screen flex items-center justify-center font-sans p-4">

    <div class="bg-white w-full max-w-md p-8 rounded-2xl shadow-lg border-t-4 border-[#0A3323]">
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-[#0A3323]">RuangPuan</h1>
            <p class="text-sm text-gray-500 mt-1">Masuk ke akun Anda untuk melanjutkan</p>
        </div>

        @if ($errors->any())
            <div class="bg-[#D3968C]/20 border border-[#D3968C] text-[#0A3323] px-4 py-3 rounded-xl mb-4 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-semibold mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:border-[#839958]">
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">Kata Sandi</label>
                <input type="password" name="password" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:border-[#839958]">
            </div>

            <button type="submit"
                class="w-full bg-[#0A3323] hover:bg-[#839958] text-white font-semibold py-2.5 rounded-xl transition duration-300">
                Masuk
            </button>
        </form>

        <div class="mt-6 text-center">
            <a href="{{ route('home') }}" class="text-sm text-[#839958] hover:underline">
                &larr; Kembali ke Halaman Pengunjung
            </a>
        </div>
    </div>

</body>
</html>