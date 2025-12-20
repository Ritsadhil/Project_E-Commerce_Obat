<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MedStore</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f5f5;
        }

        /* ================= HERO ================= */
        .hero {
            width: 100%;
            background: #fff;
            padding: 50px 40px;
            border-radius: 0 0 20px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .hero-text {
            width: 50%;
        }

        .hero-text h1 {
            font-size: 44px;
            margin: 0;
            line-height: 1.2;
        }

        .hero-text p {
            margin: 20px 0;
            font-size: 16px;
            color: #444;
        }

        .btn-primary {
            background: #166b73;
            color: #fff;
            padding: 12px 20px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
        }

        .hero img {
            width: 330px;
            border-radius: 15px;
        }

        /* ================= PRODUCT SECTION ================= */
        .product-section {
            display: flex;
            gap: 25px;
            padding: 40px;
        }

        .product-card {
            background: #fff;
            border-radius: 15px;
            padding: 20px;
            width: 25%;
            text-align: center;
            box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.1);
        }

        .product-card img {
            width: 80%;
        }

        .product-card h3 {
            font-size: 18px;
            margin: 15px 0 5px;
        }

        .product-card p {
            color: #333;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .product-card button {
            padding: 10px 18px;
            width: 80%;
            background: #166b73;
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 14px;
            cursor: pointer;
        }

        .product-card button:hover {
            opacity: 0.9;
        }
    </style>
</head>

<body>
    <!-- NAVBAR -->
    <x-layout>
    <x-slot:title>Home</x-slot:title>
 

    <!-- HERO -->
    <div class="hero">
        <div class="hero-text">
            <h1>Your trusted<br>online pharmacy.</h1>
            <p>Temukan obat dan kebutuhan kesehatan lengkap dengan harga terbaik</p>
            <a href="#" class="btn-primary">Belanja Sekarang</a>
        </div>

        <img src="/public/img/DOC3.png" alt="Dokter">
    </div>

    <!-- PRODUCT SECTION -->
    <div class="product-section">

        <div class="product-card">
            <img src="/public/img/ANTANGIN.png" alt="Antangin">
            <h3>Antangin</h3>
            <p>Rp 4.000</p>
            <button>Tambah ke keranjang</button>
        </div>

        <div class="product-card">
            <img src="/public/img/CAVIPLEX.png" alt="Caviplex">
            <h3>Caviplex Tablet</h3>
            <p>Rp 10.000</p>
            <button>Tambah ke keranjang</button>
        </div>

        <div class="product-card">
            <img src="public/img/PARACETAMOL.png" alt="Paracetamol">
            <h3>Paracetamol 500mg</h3>
            <p>Rp 5.000</p>
            <button>Tambah ke keranjang</button>
        </div>

        <div class="product-card">
            <img src="public/img/BODREX.png" alt="Bodrex Extra">
            <h3>Bodrex Extra</h3>
            <p>Rp 5.000</p>
            <button>Tambah ke keranjang</button>
        </div>

    </div>
    </x-layout>
</body>
</html>
