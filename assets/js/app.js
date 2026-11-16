// ========================================================
// Latihan Kasus 1: Interaktivitas Tombol "Tambah ke Keranjang"
// ========================================================

// 1. DOM Selection (Menyeleksi elemen HTML)
const btnKeranjang = document.getElementById('btn-keranjang');
const notifikasi   = document.getElementById('notifikasi');
const judulMenu    = document.getElementById('judul-menu').innerText;

// 2. Event Handling
btnKeranjang.addEventListener('click', function() {
    // 3. Manipulasi Visual dan Teks DOM
    notifikasi.style.display = 'block';
    notifikasi.innerHTML = `<strong>Berhasil!</strong> ${judulMenu} masuk ke keranjang.`;

    // Memberikan umpan balik (feedback) pada tombol
    btnKeranjang.innerText = 'Sudah di Keranjang';
    btnKeranjang.disabled = true;
    btnKeranjang.style.backgroundColor = '#7f8c8d'; // Berubah abu-abu
});


// ========================================================
// Latihan Kasus 2: Manajemen Daftar Pesanan Khusus (To-Do List Dinamis)
// ========================================================

// 1. DOM Selection untuk Kasus 2
const inputCatatan = document.getElementById('input-catatan');
const btnTambahCatatan = document.getElementById('btn-tambah-catatan');
const daftarCatatan = document.getElementById('daftar-catatan');

// 2. Event Handling
btnTambahCatatan.addEventListener('click', function() {
    const teksCatatan = inputCatatan.value;

    // Validasi sederhana: Cegah input kosong
    if (teksCatatan.trim() === '') {
        alert('Catatan tidak boleh kosong!');
        return;
    }

    // 3. DOM Creation (Membuat elemen <li> baru)
    const elemenList = document.createElement('li');
    elemenList.style.marginBottom = '10px';
    elemenList.textContent = teksCatatan + ' ';

    // Membuat tombol interaktif "Selesai Dikerjakan" (Manipulasi Style)
    const btnSelesai = document.createElement('button');
    btnSelesai.textContent = 'Tandai Selesai';
    btnSelesai.style.marginLeft = '10px';
    btnSelesai.addEventListener('click', function() {
        elemenList.style.textDecoration = 'line-through'; // Efek coret teks
        elemenList.style.color = '#7f8c8d';
    });

    // Membuat tombol interaktif "Hapus" (Manipulasi Penghapusan Node)
    const btnHapus = document.createElement('button');
    btnHapus.textContent = 'Hapus';
    btnHapus.style.marginLeft = '5px';
    btnHapus.addEventListener('click', function() {
        elemenList.remove(); // Menghapus elemen dari layar
    });

    // 4. DOM Append (Menyisipkan tombol ke dalam <li>, dan <li> ke dalam <ul>)
    elemenList.appendChild(btnSelesai);
    elemenList.appendChild(btnHapus);
    daftarCatatan.appendChild(elemenList);

    // Mengosongkan kolom input setelah berhasil ditambah
    inputCatatan.value = '';
});

