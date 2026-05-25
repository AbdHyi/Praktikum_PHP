<?php
require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../../Pertemuan4_koneksi.php';

use Spipu\Html2Pdf\Html2Pdf;

// Filter kategori (opsional via GET)
$id_kategori = isset($_GET['id_kategori']) && $_GET['id_kategori'] !== ''
               ? (int)$_GET['id_kategori'] : null;

if ($id_kategori) {
    $stmt_kat = $pdo->prepare("SELECT nama_kategori FROM kategori WHERE id = ?");
    $stmt_kat->execute([$id_kategori]);
    $nama_filter = $stmt_kat->fetchColumn();

    $stmt = $pdo->prepare("SELECT barang.*, kategori.nama_kategori
                FROM barang JOIN kategori ON barang.kategori_id = kategori.id
                WHERE barang.kategori_id = ?");
    $stmt->execute([$id_kategori]);
} else {
    $nama_filter = null;
    $stmt = $pdo->query("SELECT barang.*, kategori.nama_kategori
                FROM barang JOIN kategori ON barang.kategori_id = kategori.id");
}
$data = $stmt->fetchAll();

// Path gambar logo — sesuaikan nama folder proyek di htdocs!
$logo_path = realpath(__DIR__ . '/../../img/Kingdom_of_Science_logo.png');

ob_start();
?>
<style>
    h2 { text-align: center; color: #333; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th { background-color: #f2f2f2; }
    th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
    .harga { text-align: right; }
</style>

<page_footer>
    <table style="width:100%; border-top:1px solid #ccc; margin-top:5px;">
        <tr>
            <td style="text-align:left; font-size:9px; color:#666;">Laporan Inventaris Barang</td>
            <td style="text-align:right; font-size:9px; color:#666;">Halaman [[page_cu]] dari [[page_nb]]</td>
        </tr>
    </table>
</page_footer>

<!-- Header laporan -->
<table style="width:100%; margin-bottom:10px;">
    <tr>
        <td style="width:80px;">
            <?php if ($logo_path && file_exists($logo_path)): ?>
                <img src="<?= $logo_path ?>" style="width:70px; height:70px;" />
            <?php endif; ?>
        </td>
        <td style="text-align:center;">
            <h2 style="margin:0;">Laporan Inventaris Barang</h2>
            <p style="margin:4px 0 0 0; font-size:11px; color:#555;">
                Tanggal Cetak: <?= date('d-m-Y'); ?>
                <?php if ($nama_filter): ?>
                    &nbsp;|&nbsp; Kategori: <strong><?= htmlspecialchars($nama_filter); ?></strong>
                <?php endif; ?>
            </p>
        </td>
    </tr>
</table>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; foreach ($data as $row): ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= htmlspecialchars($row['nama_barang']); ?></td>
            <td><?= htmlspecialchars($row['nama_kategori']); ?></td>
            <td class="harga">Rp <?= number_format($row['harga'], 0, ',', '.'); ?></td>
            <td><?= $row['stok']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php
$html = ob_get_clean();

try {
    $html2pdf = new Html2Pdf('P', 'A4', 'en');
    $html2pdf->writeHTML($html);
    $html2pdf->output('Laporan_Barang.pdf');
} catch (Exception $e) {
    echo "Error PDF: " . $e->getMessage();
}
