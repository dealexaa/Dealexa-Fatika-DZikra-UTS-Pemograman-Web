<!DOCTYPE html>
<html>
<head>
    <title>Cari Produk</title>
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
        form {
            margin-top: 20px;
        }
        input[type="text"] {
            width: 80%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 10px 15px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
        }
        .back-link a {
            text-decoration: none;
            color: #007bff;
            font-size: 16px;
        }
        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Cari Produk</h2>
        <form method="POST">
            <input type="text" name="keyword" placeholder="Masukkan nama produk..." required>
            <button type="submit">Cari</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $keyword = strtolower(trim($_POST['keyword']));
            $file = 'produk.txt';

            if (file_exists($file) && filesize($file) > 0) {
                $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                $hasil = [];

                foreach ($lines as $line) {
                    list($nama, $harga, $stok) = explode("|", $line);
                    if (strpos(strtolower($nama), $keyword) !== false) {
                        $hasil[] = [$nama, $harga, $stok];
                    }
                }

                if (count($hasil) > 0) {
                    echo "<h3>Hasil Pencarian:</h3>";
                    echo "<table>
                            <tr>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Stok</th>
                            </tr>";
                    foreach ($hasil as $produk) {
                        echo "<tr>
                                <td>{$produk[0]}</td>
                                <td>Rp " . number_format($produk[1], 0, ',', '.') . "</td>
                                <td>{$produk[2]}</td>
                            </tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p><b>Produk tidak ditemukan.</b></p>";
                }
            } else {
                echo "<p><b>Data produk belum tersedia.</b></p>";
            }
        }
        ?>

        <div class="back-link">
            <a href="index.php">Kembali ke Menu</a>
        </div>
    </div>
</body>
</html>
