<?php
session_start();      // mengaktifkan session

// pengecekan session login user 
// jika user belum login
if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
  // alihkan ke halaman login dan tampilkan pesan peringatan login
  header('location: ../../login.php?pesan=2');
}
// jika user sudah login, maka jalankan perintah untuk delete
else {
  // panggil file "database.php" untuk koneksi ke database
  require_once "../../config/database.php";

  // mengecek data GET "id"
  if (isset($_GET['id'])) {
    // ambil data GET dari tombol hapus
    $id = mysqli_real_escape_string($mysqli, $_GET['id']);

    // sql statement untuk menampilkan data "foto" dari tabel "tbl_galeri" berdasarkan "id"
    $query = mysqli_query($mysqli, "SELECT foto FROM tbl_galeri WHERE id_galeri='$id'")or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
    // ambil data hasil query
    $data = mysqli_fetch_assoc($query);
    // tampilkan data
    $foto = $data['foto'];

    // jika data "foto" tidak kosong
    if (!empty($foto)) {
      // hapus file foto dari folder tempat
      $hapus_file = unlink("../../assets/img/tempat/$foto");
    }

    // sql statement untuk delete data dari tabel "tbl_galeri" berdasarkan "id"
    $delete = mysqli_query($mysqli, "DELETE FROM tbl_galeri WHERE id_galeri='$id'")
                                     or die('Ada kesalahan pada query delete : ' . mysqli_error($mysqli));
    // cek query
    // jika proses delete berhasil
    if ($delete) {
      // alihkan ke halaman tempat dan tampilkan pesan berhasil hapus data
      header('location: ../../main.php?module=galeri&pesan=2');
    }
  }
}
