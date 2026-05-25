<?php
require __DIR__ . '/../../Pertemuan4_koneksi.php';
$kategori = $pdo->query("SELECT id, nama_kategori FROM kategori")->fetchAll();
?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Barang</h1>

    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow">
                <div class="card-header py-3 bg-primary">
                    <h6 class="m-0 font-weight-bold text-white">
                        <i class="fas fa-plus-circle mr-1"></i> Form Tambah Barang
                    </h6>
                </div>
                <div class="card-body">
                    <form action="?page=barangtambahproses" method="POST">
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Harga (Rp)</label>
                            <input type="number" name="harga" class="form-control" min="0" required>
                        </div>
                        <div class="form-group">
                            <label>Stok</label>
                            <input type="number" name="stok" class="form-control" min="0" required>
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="kategori_id" class="form-control" required>
                                <option value="" disabled selected>-- Pilih Kategori --</option>
                                <?php foreach ($kategori as $k): ?>
                                    <option value="<?= $k['id'] ?>">
                                        <?= htmlspecialchars($k['nama_kategori']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save mr-1"></i> Simpan Data
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
