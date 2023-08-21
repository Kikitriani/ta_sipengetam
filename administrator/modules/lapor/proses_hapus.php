<?php

  // panggil file "database.php" untuk koneksi ke database
  require_once "../../config/database.php";

  // mengecek data GET "id"
  if (isset($_GET['id'])) {
    // ambil data GET dari tombol hapus
    $id = mysqli_real_escape_string($mysqli, $_GET['id']);

    // sql statement untuk delete data dari tabel "tbl_lapor" berdasarkan "id"
    $delete = mysqli_query($mysqli, "DELETE FROM tbl_lapor WHERE id_lapor='$id'")
                                     or die('Ada kesalahan pada query delete : ' . mysqli_error($mysqli));
    // cek query
    // jika proses delete berhasil
    if ($delete) {
      // alihkan ke halaman tempat dan tampilkan pesan berhasil hapus data
      header('location: ../../main.php?module=lapor&pesan=2');
    }
  }
