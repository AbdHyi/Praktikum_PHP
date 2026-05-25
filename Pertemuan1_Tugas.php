<?php
    // Mendefinisikan variabel
    $nama_lengkap = "Abdul Hayyi";
    $nim = "2410010612";
    $prodi = "Teknik Informatika";
    $ipk_target = 3.9;
    $semester_sekarang = 4;
    $seluruh_semester = 8;
    $status_aktif = true;
    $nilai = 95.5;

 
    // Menampilkan data menggunakan echo
    echo "<h1>Selamat Datang di bagian <i>info data diri</i></h1>";
    echo "Nama: $nama_lengkap <br>";
    echo "NIM: $nim <br>";
    echo "Program Studi: $prodi <br>";
    echo "IPK Target: $ipk_target <br>";
    echo "Semester saat ini: $semester_sekarang <br>";
    echo "Nilai: $nilai";



    // Menampilkan struktur data dengan print_r (berguna untuk debugging nanti)
    echo "<pre>";
    print_r("Debugging: Variabel status_aktif bernilai $status_aktif");
    echo "</pre>";

    $sisa_semester = $seluruh_semester - $semester_sekarang;

    echo "Sisa semester: <b>$sisa_semester<b>";
?>