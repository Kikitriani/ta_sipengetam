<?php
session_start();      // mengaktifkan session

// pengecekan session login user 
// jika user belum login
if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
  // alihkan ke halaman login dan tampilkan pesan peringatan login
  header('location: login.php?pesan=2');
}
// jika user sudah login, tampilkan halaman konten
else { 

    // require("config/database.php");

// Gets data from URL parameters.
    // if(isset($_GET['add_location'])) {
    //     add_location();
    // }


    // function add_location(){

    //     include 'config/database.php';

    //     $namain = $_GET['namain'];
    //     $lat = $_GET['lat'];
    //     $lng = $_GET['lng'];

    // // Inserts new row with place data.
    //     $query = sprintf("INSERT INTO tbl_tempat " .
    //         " (id,nama_lokasi, lat, lng) " .
    //         " VALUES (NULL,'$namain','$lat', '$lng');",
    //         mysqli_real_escape_string($connections,$namain),
    //         mysqli_real_escape_string($connections,$lat),
    //         mysqli_real_escape_string($connections,$lng));


    //     $result = mysqli_query($connections,$query);
    //     echo json_encode("Data Berhasil disimpan !");
    //     if (!$result) {
    //         die('Invalid query: ' . mysqli_error($con));
    //     }
    // }
    function get_saved_locations(){

        include 'config/database.php';
        $sqldata = mysqli_query($connections,"SELECT lng, lat FROM tb_tempat ");

        $rows = array();
        while($r = mysqli_fetch_assoc($sqldata)) {
            $rows[] = $r;

        }
        $indexed = array_map('array_values', $rows);

    //  $array = array_filter($indexed);

        echo json_encode($indexed);
        if (!$rows) {
            return null;
        }
    }
}

?>