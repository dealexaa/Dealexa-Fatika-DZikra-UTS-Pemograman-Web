<!DOCTYPE html>
<html>
<head>
    <title>Menu Utama - Toko Kelontong</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 50%;
            margin: 50px auto;
        }
        h2 {
            color: #333;
        }
        .menu {
            list-style: none;
            padding: 0;
        }
        .menu li {
            margin: 15px 0;
        }
        .menu a {
            text-decoration: none;
            display: block;
            padding: 10px;
            background: #007bff;
            color: white;
            border-radius: 5px;
            font-size: 16px;
        }
        .menu a:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Selamat Datang di Toko Kelontong</h2>
        <ul class="menu">
        <li><a href="cari_produk.php">Cari Produk</a></li>
            <li><a href="laporan_stok.php">Stok Produk</a></li>
            <li><a href="laporan_pelanggan.php">Pelanggan</a></li>
            <li><a href="entri_transaksi.php">Entri Transaksi</a></li>
            <li><a href="laporan_faktur.php">Laporan Faktur</a></li>
            <li><a href="rekap_penjualan.php">Rekap Penjualan</a></li>
            
        </ul>
    </div>
</body>
</html>
