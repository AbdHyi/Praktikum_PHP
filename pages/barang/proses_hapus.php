<?php
require __DIR__ . '/../../Pertemuan4_koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['_method'] === 'DELETE') {
    $id  = (int)$_POST['id'];
    $sql = "DELETE FROM barang WHERE id = ?";
    $pdo->prepare($sql)->execute([$id]);

    echo "<meta http-equiv='refresh' content='0;url=?page=barang&pesan=" . urlencode("berhasil dihapus") . "' />";
    exit();
}
