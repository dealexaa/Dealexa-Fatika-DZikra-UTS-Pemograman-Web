<!DOCTYPE html>
<html>
<head>
    <title>Entri Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
            margin-top: 50px;
        }
        input, button {
            padding: 10px;
            margin: 5px;
            width: 80%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Entri Transaksi</h2>
        <form method="POST">
            <input type="text" name="produk" placeholder="Nama Produk" required><br>
            <input type="text" name="pelanggan" placeholder="Nama Pelanggan" required><br>
            <input type="number" name="harga" placeholder="Harga" required><br>
            <input type="date" name="tanggal" required><br>
            <button type="submit">Simpan Transaksi</button>
        </form>
        <br>
        <a href="index.php">Kembali ke Menu</a>
    </div>
    
    <?php
    $file = 'transaksi.txt';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $transaksi = $_POST['tanggal'] . "|" . $_POST['pelanggan'] . "|" . $_POST['produk'] . "|" . $_POST['harga'] . "\n";
        
        file_put_contents($file, $transaksi, FILE_APPEND);
        
        echo "<script>alert('Transaksi berhasil disimpan!'); window.location='entri_transaksi.php';</script>";
    }
    ?>
</body>
</html>
