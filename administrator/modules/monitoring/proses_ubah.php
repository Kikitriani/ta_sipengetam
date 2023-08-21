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

    $id_pohon   = mysqli_real_escape_string($mysqli, $_POST['id_pohon']);
    $id_tempat  = mysqli_real_escape_string($mysqli, $_POST['id_tempat']);
    $usia       = mysqli_real_escape_string($mysqli, $_POST['usia']);
    $tanggal    = mysqli_real_escape_string($mysqli, $_POST['tanggal']);
    $jumlah     = mysqli_real_escape_string($mysqli, $_POST['jumlah']);
    $jenis      = mysqli_real_escape_string($mysqli, $_POST['jenis']);

    $tgl_tanam  = date('Y-m-d', strtotime($tanggal));

    if(empty($_FILES['file']['name'])){
      $update = mysqli_query($mysqli, "UPDATE tbl_pohon SET id_tempat='$id_tempat', usia_tanam='$usia', tgl_tanam='$tgl_tanam', jenis='$jenis', jumlah_bibit='$jumlah' WHERE id_pohon='$id_pohon'")or die('Ada kesalahan pada query update : ' . mysqli_error($mysqli));

      if ($update) {
        header('location: ../../main.php?module=monitoring&pesan=3');
      }
    }else{
      $query = mysqli_query($mysqli, "SELECT foto FROM tbl_pohon WHERE id_pohon='$id_pohon'")or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
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
            $update = mysqli_query($mysqli, "UPDATE tbl_pohon SET id_tempat='$id_tempat', foto='$nama_file_enkripsi', usia_tanam='$usia', tgl_tanam='$tgl_tanam', jenis='$jenis', jumlah_bibit='$jumlah' WHERE id_pohon='$id_pohon'")or die('Ada kesalahan pada query update : ' . mysqli_error($mysqli));

            if ($update) {
              header('location: ../../main.php?module=monitoring&pesan=3');
            }
          }
        }
      }

    }
  }
  else if (isset($_POST['simpan_log'])) {

    $id_log     = mysqli_real_escape_string($mysqli, $_POST['id_log']);
    $id_pohon   = mysqli_real_escape_string($mysqli, $_POST['id_pohon']);
    $tinggi     = mysqli_real_escape_string($mysqli, $_POST['tinggi']);
    $tanggal    = mysqli_real_escape_string($mysqli, $_POST['tanggal']);
    $diameter   = mysqli_real_escape_string($mysqli, $_POST['diameter']);
    $persentase_tanam   = mysqli_real_escape_string($mysqli, $_POST['persentase_tanam']);
    $keterangan = mysqli_real_escape_string($mysqli, $_POST['keterangan']);

    $tgl_log  = date('Y-m-d', strtotime($tanggal));

    if(empty($_FILES['file']['name'])){
      $update = mysqli_query($mysqli, "UPDATE tbl_log_pohon SET tinggi='$tinggi', tgl_monitor='$tgl_log', keterangan='$keterangan', diameter='$diameter', persentase_tumbuh='$persentase_tanam' WHERE id_log='$id_log'")or die('Ada kesalahan pada query update : ' . mysqli_error($mysqli));

      if ($update) {
        header('location: ../../main.php?module=detail_monitoring&id='.$id_pohon.'&pesan=3');
      }
    }else{
      $query = mysqli_query($mysqli, "SELECT foto FROM tbl_pohon WHERE id_log='$id_log'")or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
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
            $update = mysqli_query($mysqli, "UPDATE tbl_log_pohon SET foto='$nama_file_enkripsi', tinggi='$tinggi', tgl_monitor='$tgl_log', keterangan='$keterangan', diameter='$diameter', persentase_tumbuh='$persentase_tanam' WHERE id_log='$id_log'")or die('Ada kesalahan pada query update : ' . mysqli_error($mysqli));

            if ($update) {
              header('location: ../../main.php?module=detail_monitoring&id='.$id_pohon.'&pesan=3');
            }
          }
        }else{
            echo "Gambar yang diupload terlalu besar";
        }
      }

    }
  }
}
