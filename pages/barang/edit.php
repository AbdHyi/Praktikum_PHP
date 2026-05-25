<?php
require __DIR__ . '/../../Pertemuan4_koneksi.php';
$id = (int)$_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM barang WHERE id = ?");
$stmt->execute([$id]);
$barang = $stmt->fetch();

if (!$barang) die("Data tidak ditemukan!");

$stmt_kategori = $pdo->query("SELECT * FROM kategori");
?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Barang</h1>

    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow">
                <div class="card-header py-3 bg-warning">
                    <h6 class="m-0 font-weight-bold text-white">
                        <i class="fas fa-edit mr-1"></i> Form Edit Barang
                    </h6>
                </div>
                <div class="card-body">
                    <!-- Pesan Error Validasi -->
                    <?php if (isset($_GET['error'])): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle mr-1"></i>
                            <?= htmlspecialchars($_GET['error']); ?>
                            <button type="button" class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <form action="?page=barangeditproses" method="POST">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="id" value="<?= $barang['id']; ?>">

                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control"
                                value="<?= htmlspecialchars($barang['nama_barang']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Harga (Rp)</label>
                            <input type="number" name="harga" class="form-control"
                                value="<?= $barang['harga']; ?>" min="0" required>
                        </div>
                        <div class="form-group">
                            <label>Stok</label>
                            <input type="number" name="stok" class="form-control"
                                value="<?= $barang['stok']; ?>" min="0" required>
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="kategori_id" class="form-control" required>
                                <option value="">-- Pilih Kategori --</option>
                                <?php while ($kat = $stmt_kategori->fetch()): ?>
                                    <option value="<?= $kat['id']; ?>"
                                        <?php if ($kat['id'] == $barang['kategori_id']) echo 'selected'; ?>>
                                        <?= htmlspecialchars($kat['nama_kategori']); ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-sync-alt mr-1"></i> Update Data
                        </button>
                        <a href="?page=barang" class="btn btn-secondary ml-2">
                            <i class="fas fa-arrow-left mr-1"></i> Kembali
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
