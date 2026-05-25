<?php
require __DIR__ . '/../../Pertemuan4_koneksi.php';

$stmt = $pdo->query("SELECT barang.*, kategori.nama_kategori
                     FROM barang
                     JOIN kategori ON barang.kategori_id = kategori.id");
?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Data Barang Toko</h1>

    <!-- Flash Message (Bootstrap 4) -->
    <?php if (isset($_GET['pesan'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle mr-2"></i>
            Data telah <?= htmlspecialchars($_GET['pesan']); ?>!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <!-- Tombol Aksi -->
    <div class="mb-3 d-flex align-items-center">
        <a href="?page=barangtambah" class="btn btn-primary btn-sm mr-2">
            <i class="fas fa-plus fa-sm"></i> Tambah Barang
        </a>

        <!-- Form filter cetak PDF -->
        <form method="GET" action="pages/barang/cetak.php" target="_blank" class="d-inline-flex align-items-center">
            <?php $stmt_kat = $pdo->query("SELECT * FROM kategori"); ?>
            <select name="id_kategori" class="form-control form-control-sm mr-2" style="width:auto;">
                <option value="">-- Semua Kategori --</option>
                <?php while ($k = $stmt_kat->fetch()): ?>
                    <option value="<?= $k['id']; ?>">
                        <?= htmlspecialchars($k['nama_kategori']); ?>
                    </option>
                <?php endwhile; ?>
            </select>
            <button type="submit" class="btn btn-success btn-sm">
                <i class="fas fa-file-pdf fa-sm"></i> Cetak PDF
            </button>
        </form>
    </div>

    <!-- Tabel (Bootstrap 4) -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Barang</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Status Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($row = $stmt->fetch()):
                            $status_stok = $row['stok'] < 5
                                ? '<span class="badge badge-danger">Hampir Habis</span>'
                                : '<span class="badge badge-success">Tersedia</span>';
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= htmlspecialchars($row['nama_barang']); ?></td>
                            <td><?= htmlspecialchars($row['nama_kategori']); ?></td>
                            <td>Rp <?= number_format($row['harga'], 0, ',', '.'); ?></td>
                            <td><?= $row['stok']; ?></td>
                            <td><?= $status_stok; ?></td>
                            <td>
                                <a href="?page=barangedit&id=<?= $row['id']; ?>"
                                   class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="?page=baranghapus" method="POST"
                                      style="display:inline;"
                                      onsubmit="return confirm('Yakin hapus data ini?')">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
