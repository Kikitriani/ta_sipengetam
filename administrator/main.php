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
  // include 'functions.php';
  function get_saved_locations(){

    include 'config/database.php';

    $sqldata = mysqli_query($mysqli,"SELECT lng, lat FROM tbl_tempat");

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
  ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Title -->
    <title>SI Pengetam</title>

    <!-- Favicon icon -->
    <link rel="icon" href="assets/img/SI-icon.png" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
      WebFont.load({
        google: {
          "families": ["Lato:300,400,700,900"]
        },
        custom: {
          "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
          urls: ['assets/css/fonts.min.css']
        },
        active: function() {
          sessionStorage.fonts = true;
        }
      });
    </script>

    <!-- Datepicker CSS -->
    <link rel="stylesheet" href="assets/js/plugin/datepicker/css/bootstrap-datepicker.css">
    <!-- Chosen CSS -->
    <link rel="stylesheet" href="assets/js/plugin/chosen/css/chosen.css">

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/atlantis.min.css">

    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.css' rel='stylesheet' />
    <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.css' type='text/css' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.js"></script>
    
    <!--<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />-->
    <!--<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>-->
    

    <!-- <script type="module" src="assets/js/custom/index.js"></script> -->
    <!-- <script type="module" src="./index.js"></script> -->
    
    <!-- jQuery Core -->
    <script src="assets/js/core/jquery.3.2.1.min.js"></script>

    <script>
      function peta_awal() {
        var map1 = L.map('map1').setView([-1.8832461535074572, 109.99335317806884], 9);
        var osmLink = "<a href='http://www.openstreetmap.org'>Open StreetMap</a>";
        L.tileLayer(
          'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; ' + osmLink,
            maxZoom: 18
        }).addTo(map1);


        <?php
        include 'config/database.php';
        $data = mysqli_query($mysqli,"SELECT *, a.gambar AS img_tempat, a.keterangan AS ket FROM tbl_tempat a LEFT JOIN tbl_riwayat b ON a.id_tempat=b.id_tempat 
          ORDER BY b.tanggal ASC");

        $js = '';

        // looping script js ini sesuai dengan jumlah lokasi yang ada pada database
        while($row = mysqli_fetch_assoc($data)) {
          if($row['status']==1){
           $status = "<h6><span class='badge bg-success text-white'>Masih Beroperasi</span></h6>";
         }else if($row["status"]==2){
           $status = "<h6><span class='badge bg-danger text-white'>Kerusakan</span></h6>";
         }else if($row["status"]==3){
           $status = "<h6><span class='badge bg-warning text-white'>Perbaikan</span></h6>";
         }else{
           $status = "<h6><span class='badge bg-success text-white'>Masih Beroperasi</span></h6>";
         }
         $ket = $row['ket'];
         $js .= 'L.marker([
         '.$row['lat'].',
         '.$row['lng'].'
         ]).addTo(map1)
         .bindPopup("<h6><b>'.$row['nama_tempat'].'</b></h6>'.$row['lokasi'].'<br><br>'.$status.'<br>'.
         "<img src='assets/img/tempat/".$row['img_tempat']."' width='300'><br><br>Hutan Mangrove ini merupakan salah satu Wisata Hutan Mangrove yang ada di ketapang".'");
         ';
       }
      echo $js;

      ?>

      var popup = L.popup();
  }
  
</script>

