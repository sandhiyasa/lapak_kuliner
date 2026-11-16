<?php
// config/koneksi.php

// 1. Deklarasi Kredensial Database (Sesuaikan dengan environment lokal XAMPP)
$host     = "127.0.0.1";
$user     = "root";
$password = ""; // Kosongkan jika menggunakan XAMPP Windows bawaan
$dbname   = "db_lapak_kuliner";

// 2. Instansiasi Objek Koneksi (Pendekatan OOP)
$conn = new mysqli($host, $user, $password, $dbname);

// 3. Error Handling & Keamanan Dasar
if ($conn->connect_error) {
    // Mencatat error di log server, BUKAN menampilkannya ke user
    error_log("Gagal koneksi database: " . $conn->connect_error);
    // Menghentikan eksekusi script dengan pesan yang aman
    die("Maaf, sistem Lapak Kuliner saat ini sedang dalam pemeliharaan.");
}

// 4. Standarisasi Karakter
$conn->set_charset("utf8mb4");
?>