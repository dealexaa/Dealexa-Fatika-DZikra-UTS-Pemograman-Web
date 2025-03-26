<!DOCTYPE html>
<html>
<head>
    <title>Laporan Stok</title>
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
            width: 60%;
            margin: 50px auto;
            text-align: left;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        .button-container {
            margin-top: 20px;
            text-align: left;
        }
        .button-container button {
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            font-size: 14px;
            border-radius: 5px;
        }
        .button-container button:hover {
            background-color: #218838;
        }
        #formTambah {
            display: none;
            margin-top: 20px;
            padding: 15px;
            background: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
        }
        input {
            width: 96%;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            font-size: 14px;
            border-radius: 5px;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
        }
        .back-link a {
            text-decoration: none;
            color: #007bff;
        }
        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Laporan Stok Barang</h2>

        <div class="button-container">
            <button onclick="document.getElementById('formTambah').style.display='block'">+ Tambah Produk</button>
        </div>

        <table>
            <tr>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
            </tr>
            <?php
            $file = 'produk.txt';
            if (file_exists($file) && filesize($file) > 0) {
                $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                foreach ($lines as $line) {
                    list($nama, $harga, $stok) = explode("|", $line);
                    echo "<tr>
                        <td>$nama</td>
                        <td>Rp " . number_format($harga, 0, ',', '.') . "</td>
                        <td>$stok</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='3' style='text-align: center;'>Belum ada produk.</td></tr>";
            }
            ?>
        </table>

        <div id="formTambah">
            <h3>Tambah Produk</h3>
            <form method="POST">
                <input type="text" name="nama" placeholder="Nama Produk" required><br>
                <input type="number" name="harga" placeholder="Harga" required><br>
                <input type="number" name="stok" placeholder="Stok" required><br>
                <button type="submit">Simpan Produk</button>
            </form>
        </div>

        <div class="back-link">
            <a href="index.php">Kembali ke Menu</a>
        </div>
    </div>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $produk = $_POST['nama'] . "|" . $_POST['harga'] . "|" . $_POST['stok'] . "\n";
        file_put_contents($file, $produk, FILE_APPEND);
        echo "<script>alert('Produk berhasil ditambahkan!'); window.location='laporan_stok.php';</script>";
    }
    ?>
</body>
</html>
