<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedStore Register</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-screen flex items-center justify-center font-sans bg-cover bg-center bg-no-repeat bg-gray-100"
      style="background-image: url('{{ asset('img/log_bg.jpg') }}');">

    <div class="w-full max-w-md p-8 rounded-3xl shadow-2xl bg-[#00B7B5]">
        
        <div class="text-center mb-10">
            <h1 class="text-4xl font-bold text-white mb-2 font-judul">MedStore</h1>
            <h2 class="text-2xl font-bold text-white tracking-widest font-judul">REGISTER</h2>
        </div>

        <form action="#" method="POST" class="space-y-6">
            @csrf

            <div class="relative">
                <label for="nama" class="block text-white text-sm font-semibold mb-1">Nama</label>
                <input type="text" id="nama" name="nama"
                       class="w-full bg-transparent border-b border-white/50 text-white placeholder-white/70 py-2 focus:outline-none focus:border-white transition-colors"
                       placeholder="Masukkan nama..." 
                       required>
            </div>

            <div class="relative">
                <label for="email" class="block text-white text-sm font-semibold mb-1">Email address</label>
                <input type="email" id="email" name="email"
                       class="w-full bg-transparent border-b border-white/50 text-white placeholder-white/70 py-2 focus:outline-none focus:border-white transition-colors"
                       placeholder="Masukkan email..." 
                       required>
            </div>

            <div class="relative">
                <label for="password" class="block text-white text-sm font-semibold mb-1">Password</label>
                <input type="password" id="password" name="password" 
                       class="w-full bg-transparent border-b border-white/50 text-white placeholder-white/70 py-2 focus:outline-none focus:border-white transition-colors"
                       placeholder="Buat password..." 
                       required>
            </div>

            <div class="relative">
                <label for="password_confirmation" class="block text-white text-sm font-semibold mb-1">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" 
                       class="w-full bg-transparent border-b border-white/50 text-white placeholder-white/70 py-2 focus:outline-none focus:border-white transition-colors"
                       placeholder="Masukkan ulang password mu!" 
                       required>
            </div>

            <div class="pt-6">
                <button type="submit" 
                        class="w-full bg-[#018790] hover:bg-[#00796b] text-white font-bold py-3 px-4 rounded-full shadow-lg transition hover:scale-105 duration-300">
                    LOGIN
                </button>
            </div>
        </form>

        <div class="text-center mt-8">
            <p class="text-white text-sm">
                Sudah punya akun? 
                <a href="/login" class="text-purple-600 font-bold hover:text-purple-800 hover:underline">
                    Masuk Disini!
                </a>
            </p>
    </div>

</body>
</html>