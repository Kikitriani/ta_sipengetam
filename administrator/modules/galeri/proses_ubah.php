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

    $id_galeri   = mysqli_real_escape_string($mysqli, $_POST['id_galeri']);
    $id_tempat   = mysqli_real_escape_string($mysqli, $_POST['id_tempat']);
    $keterangan  = mysqli_real_escape_string($mysqli, $_POST['keterangan']);


    if(empty($_FILES['file']['name'])){
      $update = mysqli_query($mysqli, "UPDATE tbl_galeri SET id_tempat='$id_tempat', keterangan='$keterangan' WHERE id_galeri='$id_galeri'")or die('Ada kesalahan pada query update : ' . mysqli_error($mysqli));

      if ($update) {
        header('location: ../../main.php?module=galeri&pesan=3');
      }
    }else{
      $query = mysqli_query($mysqli, "SELECT foto FROM tbl_galeri WHERE id_galeri='$id_galeri'")or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
      // ambil data hasil query
      $data = mysqli_fetch_assoc($query);
      // tampilkan data
      $foto = $data['foto'];
      // jika data "foto" tidak kosong
      if (!empty($foto)) {
      // hapus file foto dari folder tempat
        $hapus_file = unlink("../../assets/img/tempat/$foto");
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
            $update = mysqli_query($mysqli, "UPDATE tbl_galeri SET id_tempat='$id_tempat', foto='$nama_file_enkripsi', keterangan='$keterangan' WHERE id_galeri='$id_galeri'")or die('Ada kesalahan pada query update : ' . mysqli_error($mysqli));

            if ($update) {
              header('location: ../../main.php?module=galeri&pesan=3');
            }
          }
        }
      }

    }
  }
}
