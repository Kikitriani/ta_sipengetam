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

    $id_edukasi   = mysqli_real_escape_string($mysqli, $_POST['id_edukasi']);
    $judul   = mysqli_real_escape_string($mysqli, $_POST['judul']);
    $keterangan  = mysqli_real_escape_string($mysqli, $_POST['keterangan']);


    if(empty($_FILES['file']['name'])){
      $update = mysqli_query($mysqli, "UPDATE tbl_edukasi SET judul='$judul', keterangan='$keterangan' WHERE id_edukasi='$id_edukasi'")or die('Ada kesalahan pada query update : ' . mysqli_error($mysqli));

      if ($update) {
        header('location: ../../main.php?module=edukasi&pesan=3');
      }

    }
  }
}
