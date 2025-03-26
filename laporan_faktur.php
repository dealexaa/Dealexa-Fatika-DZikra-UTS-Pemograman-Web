<!DOCTYPE html>
<html>
<head>
    <title>Laporan Faktur</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Laporan Faktur</h2>
        <table>
            <tr>
                <th>Tanggal</th>
                <th>Nama Pelanggan</th>
                <th>Produk</th>
                <th>Harga</th>
            </tr>
            <?php
            $file = 'transaksi.txt';
            if (!file_exists($file) || filesize($file) == 0) {
                echo "<tr><td colspan='4'>Belum ada transaksi.</td></tr>";
            } else {
                $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                foreach ($lines as $line) {
                    list($tanggal, $pelanggan, $produk, $harga) = explode("|", $line);
                    echo "<tr>
                        <td>$tanggal</td>
                        <td>$pelanggan</td>
                        <td>$produk</td>
                        <td>$harga</td>
                    </tr>";
                }
            }
            ?>
        </table>
        <br>
        <a href="index.php">Kembali ke Menu</a>
    </div>
</body>
</html>
