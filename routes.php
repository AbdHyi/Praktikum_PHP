<?php
// Router sederhana — semua akses melalui index.php?page=xxx
$page = isset($_GET['page']) ? $_GET['page'] : '';

switch ($page) {
    case '':
    case 'dashboard':
        include 'pages/dashboard.php';
        break;

    // ===== BARANG =====
    case 'barang':
        include 'pages/barang/index.php';
        break;
    case 'barangtambah':
        include 'pages/barang/tambah.php';
        break;
    case 'barangtambahproses':
        include 'pages/barang/proses_tambah.php';
        break;
    case 'barangedit':
        include 'pages/barang/edit.php';
        break;
    case 'barangeditproses':
        include 'pages/barang/proses_edit.php';
        break;
    case 'baranghapus':
        include 'pages/barang/proses_hapus.php';
        break;

    // ===== KATEGORI (nanti dikembangkan) =====
    case 'kategori':
        // TODO: buat pages/kategori/index.php
        echo '<div class="container-fluid"><div class="alert alert-info"><i class="fas fa-info-circle mr-2"></i>Halaman Kategori belum dibuat.</div></div>';
        break;

    default:
        echo '<div class="container-fluid"><div class="alert alert-warning"><i class="fas fa-exclamation-triangle mr-2"></i>Halaman tidak ditemukan.</div></div>';
        break;
}
