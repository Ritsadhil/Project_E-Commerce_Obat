<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'MedStore' }}</title>

    <!-- CSS Terpisah -->
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <!-- Font Awesome untuk Icon -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

    {{-- Top Bar --}}
    <div class="top-bar">
        <div class="container">
            <span><i class="fa fa-phone"></i> 0812-2233-4455 | support@medstore.com</span>
            <span class="right">Tentang Kami</span>
        </div>
    </div>

    {{-- Navbar --}}
    <nav class="navbar">
        <div class="container">
            {{-- LOGO --}}
            <div class="logo">
                <x-logo class="logo-icon" />
                <span class="logo-text">MedStore</span>
            </div>

            <div class="search">
                <input type="text" placeholder="Cari obat...">
            </div>

            <div class="nav-right">
                <i class="fa fa-cart-shopping"></i>
                <a href="#" class="btn">Masuk</a>
                <a href="#" class="btn">Register</a>
            </div>
        </div>
    </nav>

    {{-- Konten Halaman --}}
    <main class="content">
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <footer class="footer">
        <div class="container footer-grid">

            <div class="footer-left">
                <div class="logo footer-logo">
                    <x-logo class="logo-icon" />
                    <span class="logo-text">MedStore</span>
                </div>
                <p>
                    Toko obat online terpercaya yang menyediakan berbagai kebutuhan
                    kesehatan Anda dengan layanan profesional dan terjamin.
                </p>

                <strong>Ikuti Kami</strong>
                <div class="social">
                    <i class="fab fa-facebook"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-x-twitter"></i>
                </div>
            </div>

            <div class="footer-middle">
                <strong>Medstore</strong>
                <ul>
                    <li>Tentang Kami</li>
                    <li>Kritik dan Saran</li>
                    <li>Kebijakan Privasi</li>
                </ul>

                <div class="license">
                    Berizin resmi no izin 123/apotek/2025
                </div>
            </div>

            <div class="footer-right">
                <strong>Hubungi Kami</strong>
                <p><i class="fa fa-location-dot"></i> Jl. Setiabudi</p>
                <p><i class="fa fa-envelope"></i> support@medstore.com</p>
                <p><i class="fa fa-phone"></i> 0812-2233-4455</p>
            </div>

        </div>
    </footer>

    <div class="copyright">
        © 2025 MedStore. All rights reserved.
    </div>

</body>
</html>
