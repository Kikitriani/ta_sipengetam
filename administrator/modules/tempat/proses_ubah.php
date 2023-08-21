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

    $id_tempat    = mysqli_real_escape_string($mysqli, $_POST['id_tempat']);
    $nama_tempat  = mysqli_real_escape_string($mysqli, $_POST['nama_tempat']);
    $lat          = mysqli_real_escape_string($mysqli, $_POST['lat']);
    $lng          = mysqli_real_escape_string($mysqli, $_POST['lng']);
    $lokasi       = mysqli_real_escape_string($mysqli, $_POST['lokasi']);
    $keterangan   = mysqli_real_escape_string($mysqli, $_POST['keterangan']);

    if(empty($_FILES['file']['name'])){
      $update = mysqli_query($mysqli, "UPDATE tbl_tempat SET nama_tempat='$nama_tempat', lat='$lat', lng='$lng', lokasi='$lokasi', keterangan='$keterangan' WHERE id_tempat='$id_tempat'")or die('Ada kesalahan pada query update : ' . mysqli_error($mysqli));

      if ($update) {
        header('location: ../../main.php?module=tempat&pesan=3');
      }
    }else{
      $query = mysqli_query($mysqli, "SELECT gambar FROM tbl_tempat WHERE id_tempat='$id_tempat'")or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
      // ambil data hasil query
      $data = mysqli_fetch_assoc($query);
      // tampilkan data
      $gambar = $data['gambar'];
      // jika data "gambar" tidak kosong
      if (!empty($gambar)) {
      // hapus file gambar dari folder tempat
        $hapus_file = unlink("../../assets/img/tempat/$gambar");
      }

      $nama_file    = $_FILES['file']['name'];
      $ukuran_file  = $_FILES['file']['size'];
      $tipe_file    = $_FILES['file']['type'];
      $tmp_file     = $_FILES['file']['tmp_name'];
      $arsip        = $id."_".$nama_file;

      // tentukan tipe file dokumen yang diperbolehkan
      $allowed_extensions = array('jpg','jpeg','png');
      // seleksi tipe file dari input edoc
      $file               = explode(".", $arsip);
      $extension          = array_pop($file);
      // enkripsi nama file
      $nama_file_enkripsi = sha1(md5(time() . $nama_file)) . '.' . $extension;
      // tentukan direktori penyimpanan file dokumen
      $path               = "../../assets/img/tempat/".$nama_file_enkripsi;

      $created_user       = $_SESSION['id_user'];

      // Cek apakah tipe file yang diupload sesuai dengan allowed_extensions
      if(in_array($extension, $allowed_extensions)) {
        if($ukuran_file <= 5000000) {
          if(move_uploaded_file($tmp_file, $path)) {
            $update = mysqli_query($mysqli, "UPDATE tbl_tempat SET nama_tempat='$nama_tempat', gambar='$nama_file_enkripsi', lat='$lat', lng='$lng', lokasi='$lokasi', keterangan='$keterangan' WHERE id_tempat='$id_tempat'")or die('Ada kesalahan pada query update : ' . mysqli_error($mysqli));

            if ($update) {
              header('location: ../../main.php?module=tempat&pesan=3');
            }
          }
        }
      }

    }
  }
}
