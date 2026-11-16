<?php
// api_tambah_menu.php

// 1. Set Header API
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST"); // Membatasi hanya menerima metode POST

require_once 'config/koneksi.php';

// 2. Validasi input: Memeriksa apakah data dikirim melalui metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Menangkap data dari Form (Client-side)
    $nama_produk = isset($_POST['nama_produk']) ? $_POST['nama_produk'] : '';
    $harga       = isset($_POST['harga']) ? (int)$_POST['harga'] : 0;
    $kategori    = isset($_POST['kategori']) ? $_POST['kategori'] : '';

    // 3. Logika Validasi Sederhana
    if (empty($nama_produk) || $harga <= 0 || empty($kategori)) {
        // HTTP 400 Bad Request jika data tidak lengkap
        http_response_code(400);
        echo json_encode([
            "status" => 400,
            "pesan"  => "Gagal! Pastikan semua kolom (Nama, Harga, Kategori) telah diisi dengan benar."
        ]);
        exit();
    }

    // 4. Praktik Keamanan: Menggunakan Prepared Statement untuk mencegah SQL Injection
    $stmt = $conn->prepare("INSERT INTO tb_menu (nama_produk, harga, kategori) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $nama_produk, $harga, $kategori); // s = string, i = integer

    if ($stmt->execute()) {
        // HTTP 201 Created
        http_response_code(201);
        echo json_encode([
            "status" => 201,
            "pesan"  => "Sukses! Menu '$nama_produk' berhasil ditambahkan ke dalam katalog."
        ]);
    } else {
        http_response_code(500);
        echo json_encode([
            "status" => 500,
            "pesan"  => "Terjadi kesalahan pada server database."
        ]);
    }
    
    $stmt->close();
} else {
    // HTTP 405 Method Not Allowed jika diakses langsung lewat URL (GET)
    http_response_code(405);
    echo json_encode([
        "status" => 405,
        "pesan"  => "Metode request tidak diizinkan. Gunakan POST."
    ]);
}

$conn->close();
?>

