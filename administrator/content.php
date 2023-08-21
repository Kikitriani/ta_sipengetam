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
  require_once "config/database.php";
  require_once "helper/fungsi_tanggal_indo.php";

  // pemanggilan file halaman konten sesuai "module" yang dipilih
  // jika module yang dipilih "dashboard"
  if ($_GET['module'] == 'dashboard') {
    // panggil file tampil data dashboard
    include "modules/dashboard/tampil_data.php";
  }
  // jika module yang dipilih "tempat"
  elseif ($_GET['module'] == 'tempat') {
    // panggil file tampil data tempat
    include "modules/tempat/tampil_data.php";
  }
  
  // jika module yang dipilih "form_entri_tempat"
  elseif ($_GET['module'] == 'form_entri_tempat' && $_SESSION['hak_akses'] == 'Super Admin') {
    // panggil file form entri tempat
    include "modules/tempat/form_entri.php";
  }// jika module yang dipilih "form_ubah_tempat"
  elseif ($_GET['module'] == 'form_ubah_tempat') {
    // panggil file form entri tempat
    include "modules/tempat/form_ubah.php";
  }
  // jika module yang dipilih "riwayat" 
  elseif ($_GET['module'] == 'riwayat') {
    // panggil file tampil data riwayat
    include "modules/riwayat/tampil_data.php";
  }
  // jika module yang dipilih "form_entri_riwayat"
  elseif ($_GET['module'] == 'form_entri_riwayat') {
    // panggil file form entri riwayat
    include "modules/riwayat/form_entri.php";
  }// jika module yang dipilih "form_ubah_riwayat"
  elseif ($_GET['module'] == 'form_ubah_riwayat') {
    // panggil file form entri riwayat
    include "modules/riwayat/form_ubah.php";
  }
  elseif ($_GET['module'] == 'galeri') {
    // panggil file tampil data galeri
    include "modules/galeri/tampil_data.php";
  }
  // jika module yang dipilih "form_entri_galeri"
  elseif ($_GET['module'] == 'form_entri_galeri') {
    // panggil file form entri galeri
    include "modules/galeri/form_entri.php";
  }// jika module yang dipilih "form_ubah_galeri"
  elseif ($_GET['module'] == 'form_ubah_galeri') {
    // panggil file form entri galeri
    include "modules/galeri/form_ubah.php";
  }
  
  // jika module yang dipilih "lapor" dan hak akses bukan "Super Admin"
  elseif ($_GET['module'] == 'lapor' && $_SESSION['hak_akses'] == 'Super Admin') {
    // panggil file tampil data lapor
    include "modules/lapor/tampil_data.php";
  }
  // jika module yang dipilih "form_entri_lapor" dan hak akses bukan "Super Admin"
  elseif ($_GET['module'] == 'form_entri_lapor' && $_SESSION['hak_akses'] == 'Super Admin') {
    // panggil file form entri lapor
    include "modules/lapor/form_entri.php";
  }// jika module yang dipilih "form_ubah_lapor" dan hak akses bukan "Super Admin"
  elseif ($_GET['module'] == 'form_ubah_lapor' && $_SESSION['hak_akses'] == 'Super Admin') {
    // panggil file form entri lapor
    include "modules/lapor/form_ubah.php";
  }
  
  // jika module yang dipilih "monitoring" dan hak akses bukan "Super Admin"
  elseif ($_GET['module'] == 'monitoring') {
    // panggil file tampil data monitoring
    include "modules/monitoring/tampil_data.php";
  }
  // jika module yang dipilih "form_entri_monitoring" dan hak akses bukan "Super Admin"
  elseif ($_GET['module'] == 'form_entri_monitoring') {
    // panggil file form entri monitoring
    include "modules/monitoring/form_entri.php";
  }// jika module yang dipilih "form_ubah_monitoring" dan hak akses bukan "Super Admin"
  elseif ($_GET['module'] == 'form_ubah_monitoring') {
    // panggil file form entri monitoring
    include "modules/monitoring/form_ubah.php";
  }
  elseif ($_GET['module'] == 'detail_monitoring') {
    // panggil file form monitoring
    include "modules/monitoring/detail.php";
  }
  elseif ($_GET['module'] == 'detail_entri_monitoring') {
    // panggil file form monitoring
    include "modules/monitoring/detail_entri.php";
  }
  elseif ($_GET['module'] == 'detail_ubah_monitoring') {
    // panggil file form monitoring
    include "modules/monitoring/detail_ubah.php";
  }
  
  elseif ($_GET['module'] == 'ulasan') {
    // panggil file tampil data ulasan
    include "modules/ulasan/tampil_data.php";
  }
//   elseif ($_GET['module'] == 'form_entri_lapor') {
//     // panggil file form entri ulasan
//     include "modules/ulasan/form_entri.php";
//   }
//   elseif ($_GET['module'] == 'form_ubah_lapor') {
//     // panggil file form entri ulasan
//     include "modules/ulasan/form_ubah.php";
//   }
  
  elseif ($_GET['module'] == 'edukasi') {
    // panggil file tampil data edukasi
    include "modules/edukasi/tampil_data.php";
  }
  elseif ($_GET['module'] == 'form_entri_edukasi') {
    // panggil file form entri edukasi
    include "modules/edukasi/form_entri.php";
  }
  elseif ($_GET['module'] == 'form_ubah_edukasi') {
    // panggil file form entri edukasi
    include "modules/edukasi/form_ubah.php";
  }
  
  elseif ($_GET['module'] == 'profil') {
    // panggil file tampil data profil
    include "modules/profil/tampil_data.php";
  }
  // jika module yang dipilih "form_entri_profil" dan hak akses bukan "Super Admin"
  elseif ($_GET['module'] == 'form_entri_profil') {
    // panggil file form entri profil
    include "modules/profil/form_entri.php";
  }// jika module yang dipilih "form_ubah_profil" dan hak akses bukan "Super Admin"
  elseif ($_GET['module'] == 'form_ubah_profil') {
    // panggil file form entri profil
    include "modules/profil/form_ubah.php";
  }
  // jika module yang dipilih "user" dan hak akses "Administrator"
  elseif ($_GET['module'] == 'user' && $_SESSION['hak_akses'] == 'Super Admin') {
    // panggil file tampil data user
    include "modules/user/tampil_data.php";
  }
  // jika module yang dipilih "form_entri_user" dan hak akses "Administrator"
  elseif ($_GET['module'] == 'form_entri_user' && $_SESSION['hak_akses'] == 'Super Admin') {
    // panggil file form entri user
    include "modules/user/form_entri.php";
  }
  // jika module yang dipilih "form_ubah_user" dan hak akses "Administrator"
  elseif ($_GET['module'] == 'form_ubah_user' && $_SESSION['hak_akses'] == 'Super Admin') {
    // panggil file form ubah user
    include "modules/user/form_ubah.php";
  }
  // jika module yang dipilih "form_ubah_password"
  elseif ($_GET['module'] == 'form_ubah_password') {
    // panggil file form ubah password
    include "modules/password/form_ubah.php";
  }
}
