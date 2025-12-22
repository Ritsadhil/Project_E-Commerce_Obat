<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MedStore</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="m-0 font-sans bg-gray-100">

    <!-- NAVBAR -->
    <!-- NAVBAR TOP BAR -->
<div class="bg-teal-600 text-white py-2 px-10 flex justify-between items-center text-sm">
    <!-- Kontak Info -->
    <div class="flex gap-6">
        <div class="flex items-center gap-2">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
            </svg>
            <span>0812-2233-4456</span>
        </div>
        <div class="flex items-center gap-2">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
            </svg>
            <span>support@medstore.com</span>
        </div>
    </div>
    
    <!-- Tentang MedStore -->
    <a href="#" class="hover:underline">Tentang MedStore</a>
</div>

<!-- NAVBAR MAIN -->
<div class="bg-teal-700 px-10 py-4 flex items-center justify-between text-white">
    <!-- Logo -->
     <svg width="60" height="60" viewBox="0 0 113 113" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M56.5 103.583C82.5041 103.583 103.583 82.5041 103.583 56.5C103.583 30.4959 82.5041 9.41667 56.5 9.41667C30.4959 9.41667 9.41666 30.4959 9.41666 56.5C9.41666 82.5041 30.4959 103.583 56.5 103.583Z" fill="#018790"/>
        <path d="M65.4458 84.75H47.5542C46.8049 84.75 46.0864 84.4524 45.5566 83.9226C45.0268 83.3928 44.7292 82.6743 44.7292 81.925V71.0959C44.7292 70.3466 44.4315 69.6281 43.9017 69.0983C43.372 68.5685 42.6534 68.2709 41.9042 68.2709H31.075C30.3258 68.2709 29.6072 67.9732 29.0774 67.4435C28.5476 66.9137 28.25 66.1951 28.25 65.4459V47.5542C28.25 46.805 28.5476 46.0864 29.0774 45.5566C29.6072 45.0268 30.3258 44.7292 31.075 44.7292H41.9042C42.6534 44.7292 43.372 44.4316 43.9017 43.9018C44.4315 43.372 44.7292 42.6534 44.7292 41.9042V31.075C44.7292 30.3258 45.0268 29.6073 45.5566 29.0775C46.0864 28.5477 46.8049 28.25 47.5542 28.25H65.4458C66.1951 28.25 66.9136 28.5477 67.4434 29.0775C67.9732 29.6073 68.2708 30.3258 68.2708 31.075V41.9042C68.2708 42.6534 68.5685 43.372 69.0983 43.9018C69.628 44.4316 70.3466 44.7292 71.0958 44.7292H81.925C82.6742 44.7292 83.3928 45.0268 83.9226 45.5566C84.4524 46.0864 84.75 46.805 84.75 47.5542V65.4459C84.75 66.1951 84.4524 66.9137 83.9226 67.4435C83.3928 67.9732 82.6742 68.2709 81.925 68.2709H71.0958C70.3466 68.2709 69.628 68.5685 69.0983 69.0983C68.5685 69.6281 68.2708 70.3466 68.2708 71.0959V81.925C68.2708 82.6743 67.9732 83.3928 67.4434 83.9226C66.9136 84.4524 66.1951 84.75 65.4458 84.75Z" fill="#F5F5F5" stroke="#018790" stroke-width="1.5"/>
    </svg>
    <span class="text-3xl font-bold tracking-wide" style="color: #018790; -webkit-text-stroke: 1px #00B7B5; font-family: 'Inter', sans-serif;">MedStore</span>

    <!-- Search Bar -->
    <div class="flex-1 flex justify-center mx-8">
        <input 
    type="text" 
    placeholder="Cari di MedStore" 
    class="w-2/3 px-4 py-2 rounded-lg border-none text-base bg-white text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-teal-500" 
    />
        
    </div>

    <!-- Keranjang & Buttons -->
    <div class="flex items-center gap-5">
        <!-- Icon Keranjang -->
        <a href="#" class="text-3xl hover:opacity-80">🛒</a>
        
        <!-- Button Masuk -->
        <a href="#" class="bg-white text-teal-700 px-6 py-2 rounded-lg font-bold hover:bg-gray-100 transition">
            Masuk
        </a>
        
        <!-- Button Daftar -->
        <a href="#" class="bg-[#018790] text-white px-6 py-2 rounded-lg font-bold hover:bg-[#016d75] transition">
            Daftar
        </a>
    </div>
