<!DOCTYPE html>
<html>
<head>
    <title>Rekap Penjualan</title>
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
            width: 80%;
            margin: 50px auto;
        }
        h2 {
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
        <h2>Rekapitulasi Penjualan</h2>

        <?php
        $file = 'transaksi.txt';
        if (!file_exists($file) || filesize($file) == 0) {
            echo "<p><b>Belum ada transaksi.</b></p>";
        } else {
            $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            $rekap_harian = [];
            $rekap_bulanan = [];
            $rekap_tahunan = [];

            foreach ($lines as $line) {
                list($tanggal, $produk, $jumlah, $total_harga) = explode("|", $line);
                $tanggal_format = date("Y-m-d", strtotime($tanggal));
                $bulan_format = date("Y-m", strtotime($tanggal));
                $tahun_format = date("Y", strtotime($tanggal));

                // Rekap per hari
                if (!isset($rekap_harian[$tanggal_format])) {
                    $rekap_harian[$tanggal_format] = 0;
                }
                $rekap_harian[$tanggal_format] += $total_harga;

                // Rekap per bulan
                if (!isset($rekap_bulanan[$bulan_format])) {
                    $rekap_bulanan[$bulan_format] = 0;
                }
                $rekap_bulanan[$bulan_format] += $total_harga;

                // Rekap per tahun
                if (!isset($rekap_tahunan[$tahun_format])) {
                    $rekap_tahunan[$tahun_format] = 0;
                }
                $rekap_tahunan[$tahun_format] += $total_harga;
            }

            // Tampilkan Rekap Harian
            echo "<h3>Rekap Penjualan Harian</h3>";
            echo "<table>
                    <tr><th>Tanggal</th><th>Total Penjualan</th></tr>";
            foreach ($rekap_harian as $tanggal => $total) {
                echo "<tr><td>$tanggal</td><td>Rp " . number_format($total, 0, ',', '.') . "</td></tr>";
            }
            echo "</table><br>";

            // Tampilkan Rekap Bulanan
            echo "<h3>Rekap Penjualan Bulanan</h3>";
            echo "<table>
                    <tr><th>Bulan</th><th>Total Penjualan</th></tr>";
            foreach ($rekap_bulanan as $bulan => $total) {
                echo "<tr><td>$bulan</td><td>Rp " . number_format($total, 0, ',', '.') . "</td></tr>";
            }
            echo "</table><br>";

            // Tampilkan Rekap Tahunan
            echo "<h3>Rekap Penjualan Tahunan</h3>";
            echo "<table>
                    <tr><th>Tahun</th><th>Total Penjualan</th></tr>";
            foreach ($rekap_tahunan as $tahun => $total) {
                echo "<tr><td>$tahun</td><td>Rp " . number_format($total, 0, ',', '.') . "</td></tr>";
            }
            echo "</table><br>";
        }
        ?>

        <div class="back-link">
            <a href="index.php">Kembali ke Menu</a>
        </div>
    </div>
</body>
</html>
