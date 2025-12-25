<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'MedStore' }}</title>

    {{-- JQuery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    {{-- Font Nexa --}}
    <link href="https://fonts.cdnfonts.com/css/nexa-bold" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    {{-- Tailwind --}}
    @vite('resources/css/app.css')

    {{-- Java Script --}}
    @vite('resources/js/app.js')
</head>

<body class="font-sans">

    {{-- TOP BAR --}}
    <div class="bg-[#018790] text-white text-[14px] py-2">
        <div class="w-[90%] mx-auto flex items-center justify-between">
            <span>
                <i class="fa fa-phone mr-1"></i>
                0812-2233-4455 | support@medstore.com
            </span>
            <span>Tentang Kami</span>
        </div>
    </div>

    {{-- NAVBAR --}}
    <nav class="bg-[#005461] py-4">
        <div class="w-[90%] mx-auto flex items-center justify-between">

            {{-- LOGO --}}
            <div class="flex items-center gap-3">
                <x-logo class="w-[50px] h-[50px]" />
                <span class="text-white text-[50px] font-extrabold leading-none tracking-[0.4px]
                            [text-shadow:-1px_-1px_0_#00B7B5,1px_-1px_0_#00B7B5,-1px_1px_0_#00B7B5,1px_1px_0_#00B7B5]">
                    MedStore
                </span>
            </div>

            {{-- SEARCH --}}
            <div class="relative ml-4">
                                <form action="/" method="GET" onsubmit="return false;">
                                    <input 
                                        type="text" 
                                        id="keyword"
                                        name="search"
                                        class="rounded-md bg-gray-700 text-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-white"
                                        placeholder="Cari obat..."
                                        autocomplete="off"
                                    >
                                </form>
                            </div>
            {{-- NAV RIGHT --}}
            <div class="flex items-center text-white">
               

                @auth
                 <i class="fa fa-cart-shopping text-[22px] mr-5"></i>
                <div class="h-7 w-px bg-white/50 mr-5"></div>
                    <div class="flex items-center gap-4">
                        <div class="text-right leading-tight hidden md:block">
                            <div class="font-bold text-[15px] truncate max-w-[150px] text-white">{{ Auth::user()->name }}</div>
                        </div>

                        <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center text-white border border-white/30">
                            <i class="fa fa-user"></i>
                        </div>
                        
                        <form action="{{ route('logout') }}" method="POST" class="m-0">
                            @csrf
                            <button type="submit" 
                                class="bg-red-500/80 hover:bg-red-600 text-white px-3 py-2 rounded-lg font-bold text-sm transition shadow-sm flex items-center gap-2 border border-red-400"
                                title="Keluar">
                                <i class="fa fa-sign-out-alt"></i> 
                            </button>
                        </form>
                    </div>

                @else
                    {{-- GUEST --}}
                    
                    <a href="{{ route('login.show') }}"
                       class="font-['Nexa'] text-[16px] md:text-[18px] font-semibold bg-white text-[#018790]
                              border border-[#018790] px-4 py-2 rounded-md mr-3
                              shadow-sm transition duration-200
                              hover:bg-[#e6f2f2] hover:shadow-md">
                        Masuk
                    </a>

                    <a href="{{ route('register.show') }}"
                       class="font-['Nexa'] text-[16px] md:text-[18px] font-semibold bg-[#018790] text-white
                              border border-white/30 px-4 py-2 rounded-md
                              shadow-sm transition duration-200
                              hover:bg-[#016f77] hover:shadow-md">
                        Daftar
                    </a>
                @endauth

        </div>
    </nav>

    {{-- CONTENT --}}
    <main class="min-h-[60vh] p-10">
        {{ $slot }}
    </main>

    {{-- FOOTER --}}
    <footer class="bg-[#005461] text-white py-6">
        <div class="w-[90%] mx-auto grid grid-cols-3 gap-8">

            {{-- FOOTER LEFT --}}
            <div>
                <div class="flex items-center gap-3 mb-3">
                    <x-logo class="w-[40px] h-[40px]" />
                    <span class="text-[22px] font-bold">MedStore</span>
                </div>

                <p class="mb-3">
                    Toko obat online terpercaya yang menyediakan berbagai kebutuhan
                    kesehatan Anda dengan layanan profesional dan terjamin.
                </p>

                <strong>Ikuti Kami</strong>
                <div class="mt-2 space-x-3 text-[18px]">
                    <i class="fab fa-facebook"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-x-twitter"></i>
                </div>
            </div>

            {{-- FOOTER MIDDLE --}}
            <div>
                <strong>MedStore</strong>
                <ul class="mt-3 space-y-2">
                    <li>Tentang Kami</li>
                    <li>Kritik dan Saran</li>
                    <li>Kebijakan Privasi</li>
                </ul>

                <div class="bg-[#018790] p-2 mt-3 text-[13px]">
                    Berizin resmi no izin 123/apotek/2025
                </div>
            </div>

            {{-- FOOTER RIGHT --}}
            <div>
                <strong>Hubungi Kami</strong>
                <p class="mt-2"><i class="fa fa-location-dot mr-1"></i> Jl. Setiabudi</p>
                <p class="mt-2"><i class="fa fa-envelope mr-1"></i> support@medstore.com</p>
                <p class="mt-2"><i class="fa fa-phone mr-1"></i> 0812-2233-4455</p>
            </div>

        </div>
    </footer>

    {{-- COPYRIGHT --}}
    <div class="bg-[#018790] text-white text-center py-2 text-[14px]">
        © 2025 MedStore. All rights reserved.
    </div>

</body>
</html>
