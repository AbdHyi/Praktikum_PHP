<?php
// Data Mahasiswa dalam bentuk Array Multidimensi (Array di dalam Array)
$siswa = [
    ["nama" => "Andi","nilai" => 85],
    ["nama" => "Budi","nilai" => 60],
    ["nama" => "Cici","nilai" => 95],
    ["nama" => "Dedi","nilai" => 40]
];

echo "<h2>Daftar Kelulusan Mahasiswa</h2>";
echo "<table border='1' cell padding='10' cellspacing='0'>";
echo "<tr><th>Nama</th><th>Nilai</th><th>Keterangan</th><tr>";

foreach ($siswa as $s) {
    // Logika Penentuan Lulus
    if ($s['nilai'] >= 70) {
        $keterangan = "LULUS";
        $warna = "green";
    } else {
        $keterangan = "GAGAL";
        $warna = "red";
    }

    echo "<tr>";
    echo "<td>" . $s['nama'] . "</td>";
    echo "<td>" . $s['nilai'] . "</td>";
    echo "<td style='color: $warna; font-weight: bold;'>$keterangan</td>";
    echo "</tr>";
}

echo "</table>";