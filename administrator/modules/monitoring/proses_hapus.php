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
  if (isset($_GET['id_pohon'])) {
    // ambil data GET dari tombol hapus
    $id = mysqli_real_escape_string($mysqli, $_GET['id_pohon']);

    // sql statement untuk menampilkan data "foto" dari tabel "tbl_pohon" berdasarkan "id"
    $query = mysqli_query($mysqli, "SELECT foto FROM tbl_pohon WHERE id_pohon='$id'")or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
    // ambil data hasil query
    $data = mysqli_fetch_assoc($query);
    // tampilkan data
    $foto = $data['foto'];

    // jika data "foto" tidak kosong
    if (!empty($foto)) {
      // hapus file gambar dari folder tempat
      $hapus_file = unlink("../../assets/img/tempat/$foto");
    }

    // sql statement untuk delete data dari tabel "tbl_pohon" berdasarkan "id"
    $delete = mysqli_query($mysqli, "DELETE FROM tbl_pohon WHERE id_pohon='$id'")
                                     or die('Ada kesalahan pada query delete : ' . mysqli_error($mysqli));
    
    $delete_log = mysqli_query($mysqli, "DELETE FROM tbl_log_pohon WHERE id_pohon='$id'")
                                     or die('Ada kesalahan pada query delete : ' . mysqli_error($mysqli));
    // cek query
    // jika proses delete berhasil
    if ($delete) {
        if ($delete_log) {
            // alihkan ke halaman tempat dan tampilkan pesan berhasil hapus data
            header('location: ../../main.php?module=monitoring&pesan=2');
        }
    }
  }
  else if (isset($_GET['id_log'])) {
    // ambil data GET dari tombol hapus
    $id = mysqli_real_escape_string($mysqli, $_GET['id_log']);

    // sql statement untuk menampilkan data "foto" dari tabel "tbl_pohon" berdasarkan "id"
    $query = mysqli_query($mysqli, "SELECT foto_log, id_pohon FROM tbl_log_pohon WHERE id_log='$id'")or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
    // ambil data hasil query
    $data = mysqli_fetch_assoc($query);
    // tampilkan data
    $foto = $data['foto'];
    $id_pohon = $data['id_pohon'];

    // jika data "foto" tidak kosong
    if (!empty($foto)) {
      // hapus file gambar dari folder tempat
      $hapus_file = unlink("../../assets/img/tempat/$foto");
    }

    // sql statement untuk delete data dari tabel "tbl_pohon" berdasarkan "id"
    $delete = mysqli_query($mysqli, "DELETE FROM tbl_log_pohon WHERE id_log='$id'")
                                     or die('Ada kesalahan pada query delete : ' . mysqli_error($mysqli));
    // cek query
    // jika proses delete berhasil
    if ($delete) {
      // alihkan ke halaman tempat dan tampilkan pesan berhasil hapus data
      header('location: ../../main.php?module=detail_monitoring&id='.$id_pohon.'&pesan=2');
    }
  }
}
