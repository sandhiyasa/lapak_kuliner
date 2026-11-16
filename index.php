<?php
    // ==========================================
    // 1. Deklarasi Variabel Dasar PHP
    // ==========================================
    $nama_bisnis = "Lapak Kuliner Nusantara";
    $deskripsi = "Pusat Jajanan UMKM & Ekosistem Bisnis F&B";
    $tahun_sekarang = date("Y"); // Mengambil tahun otomatis dari server

    // ==========================================
    // 2. Deklarasi Variabel untuk Percabangan
    // ==========================================
    // Nilai ini bisa diubah menjadi "buka", "sibuk", atau "tutup"
    $status_operasional = "buka"; 

    // ==========================================
    // 3. Deklarasi Variabel untuk Perulangan
    // ==========================================
    $jumlah_mitra = 5;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Menampilkan nama bisnis secara dinamis pada tab browser -->
    <title><?php echo $nama_bisnis; ?> - Web Programming</title>
    
    <!-- Memisahkan gaya visual dengan memanggil CSS eksternal -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- Struktur HTML Semantik: Header -->
    <header class="header-utama">
        <div class="identitas-brand">
            <!-- Mengintegrasikan variabel PHP ke dalam elemen tag HTML -->
            <h1><?php echo $nama_bisnis; ?></h1>
            <p><?php echo $deskripsi; ?></p>
        </div>
        <nav class="navigasi">
            <a href="#">Beranda</a>
            <a href="#">Katalog Menu</a>
            <a href="#">Mitra UMKM</a>
        </nav>
    </header>

    <!-- Struktur HTML Semantik: Main -->
    <main class="konten-utama">
        <!-- Tombol untuk manipulasi warna via JavaScript -->
        <button id="btn-tema" style="background-color: #34495e; color: white; border: none; padding: 12px 24px; border-radius: 5px; cursor: pointer; margin-bottom: 20px;">
            Ubah Tema Warna Header
        </button>

        <section class="info-bisnis">
            <h2>Sistem Manajemen Pesanan Digital</h2>
            <p>Platform ini dirancang khusus untuk mendukung pemasaran digital dan efisiensi operasional bisnis UMKM kuliner di Bali.</p>
            
            <div class="status-toko">
                <h3>Status Operasional: 
                    <?php
                        // ==========================================
                        // Implementasi Percabangan IF - ELSE IF - ELSE
                        // ==========================================
                        // Mengevaluasi kondisi operasional bisnis
                        if ($status_operasional == "buka") {
                            echo '<span class="buka" style="color: #20bf6b;">Buka & Siap Melayani Pesanan</span>';
                        } elseif ($status_operasional == "sibuk") {
                            echo '<span style="color: #f39c12; font-weight: bold;">Pesanan Penuh (Harap Antre)</span>';
                        } else {
                            echo '<span class="tutup" style="color: #eb3b5a;">Tutup Sementara</span>';
                        }
                    ?>
                </h3>
            </div>

            <div class="daftar-mitra" style="margin-top: 20px; padding: 15px; background-color: #f1f2f6; border-left: 5px solid #3498db;">
                <h3>Daftar Mitra Jaringan Kami:</h3>
                <ul>
                    <?php
                        // ==========================================
                        // Implementasi Perulangan FOR
                        // ==========================================
                        // Menjalankan perulangan FOR mulai dari angka 1 hingga batas jumlah mitra
                        for ($i = 1; $i <= $jumlah_mitra; $i++) {
                            echo "<li>Mitra Lapak Kuliner Cabang Ke-" . $i . "</li>";
                        }
                    ?>
                </ul>
            </div>



            <!-- Latihan Kasus 1: Interaktivitas Tombol "Tambah ke Keranjang" -->
            <div class="card-menu" style="border: 1px solid #ccc; padding: 15px; width: 300px; border-radius: 8px; margin-top: 25px;">
                <h3 id="judul-menu">Ayam Betutu Spesial</h3>
                <p>Harga: Rp 85.000</p>
                <button id="btn-keranjang" style="padding: 10px; background-color: #e15f41; color: white; border: none; cursor: pointer;">Tambah ke Keranjang</button>
            </div>
            <div id="notifikasi" style="display: none; color: white; background-color: #20bf6b; padding: 10px; margin-top: 10px; width: 280px; border-radius: 5px;"></div>

            <!-- Latihan Kasus 2: Manajemen Daftar Pesanan Khusus (Metode To-Do List Dinamis) -->
            <div class="manajemen-pesanan" style="margin-top: 30px; padding: 15px; border: 1px dashed #e15f41;">
                <h3>Catatan Khusus Pelanggan</h3>
                <input type="text" id="input-catatan" placeholder="Ketik catatan di sini..." style="padding: 8px; width: 60%;">
                <button id="btn-tambah-catatan" style="padding: 8px; background-color: #2c3e50; color: white;">Catat</button>

                <!-- Kontainer kosong sebagai wadah daftar (List) -->
                <ul id="daftar-catatan" style="margin-top: 15px;"></ul>
            </div>
        </section>
    </main>

    <!-- Struktur HTML Semantik: Footer -->
    <footer class="footer-utama">
        <!-- Menyisipkan tahun dinamis ke dalam footer -->
        <p>&copy; <?php echo $tahun_sekarang; ?> <?php echo $nama_bisnis; ?>. Modul Praktikum Web Programming.</p>
    </footer>

    <!-- Skrip JavaScript Sisi Klien -->
    <script>
        // 1. Skrip untuk Tombol Persiapan WordPress (Menampilkan/Menyembunyikan Elemen)
        const tombol = document.getElementById('btn-interaktif');
        const pesan = document.getElementById('pesan-sistem');

        tombol.addEventListener('click', function() {
            if (pesan.classList.contains('pesan-tersembunyi')) {
                pesan.classList.remove('pesan-tersembunyi');
                pesan.classList.add('pesan-tampil');
                tombol.innerText = 'Sembunyikan Informasi';
            } else {
                pesan.classList.remove('pesan-tampil');
                pesan.classList.add('pesan-tersembunyi');
                tombol.innerText = 'Lihat Persiapan WordPress';
            }
        });

        // 2. Skrip untuk Tombol Tema (Mengubah Warna Elemen)
        const tombolTema = document.getElementById('btn-tema');
        const headerWeb = document.querySelector('.header-utama'); 

        tombolTema.addEventListener('click', function() {
            if (headerWeb.style.backgroundColor === 'rgb(44, 62, 80)') {
                headerWeb.style.backgroundColor = '#e15f41';
                tombolTema.innerText = 'Ubah Tema Warna Header';
            } else {
                headerWeb.style.backgroundColor = '#2c3e50'; 
                tombolTema.innerText = 'Kembalikan Warna Semula';
            }
        });
    </script>
    <!-- Menghubungkan file JavaScript eksternal untuk Latihan Kasus 1 & 2 -->
    <script src="assets/js/app.js"></script>
</body>
</html>