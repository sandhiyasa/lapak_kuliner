<?php
// api_menu.php

// 1. Set Header API (wajib untuk Web API agar dikenali sebagai JSON, bukan HTML)
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *"); // Mengizinkan akses Cross-Origin (CORS)

// Memanggil file koneksi basis data yang telah dibuat pada pertemuan sebelumnya
require_once 'config/koneksi.php';

$query = "SELECT id, nama_produk, harga, kategori FROM tb_menu";
$result = $conn->query($query);

$response = array();

// 2. Logika Fetch Data
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // Mendorong setiap baris data MySQL ke dalam array PHP
        array_push($response, array(
            "id_menu" => $row['id'],
            "menu"    => $row['nama_produk'],
            "harga"   => (int)$row['harga'], // Data casting ke integer
            "jenis"   => $row['kategori']
        ));
    }
    // 3. Output JSON (Serialize)
    echo json_encode([
        "status" => 200,
        "pesan"  => "Data menu berhasil diambil",
        "data"   => $response
    ], JSON_PRETTY_PRINT);
} else {
    echo json_encode([
        "status" => 404,
        "pesan"  => "Katalog menu saat ini kosong."
    ]);
}
?>

