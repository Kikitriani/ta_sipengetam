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
    $result   = mysqli_query($mysqli, "SELECT max(id_galeri) as kode FROM tbl_galeri")
                or die('Ada kesalahan pada query tampil data id: '. mysqli_error($mysqli));
    
    $data     = mysqli_fetch_assoc($result);
    $id       = $data['kode'] + 1;

    $id_tempat    = mysqli_real_escape_string($mysqli, $_POST['id_tempat']);
    $keterangan   = mysqli_real_escape_string($mysqli, $_POST['keterangan']);

    $tgl_galeri  = date('Y-m-d', strtotime($tanggal));

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

          $insert = mysqli_query($mysqli, "INSERT INTO tbl_galeri(id_galeri, id_tempat, foto, keterangan, created_user) VALUES('$id', '$id_tempat', '$nama_file_enkripsi', '$keterangan', '$created_user')")or die('Ada kesalahan pada query insert : ' . mysqli_error($mysqli));
          if ($insert) {
            header('location: ../../main.php?module=galeri&pesan=1');
          }
        }
      }
    }

  }
}
