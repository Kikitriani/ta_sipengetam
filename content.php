<?php
// mencegah direct access file PHP agar file PHP tidak bisa diakses secara langsung dari browser dan hanya dapat dijalankan ketika di include oleh file lain
// jika file diakses secara langsung
if (basename($_SERVER['PHP_SELF']) === basename(__FILE__)) {
  // alihkan ke halaman error 404
  header('location: 404.html');
}
// jika file di include oleh file lain, tampilkan isi file
else {
  // panggil file "database.php" untuk koneksi ke database
  require_once "administrator/config/database.php";
  require_once "administrator/helper/fungsi_tanggal_indo.php";

  // pemanggilan file halaman konten sesuai "module" yang dipilih
  // jika module yang dipilih "dashboard"
  if ($_GET['module'] == 'dashboard') {
    // panggil file tampil data dashboard
    include "home/index.php";
  }
  // jika module yang dipilih "pusat_hutan_mangrove" dan hak akses bukan "Kepala Gudang"
  elseif ($_GET['module'] == 'pusat_hutan_mangrove') {
    // panggil file tampil data pusat_hutan_mangrove
    include "pusat_hutan_mangrove/index.php";
  }
  elseif ($_GET['module'] == 'detail') {
    // panggil file tampil data pusat_hutan_mangrove
    include "pusat_hutan_mangrove/detail.php";
  }
  // jika module yang dipilih "kontak" dan hak akses bukan "Kepala Gudang"
  elseif ($_GET['module'] == 'kontak') {
    // panggil file tampil data kontak
    include "kontak/index.php";
  }
}
