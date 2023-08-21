<?php
// mencegah direct access file PHP agar file PHP tidak bisa diakses secara langsung dari browser dan hanya dapat dijalankan ketika di include oleh file lain
// jika file diakses secara langsung
if (basename($_SERVER['PHP_SELF']) === basename(__FILE__)) {
  // alihkan ke halaman error 404
  header('location: 404.html');
}
// jika file di include oleh file lain, tampilkan isi file
else {

  if ($_GET['module'] == 'dashboard') { ?>
    <a href="?module=dashboard" class="nav-item nav-link active">Home</a>
    <?php
  }
    // jika tidak dipilih, menu dashboard tidak aktif
  else { ?>
    <a href="?module=dashboard" class="nav-item nav-link">Home</a>
    <?php
  }
  if ($_GET['module'] == 'pusat_hutan_mangrove' || $_GET['module'] == 'detail') { ?>
    <a href="?module=pusat_hutan_mangrove" class="nav-item nav-link active">Pusat Hutan Mangrove</a>
    <?php
  }
    // jika tidak dipilih, menu Pusat Hutan Mangrove tidak aktif
  else { ?>
    <a href="?module=pusat_hutan_mangrove" class="nav-item nav-link">Pusat Hutan Mangrove</a>
    <?php
  }
  if ($_GET['module'] == 'kontak') { ?>
    <a href="?module=kontak" class="nav-item nav-link active">Kontak</a>
    <?php
  }
    // jika tidak dipilih, menu kontak tidak aktif
  else { ?>
    <a href="?module=kontak" class="nav-item nav-link">Kontak</a>
    <?php
  }

  
}
?>