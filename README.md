# Praktikum PHP - SB Admin 2

# Nama Pemilik Repository

- Nama : Abdul Hayyi
- NPM : 2410010612
- Kelas : 4D TI Reguler Pagi Banjarbaru
- Mata Kuliah : Pemrograman Berbasis Objek (PBO)
- Dosen : Mirza Yogy Kurniawan
- Semester : 4
- Tugas : Praktikum PHP - SB Admin 2
- Link Tugas (Google Drive) : 

## Detail Tambahan :
1. File dan folder dari sesi 1 - 8
2. 📝 cetak.php berjalan di Laragon yang makai Apache 2.4.54 (VS16) yang cukup lama, detailnya :
   - Ekstensi php_curl.dll di setiap versi PHP membutuhkan libnghttp2.dll dengan versi tertentu
   - PHP 8.1.10 -> Butuh libnghttp2 (Versi lama) -> ✅ Kompatibel dengan Apache Laragon Saya
       - PHP 8.2.31 -> Butuh libnghttp2 (Versi lebih baru) -> ❌ Tidak cocok
       - PHP 8.3.x  -> Butuh libnghttp2 (Versi lebih baru) -> ❌ Tidak cocok
       - PHP 8.5.6  -> Butuh libnghttp2 (Versi terbaru)    -> ❌ Tidak cocok
   Alasan tidak update :
    - Untuk fix permanen di PHP 8.2+, perlu update Apache, yang berarti update Laragon keseluruhan. Rumit dan memakan waktu bagi Saya
    - Bootstrap (4) & PHP 8.1.10 ini sudah lebih dari cukup. Semua fitur yang dipakai (PDO, html2pdf, curl) berjalan normal di versi ini.
3. Detail tools :
   - mysql-8.0.30-winx64
   - Apache version httpd-2.4.54-win64-VS16
   - PHP 8.1.10 (yang work)
   - Composer version 2.9.7 2026-04-14 13:31:52
     PHP version 8.5.6 (C:\Laragon\bin\php\php-8.5.6-Win32-vs17-x64\php.exe) <-- Ini ketika Saya cek di CMD

### Ini repository apa?
Jawab : 
Praktikum PHP Sesi 1 - 8 dengan modul - Pemrograman Berbasis Web 2 (PBO) - Semester 4
