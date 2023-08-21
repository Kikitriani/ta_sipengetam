<?php
// deklarasi parameter koneksi database
$host     = "127.0.0.1:3307";            // server database, default “localhost” atau “127.0.0.1”
$username = "root";                 // username database, default “root”
$password = "";                     // password database, default kosong
$database = "db_sipengetam"; // memilih database yang akan digunakan

// buat koneksi database
$mysqli = mysqli_connect($host, $username, $password, $database);

// cek koneksi
// jika koneksi gagal 
if (!$mysqli) {
  // tampilkan pesan gagal koneksi
  die('Koneksi Database Gagal : ' . mysqli_connect_error());
}
