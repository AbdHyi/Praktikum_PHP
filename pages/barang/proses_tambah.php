<?php
require __DIR__ . '/../../Pertemuan4_koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama     = $_POST['nama_barang'];
    $harga    = (int)$_POST['harga'];
    $stok     = (int)$_POST['stok'];
    $kategori = (int)$_POST['kategori_id'];

    $sql  = "INSERT INTO barang (nama_barang, harga, stok, kategori_id) VALUES (:nama, :harga, :stok, :kategori)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nama'     => $nama,
        ':harga'    => $harga,
        ':stok'     => $stok,
        ':kategori' => $kategori,
    ]);

    echo "<meta http-equiv='refresh' content='0;url=?page=barang&pesan=" . urlencode("berhasil ditambahkan") . "' />";
    exit();
}
