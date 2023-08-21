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
    <li class="nav-item active">
      <a href="?module=dashboard">
        <i class="fas fa-home"></i>
        <p>Dashboard</p>
      </a>
    </li>
    <?php
  }
    // jika tidak dipilih, menu dashboard tidak aktif
  else { ?>
    <li class="nav-item">
      <a href="?module=dashboard">
        <i class="fas fa-home"></i>
        <p>Dashboard</p>
      </a>
    </li>
    <?php
  }

  if ($_GET['module'] == 'tempat' || $_GET['module'] == 'form_entri_tempat' || $_GET['module'] == 'form_ubah_tempat') { ?>
    <li class="nav-section">
      <span class="sidebar-mini-icon">
        <i class="fa fa-ellipsis-h"></i>
      </span>
      <h4 class="text-section">Manu Utama</h4>
    </li>

    <li class="nav-item active">
      <a href="?module=tempat">
        <i class="fas fa-map-marked-alt"></i>
        <p>Tempat</p>
      </a>
    </li>
    <?php
  }
    // jika tidak dipilih, menu tempat tidak aktif
  else { ?>
    <li class="nav-section">
      <span class="sidebar-mini-icon">
        <i class="fa fa-ellipsis-h"></i>
      </span>
      <h4 class="text-section">Manu Utama</h4>
    </li>

    <li class="nav-item">
      <a href="?module=tempat">
        <i class="fas fa-map-marked-alt"></i>
        <p>Tempat</p>
      </a>
    </li>
    <?php
  }
  
  if ($_GET['module'] == 'riwayat' || $_GET['module'] == 'form_entri_riwayat' || $_GET['module'] == 'form_ubah_riwayat') { ?>

    <li class="nav-item active">
      <a href="?module=riwayat">
        <i class="fas fa-history"></i>
        <p>Riwayat</p>
      </a>
    </li>
    <?php
  }
    // jika tidak dipilih, menu riwayat tidak aktif
  else { ?>
    <li class="nav-item">
      <a href="?module=riwayat">
        <i class="fas fa-history"></i>
        <p>Riwayat</p>
      </a>
    </li>
    <?php
  }

  if ($_GET['module'] == 'galeri' || $_GET['module'] == 'form_entri_galeri' || $_GET['module'] == 'form_ubah_galeri') { ?>

    <li class="nav-item active">
      <a href="?module=galeri">
        <i class="fas fa-images"></i>
        <p>Galeri</p>
      </a>
    </li>
    <?php
  }
    // jika tidak dipilih, menu riwayat tidak aktif
  else { ?>
    <li class="nav-item">
      <a href="?module=galeri">
        <i class="fas fa-images"></i>
        <p>Galeri</p>
      </a>
    </li>
    <?php
  }

if ($_SESSION['hak_akses'] == 'Super Admin') {
  if ($_GET['module'] == 'edukasi' || $_GET['module'] == 'form_entri_edukasi' || $_GET['module'] == 'form_ubah_edukasi') { ?>

    <li class="nav-item active">
      <a href="?module=edukasi">
        <i class="fas fa-book-open"></i>
        <p>Edukasi</p>
      </a>
    </li>
    <?php
  }
    // jika tidak dipilih, menu Edukasi tidak aktif
  else { ?>
    <li class="nav-item">
      <a href="?module=edukasi">
        <i class="fas fa-book-open"></i>
        <p>Edukasi</p>
      </a>
    </li>
    <?php
  }
}
if ($_GET['module'] == 'monitoring' || $_GET['module'] == 'form_entri_monitoring' || $_GET['module'] == 'form_ubah_monitoring' || $_GET['module'] == 'detail_monitoring'|| $_GET['module'] == 'detail_entri_monitoring'|| $_GET['module'] == 'detail_ubah_monitoring') { ?>

    <li class="nav-item active">
      <a href="?module=monitoring">
        <i class="fas fa-chart-line"></i>
        <p>Monitoring Mangrove</p>
      </a>
    </li>
    <?php
  }
    // jika tidak dipilih, menu Monitoring tidak aktif
  else { ?>
    <li class="nav-item">
      <a href="?module=monitoring">
        <i class="fas fa-chart-line"></i>
        <p>Monitoring Mangrove</p>
      </a>
    </li>
    <?php
  }
if ($_SESSION['hak_akses'] == 'Super Admin') {
  if ($_GET['module'] == 'lapor' || $_GET['module'] == 'form_entri_lapor' || $_GET['module'] == 'form_ubah_lapor') { ?>

    <li class="nav-item active">
      <a href="?module=lapor">
        <i class="fas fa-clipboard-list"></i>
        <p>Lapor</p>
      </a>
    </li>
    <?php
  }
    // jika tidak dipilih, menu lapor tidak aktif
  else { ?>
    <li class="nav-item">
      <a href="?module=lapor">
        <i class="fas fa-clipboard-list"></i>
        <p>Lapor</p>
      </a>
    </li>
    <?php
  }
}
  
  if ($_GET['module'] == 'ulasan' || $_GET['module'] == 'form_entri_ulasan' || $_GET['module'] == 'form_ubah_ulasan') { ?>

    <li class="nav-item active">
      <a href="?module=ulasan">
        <i class="fas fa-comment-alt"></i>
        <p>Ulasan</p>
      </a>
    </li>
    <?php
  }
    // jika tidak dipilih, menu ulasan tidak aktif
  else { ?>
    <li class="nav-item">
      <a href="?module=ulasan">
        <i class="fas fa-comment-alt"></i>
        <p>Ulasan</p>
      </a>
    </li>
    <?php
  }
  // pengecekan hak akses untuk menampilkan menu sesuai dengan hak akses
  // jika hak akses = Administrator, tampilkan menu
  if ($_SESSION['hak_akses'] == 'Super Admin') {
    // jika menu manajemen user (tampil data / form entri / form ubah) dipilih, menu manajemen user aktif
    if ($_GET['module'] == 'user' || $_GET['module'] == 'form_entri_user' || $_GET['module'] == 'form_ubah_user') { ?>
      <li class="nav-section">
        <span class="sidebar-mini-icon">
          <i class="fa fa-ellipsis-h"></i>
        </span>
        <h4 class="text-section">Pengaturan</h4>
      </li>

      <li class="nav-item active">
        <a href="?module=user">
          <i class="fas fa-user"></i>
          <p>Manajemen User</p>
        </a>
      </li>
    <?php
    }
    // jika tidak dipilih, menu manajemen user tidak aktif
    else { ?>
      <li class="nav-section">
        <span class="sidebar-mini-icon">
          <i class="fa fa-ellipsis-h"></i>
        </span>
        <h4 class="text-section">Pengaturan</h4>
      </li>

      <li class="nav-item">
        <a href="?module=user">
          <i class="fas fa-user"></i>
          <p>Manajemen User</p>
        </a>
      </li>
    <?php
    }
    if ($_GET['module'] == 'profil' || $_GET['module'] == 'form_entri_profil' || $_GET['module'] == 'form_ubah_profil') { ?>

    <li class="nav-item active">
      <a href="?module=profil">
        <i class="fas fa-address-card"></i>
        <p>Tentang Kami</p>
      </a>
    </li>
    <?php
    }
        // jika tidak dipilih, menu profil tidak aktif
    else { ?>
        <li class="nav-item">
          <a href="?module=profil">
            <i class="fas fa-address-card"></i>
            <p>Tentang Kami</p>
          </a>
        </li>
        <?php
    }
  }

  
}
?>