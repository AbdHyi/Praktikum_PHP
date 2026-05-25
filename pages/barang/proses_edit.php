<?php
require __DIR__ . '/../../Pertemuan4_koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['_method'] === 'PUT') {
    $id        = (int)$_POST['id'];
    $nama      = $_POST['nama_barang'];
    $harga     = (int)$_POST['harga'];
    $stok      = (int)$_POST['stok'];
    $kategori  = (int)$_POST['kategori_id'];

    // Validasi: harga tidak boleh di bawah 0
    if ($harga < 0) {
        // Redirect kembali ke halaman edit (via routing)
        $msg = urlencode("Harga tidak boleh di bawah 0!");
        echo "<meta http-equiv='refresh' content='0;url=?page=barangedit&id=$id&error=$msg' />";
        exit();
    }

    $sql = "UPDATE barang SET nama_barang = ?, harga = ?, stok = ?, kategori_id = ? WHERE id = ?";
    $pdo->prepare($sql)->execute([$nama, $harga, $stok, $kategori, $id]);

    echo "<meta http-equiv='refresh' content='0;url=?page=barang&pesan=" . urlencode("berhasil diupdate") . "' />";
    exit();
}
