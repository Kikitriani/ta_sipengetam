<?php
  require_once "../administrator/config/database.php";

  // mengecek data hasil submit dari form
  if (isset($_POST['simpan'])) {
    // ambil data hasil submit dari form
    $result   = mysqli_query($mysqli, "SELECT max(id_lapor) as kode FROM tbl_lapor")
                or die('Ada kesalahan pada query tampil data id: '. mysqli_error($mysqli));
    
    $data     = mysqli_fetch_assoc($result);
    $id       = $data['kode'] + 1;

    $id_tempat    = mysqli_real_escape_string($mysqli, $_POST['id_tempat']);
    $nama         = mysqli_real_escape_string($mysqli, $_POST['nama']);
    $email        = mysqli_real_escape_string($mysqli, $_POST['email']);
    $keterangan   = mysqli_real_escape_string($mysqli, $_POST['keterangan']);


    $insert =   mysqli_query($mysqli, "INSERT INTO tbl_lapor(id_lapor, id_tempat, nama, email, keterangan) 
                VALUES('$id', '$id_tempat', '$nama', '$email', '$keterangan')")
                or die('Ada kesalahan pada query insert : ' . mysqli_error($mysqli));
    if ($insert) {
        header('location: ../main.php?module=kontak&pesan=1');
    }
 }