</div>

    <!-- HERO -->   
      <div class="w-11/12 bg-linear-to-r from-white to-[#018790] px-10 py-12 rounded-bl-3xl rounded-br-3xl flex justify-between items-center mx-auto">
        <div class="w-1/2">
            <h1 class="text-5xl m-0 leading-tight font-['Roboto'] font-bold">Your trusted<br>online pharmacy.</h1>
            <p class="my-5 text-base text-gray-600 font-['Roboto']">Temukan obat dan kebutuhan kesehatan lengkap dengan harga terbaik</p>
            <a href="#" class="bg-teal-700 text-white px-5 py-3 rounded-lg no-underline font-bold">Belanja Sekarang</a>
        </div>

        <img src="{{ asset('img/DOC3.png') }}" alt="" class="w-80 rounded-xl">
    </div>
        

    <!-- PRODUCT SECTION -->
    <div class="flex gap-6 px-10 py-10">

        <div class="bg-white rounded-xl p-5 w-1/4 text-center shadow-lg">
            <img src="{{ asset('img/ANTANGIN.png') }}" alt="Antangin" class="w-4/5 mx-auto">
            <h3 class="text-lg my-4 font-['Roboto'] font-bold">Antangin</h3>
            <p class="text-gray-800 font-['Roboto'] font-bold mb-4">Rp 4.000</p>
            <button class="px-5 py-2 w-4/5 bg-teal-700 text-white border-none rounded-lg text-sm cursor-pointer hover:opacity-90 font-['Nexa'] font-black">Tambah ke keranjang</button>
        </div>

        <div class="bg-white rounded-xl p-5 w-1/4 text-center shadow-lg">
            <img src="{{ asset('img/CAVIPLEX.png') }}" alt="Caviplex" class="w-4/5 mx-auto">
            <h3 class="text-lg my-4 font-['Roboto'] font-bold">Caviplex Tablet</h3>
            <p class="text-gray-800 font-['Roboto'] font-bold mb-4">Rp 10.000</p>
            <button class="px-5 py-2 w-4/5 bg-teal-700 text-white border-none rounded-lg text-sm cursor-pointer hover:opacity-90 font-['Nexa'] font-black">Tambah ke keranjang</button>
        </div>

        <div class="bg-white rounded-xl p-5 w-1/4 text-center shadow-lg">
            <img src="{{ asset('img/PARACETAMOL.png') }}" alt="Paracetamol" class="w-4/5 mx-auto">
            <h3 class="text-lg my-4 font-['Roboto'] font-bold">Paracetamol 500mg</h3>
            <p class="text-gray-800 font-['Roboto'] font-bold mb-4">Rp 5.000</p>
            <button class="px-5 py-2 w-4/5 bg-teal-700 text-white border-none rounded-lg text-sm cursor-pointer hover:opacity-90 font-['Nexa'] font-black">Tambah ke keranjang</button>
        </div>

        <div class="bg-white rounded-xl p-5 w-1/4 text-center shadow-lg">
            <img src="{{ asset('img/BODREX.png') }}" alt="Bodrex Extra" class="w-4/5 mx-auto">
            <h3 class="text-lg my-4 font-['Roboto'] font-bold">Bodrex Extra</h3>
            <p class="text-gray-800 font-['Roboto'] font-bold mb-4">Rp 5.000</p>
            <button class="px-5 py-2 w-4/5 bg-teal-700 text-white border-none rounded-lg text-sm cursor-pointer hover:opacity-90 font-['Nexa'] font-black">Tambah ke keranjang</button>
        </div>

    </div>