<style>
    .logo-header[data-background-color="green"] {
      background: #009000 !important;
    }
    .navbar-header[data-background-color="green2"] {
      background: #008000 !important;
    }
    .sidebar.sidebar-style-2 .nav.nav-success > .nav-item.active > a {
      background: #009000 !important;
      box-shadow: 4px 4px 10px 0 rgba(0,0,0,.1),4px 4px 15px -5px rgba(49,206,54,.4) !important;
    }
    .bg-success-gradient {
      /*background: #31ce36 !important;*/
      /*background: -webkit-linear-gradient(legacy-direction(-45deg),#179d08,#31ce36) !important;*/
      background: linear-gradient(-45deg,#009000,#008000) !important;
    }
    /*.btn-hijau*/
    
</style>
  </head>

  <body onload="peta_awal()">
    <div class="wrapper">
      <div class="main-header">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="green">
          <!-- Logo Brand -->
          <a href="?module=dashboard" class="logo">
            <div class="navbar-brand">
              <img src="assets/img/SI Pengetam putih.png" alt="" height="100%" width="150">
              <!-- <span><i class="fab fa-gofore fa-lg text-warning"></i></span> -->
              <!-- <span class="text-white"></span> -->
            </div>
          </a>
          <!-- Navbar Toggler -->
          <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
              <i class="icon-menu"></i>
            </span>
          </button>
          <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
          <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
              <i class="icon-menu"></i>
            </button>
          </div>
        </div>
        <!-- End Logo Header -->

        <!-- Navbar Header -->
        <nav class="navbar navbar-header navbar-expand-lg" data-background-color="green2">
          <div class="container-fluid">
            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
              <!-- data user login -->
              <li class="nav-item dropdown hidden-caret">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="javascript:void(0)" aria-expanded="false">
                  <div class="avatar-sm">
                    <img src="assets/img/avatar-1.png" alt="image profile" class="avatar-img rounded-circle">
                    <!--<i class="fas fa-angle-down avatar-title"></i>-->
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                  <li>
                    <div class="user-box">
                      <div class="avatar-lg"><img src="assets/img/avatar-1.png" alt="image profile" class="avatar-img rounded"></div>
                      <div class="u-text pt-1">
                        <h4><?php echo $_SESSION['nama_user']; ?></h4>
                        <p class="text-muted"><?php echo $_SESSION['hak_akses']; ?></p>
                      </div>
                    </div>
                  </li>
                  <!-- menu user -->
                  <li>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="?module=form_ubah_password">
                      <i class="fas fa-user-lock mr-1"></i> Ubah Password
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalLogout">
                      <i class="fas fa-sign-out-alt mr-1"></i> Logout
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>

      <!-- Sidebar -->
      <div class="sidebar sidebar-style-2">
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <!-- data user login -->
            <div class="user">
              <div class="avatar-sm float-left mr-2">
                <img src="assets/img/avatar-1.png" alt="image profile" class="avatar-img rounded-circle">
              </div>
              <div class="info">
                <a>
                  <span>
                    <?php echo $_SESSION['nama_user']; ?>
                    <span class="user-level"><?php echo $_SESSION['hak_akses']; ?></span>
                  </span>
                </a>
              </div>
            </div>
            <!-- Sidebar Menu -->
            <ul class="nav nav-success">

              <!-- panggil file "sidebar_menu.php" untuk menampilkan menu -->
              <?php include "sidebar_menu.php"; ?>

            </ul>
          </div>
        </div>
      </div>
      <!-- End Sidebar -->

      <div class="main-panel">
        <!-- Main Content -->
        <!-- <div id="map" style="height: 400px;"></div> -->
        <div class="content">

          <!-- <div id="map1" style="width: 100%; height:400px; " ></div> -->


          <!-- panggil file "content.php" untuk menampilkan halaman konten -->
          <?php 
          include "content.php"; 
          ?>
          <!-- <div id="map"></div> -->

        </div>

        <!-- End Main Content -->

        <!-- Footer -->
        <footer class="footer">
          <div class="container-fluid">
            <div class="copyright ml-auto">
              Copyright &copy; <?php echo date("Y");?> - <a href="#" target="_BLANK" class="text-success">SIG Pengetam</a>.
            </div>
          </div>
        </footer>
        <!-- End Footer -->
      </div>
    </div>

    <!-- Modal Logout -->
    <div class="modal fade" id="modalLogout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-sign-out-alt mr-2"></i>Logout</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Apakah Anda yakin ingin logout?</div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-round" data-dismiss="modal">Batal</button>
            <a href="logout.php" class="btn btn-danger btn-round">Ya, Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Core JS Files -->
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery UI -->
    <script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <!-- Datatables -->
    <script src="assets/js/plugin/datatables/datatables.min.js"></script>
    <!-- Datepicker JS -->
    <script src="assets/js/plugin/datepicker/js/bootstrap-datepicker.min.js"></script>
    <!-- Chosen JS -->
    <script src="assets/js/plugin/chosen/js/chosen.jquery.js"></script>
    <!-- Summernote -->
    <link rel="stylesheet" href="assets/js/plugin/summernote/summernote.min.css">
    <script src="assets/js/plugin/summernote/summernote.min.js"></script>
    
    <!-- Dropzone -->
	<!--<script src="assets/js/plugin/dropzone/dropzone.min.js"></script>-->
    
    <!-- include summernote css/js -->
<!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet"> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> -->
  

    <!-- Atlantis JS -->
    <script src="assets/js/atlantis.min.js"></script>

    <!-- Custom Scripts -->
    <script src="assets/js/plugin.js"></script>
    <script src="assets/js/form-validation.js"></script>

    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.js'></script>
    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.min.js'></script>

    <?php include 'functions.php'; ?>

    <!-- <script type="module" src="assets/js/custom/script.js"></script> -->
    <!-- <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC79d_HrMmXb4Oa3T63kdLxozy5EsLWX44&callback=initMap&v=weekly"
      defer
    ></script> -->
    
  </body>

  </html>
<?php } ?>