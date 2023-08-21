<?php
session_start();      // mengaktifkan session

// pengecekan session login user 
// jika user belum login
if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
  // alihkan ke halaman login dan tampilkan pesan peringatan login
  header('location: ../../login.php?pesan=2');
}
// jika user sudah login, maka jalankan perintah untuk insert
else {
  // panggil file "database.php" untuk koneksi ke database
  require_once "../../config/database.php";

  // mengecek data hasil submit dari form
  if (isset($_POST['simpan'])) {
    // ambil data hasil submit dari form
    $result   = mysqli_query($mysqli, "SELECT max(id_edukasi) as kode FROM tbl_edukasi")
                or die('Ada kesalahan pada query tampil data id: '. mysqli_error($mysqli));
    
    $data     = mysqli_fetch_assoc($result);
    $id       = $data['kode'] + 1;

    $judul          = mysqli_real_escape_string($mysqli, $_POST['judul']);
    $keterangan     = mysqli_real_escape_string($mysqli, $_POST['keterangan']);
    $created_user   = $_SESSION['id_user'];
    
    $insert = mysqli_query($mysqli, "INSERT INTO tbl_edukasi(id_edukasi, judul, keterangan, created_user) VALUES('$id', '$judul', '$keterangan', '$created_user')")or die('Ada kesalahan pada query insert : ' . mysqli_error($mysqli));
    if ($insert) {
      header('location: ../../main.php?module=edukasi&pesan=1');
    }

  }
}