</div>

    <!-- FOOTER -->
    <footer class="bg-teal-700 text-white mt-16" style="font-family: Arial, sans-serif;">
        <!-- Footer Main Content -->
        <div class="px-10 py-12 grid grid-cols-3 gap-12">
            
            <!-- Kolom Kiri: Logo + Deskripsi + Social Media -->
            <div>
                <!-- Logo + Text -->
                <div class="flex items-center gap-3 mb-6">
                    <svg width="60" height="60" viewBox="0 0 113 113" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M56.5 103.583C82.5041 103.583 103.583 82.5041 103.583 56.5C103.583 30.4959 82.5041 9.41667 56.5 9.41667C30.4959 9.41667 9.41666 30.4959 9.41666 56.5C9.41666 82.5041 30.4959 103.583 56.5 103.583Z" fill="#018790"/>
                        <path d="M65.4458 84.75H47.5542C46.8049 84.75 46.0864 84.4524 45.5566 83.9226C45.0268 83.3928 44.7292 82.6743 44.7292 81.925V71.0959C44.7292 70.3466 44.4315 69.6281 43.9017 69.0983C43.372 68.5685 42.6534 68.2709 41.9042 68.2709H31.075C30.3258 68.2709 29.6072 67.9732 29.0774 67.4435C28.5476 66.9137 28.25 66.1951 28.25 65.4459V47.5542C28.25 46.805 28.5476 46.0864 29.0774 45.5566C29.6072 45.0268 30.3258 44.7292 31.075 44.7292H41.9042C42.6534 44.7292 43.372 44.4316 43.9017 43.9018C44.4315 43.372 44.7292 42.6534 44.7292 41.9042V31.075C44.7292 30.3258 45.0268 29.6073 45.5566 29.0775C46.0864 28.5477 46.8049 28.25 47.5542 28.25H65.4458C66.1951 28.25 66.9136 28.5477 67.4434 29.0775C67.9732 29.6073 68.2708 30.3258 68.2708 31.075V41.9042C68.2708 42.6534 68.5685 43.372 69.0983 43.9018C69.628 44.4316 70.3466 44.7292 71.0958 44.7292H81.925C82.6742 44.7292 83.3928 45.0268 83.9226 45.5566C84.4524 46.0864 84.75 46.805 84.75 47.5542V65.4459C84.75 66.1951 84.4524 66.9137 83.9226 67.4435C83.3928 67.9732 82.6742 68.2709 81.925 68.2709H71.0958C70.3466 68.2709 69.628 68.5685 69.0983 69.0983C68.5685 69.6281 68.2708 70.3466 68.2708 71.0959V81.925C68.2708 82.6743 67.9732 83.3928 67.4434 83.9226C66.9136 84.4524 66.1951 84.75 65.4458 84.75Z" fill="#F5F5F5" stroke="#018790" stroke-width="1.5"/>
                    </svg>
                    <span class="text-3xl font-bold" style="font-family: 'Inter', sans-serif; color: #FFFFFF; -webkit-text-stroke: 1px #00B7B5;">MedStore</span>
                </div>

                <!-- Deskripsi -->
                <p class="text-sm leading-relaxed mb-6 text-gray-200">
                    Toko obat online terpercaya yang menyediakan berbagai kebutuhan kesehatan Anda dengan layanan profesional dan terjamin.
                </p>

                <!-- Social Media -->
                <div class="space-y-2">
                    <h3 class="font-bold text-base mb-3">Ikuti Kami</h3>
                    <div class="flex gap-3">
                        <!-- Facebook -->
                        <a href="#" class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center hover:opacity-80 transition">
                            <svg class="w-4 h-4" fill="white" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        
                        <!-- Instagram -->
                        <a href="#" class="w-8 h-8 bg-gradient-to-br from-purple-600 via-pink-600 to-orange-500 rounded-full flex items-center justify-center hover:opacity-80 transition">
                            <svg class="w-4 h-4" fill="white" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                        
                        <!-- X (Twitter) -->
                        <a href="#" class="w-8 h-8 bg-black rounded-full flex items-center justify-center hover:opacity-80 transition">
                            <svg class="w-4 h-4" fill="white" viewBox="0 0 24 24">
                                <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Kolom Tengah: Menu Links -->
            <div>
                <h3 class="font-bold text-xl mb-6">Medstore</h3>
                <ul class="space-y-3">
                    <li><a href="#" class="text-gray-200 hover:text-white transition">Tentang Kami</a></li>
                    <li><a href="#" class="text-gray-200 hover:text-white transition">Kritik dan Saran</a></li>
                    <li><a href="#" class="text-gray-200 hover:text-white transition">Kebijakan Privasi</a></li>
                </ul>
            </div>

            <!-- Kolom Kanan: Hubungi Kami -->
            <div>
                <h3 class="font-bold text-xl mb-6">Hubungi Kami</h3>
                <div class="space-y-4 text-sm text-gray-200">
                    <!-- Alamat -->
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                        </svg>
                        <span>Jl. Setiabudi, No. 128,<br>Kota Bandung</span>
                    </div>

                    <!-- Email -->
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                        </svg>
                        <a href="mailto:support@medstore.com" class="hover:underline">support@medstore.com</a>
                    </div>

                    <!-- Telepon -->
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                        </svg>
                        <a href="tel:08122233445" class="hover:underline">0812-2233-4456</a>
                    </div>

                    <!-- Box Berizin Resmi -->
                    <div class="bg-teal-600 rounded-lg p-4 mt-6">
                        <h4 class="font-bold text-base mb-2">Berizin Resmi</h4>
                        <p class="text-xs">No. Izin : 123/APOTEK/2025</p>
                    </div>
                </div>
            </div>

        </div>

        <!-- Copyright Bar -->
        <div class="bg-teal-800 py-4 text-center text-sm">
            <p>Copyright © 2025 by MedStore</p>
        </div>
    </footer>

</body>
</html>