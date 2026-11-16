<?php
// katalog.php

// 1. Memanggil file koneksi secara absolut
require_once 'config/koneksi.php';

// 2. Menyiapkan Query SQL untuk mengambil seluruh data menu
$sql_menu = "SELECT id_menu, nama_menu, harga, kategori FROM menu ORDER BY id_menu DESC";
$result   = $conn->query($sql_menu);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Katalog Menu - Lapak Kuliner Nusantara</title>
    <style>
        /* Styling dasar tabel menggunakan CSS Internal untuk kemudahan praktikum */
        body { font-family: Arial, sans-serif; background-color: #f5f6fa; padding: 20px; }
        .tabel-menu { width: 100%; border-collapse: collapse; margin-top: 20px; background-color: white; }
        .tabel-menu th, .tabel-menu td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        .tabel-menu th { background-color: #e15f41; color: white; }
    </style>
</head>
<body>

    <h2>Katalog Menu Spesial Lapak Kuliner</h2>
    <p>Menampilkan data langsung dari basis data MySQL.</p>

    <table class="tabel-menu">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Menu</th>
                <th>Kategori</th>
                <th>Harga (Rp)</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // 3. Memeriksa apakah ada data di dalam tabel
            if ($result->num_rows > 0) {
                $nomor = 1;
                // 4. Melakukan perulangan (Looping) untuk mencetak setiap baris data (Row)
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $nomor++ . "</td>";
                    echo "<td><strong>" . htmlspecialchars($row["nama_menu"]) . "</strong></td>"; // Keamanan: Mencegah XSS
                    echo "<td>" . htmlspecialchars($row["kategori"]) . "</td>";
                    echo "<td>" . number_format($row["harga"], 0, ',', '.') . "</td>"; // Format Rupiah
                    echo "</tr>";
                }
            } else {
                // Jika tabel kosong
                echo "<tr><td colspan='4' style='text-align:center;'>Belum ada menu yang tersedia.</td></tr>";
            }
            
            // 5. Menutup koneksi (Best Practice untuk membebaskan resource memori server)
            $conn->close();
            ?>
        </tbody>
    </table>

</body>
</html>