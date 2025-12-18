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

        /* ================= NAVBAR ================= */
        .navbar {
            background: #166b73;
            padding: 15px 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #fff;
        }

        .navbar-logo {
            display: flex;
            align-items: center;
            font-size: 28px;
            font-weight: bold;
        }

        .navbar-logo span.icon {
            background: #ffffff33;
            padding: 8px 12px;
            border-radius: 50%;
            margin-right: 10px;
            font-size: 22px;
        }

        .navbar-search {
            flex: 1;
            display: flex;
            justify-content: center;
        }

        .navbar-search input {
            width: 50%;
            padding: 10px 15px;
            border-radius: 10px;
            border: none;
            font-size: 15px;
        }

        .navbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .nav-btn {
            background: #fff;
            color: #166b73;
            padding: 8px 18px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
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
    <div class="navbar">
        <div class="navbar-logo">
            <span class="icon">+</span> MedStore
        </div>

        <div class="navbar-search">
            <input type="text" placeholder="Cari di MedStore" />
        </div>

        <div class="navbar-right">
            <div style="font-size: 26px; cursor: pointer;">🛒</div>
            <a href="#" class="nav-btn">Masuk</a>
            <a href="#" class="nav-btn">Daftar</a>
        </div>
    </div>

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

</body>
</html>