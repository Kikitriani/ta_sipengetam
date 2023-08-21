<?php
// mencegah direct access file PHP agar file PHP tidak bisa diakses secara langsung dari browser dan hanya dapat dijalankan ketika di include oleh file lain
// jika file diakses secara langsung
if (basename($_SERVER['PHP_SELF']) === basename(__FILE__)) {
  // alihkan ke halaman error 404
  header('location: 404.html');
}
// jika file di include oleh file lain, tampilkan isi file
else {

  // menampilkan pesan selamat datang
  // jika pesan tersedia
  if (isset($_GET['pesan'])) {
    // jika pesan = 1
    if ($_GET['pesan'] == 1) {
      // tampilkan pesan selamat datang
      echo '<div class="alert alert-notify alert-success alert-dismissible fade show" role="alert">
              <span data-notify="icon" class="fas fa-user-alt"></span> 
              <span data-notify="title" class="text-success">Hi! ' . $_SESSION['nama_user'] . '</span> 
              <span data-notify="message">Selamat Datang di Aplikasi Arsip Digital.</span>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
    }
  }
?>

  <div class="panel-header bg-success-gradient">
    <div class="page-inner py-5">
      <div class="d-flex align-items-left align-items-md-top flex-column flex-md-row">
        <div class="page-header text-white">
          <!-- judul halaman -->
          <h4 class="page-title text-white"><i class="fas fa-home mr-2"></i> Dashboard</h4>
        </div>
      </div>
    </div>
  </div>
  <div class="page-inner mt--5">
    <div class="row row-card-no-pd mt--2">
      <!-- menampilkan informasi jumlah data barang -->
      <div class="col-sm-12 col-md-3">
        <div class="card card-stats card-round">
          <div class="card-body ">
            <div class="row">
              <div class="col-5">
                <div class="icon-big2 text-center">
                  <i class="fas fa-map-marked-alt text-primary"></i>
                </div>
              </div>
              <div class="col-7 col-stats">
                <div class="numbers">
                  <p class="card-category">Jumlah Tempat
                    <?php 
                    // echo nama_bulan_indo(date("m"));
                     ?>    
                  </p>
                  <?php
                  // $bulan = date('m');
                  // sql statement untuk menampilkan jumlah data pada tabel "tbl_tempat"
                  $query = mysqli_query($mysqli, "SELECT * FROM tbl_tempat")
                                                  or die('Ada kesalahan pada query jumlah data : ' . mysqli_error($mysqli));
                  // ambil jumlah data dari hasil query
                  $jumlah_tempat = mysqli_num_rows($query);
                  ?>
                  <!-- tampilkan data -->
                  <h4 class="card-title"><?php echo number_format($jumlah_tempat, 0, '', '.'); ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- menampilkan informasi jumlah data -->
      <div class="col-sm-12 col-md-3">
        <div class="card card-stats card-round">
          <div class="card-body ">
            <div class="row">
              <div class="col-5">
                <div class="icon-big2 text-center">
                  <i class="fas fa-history text-success"></i>
                </div>
              </div>
              <div class="col-7 col-stats">
                <div class="numbers">
                  <p class="card-category">Jumlah Riwayat</p>
                  <?php
                  // sql statement untuk menampilkan jumlah data pada tabel "tbl_riwayat "
                  $query = mysqli_query($mysqli, "SELECT * FROM tbl_riwayat")
                                                  or die('Ada kesalahan pada query jumlah data : ' . mysqli_error($mysqli));
                  // ambil jumlah data dari hasil query
                  $jumlah_riwayat = mysqli_num_rows($query);
                  ?>
                  <!-- tampilkan data -->
                  <h4 class="card-title"><?php echo number_format($jumlah_riwayat, 0, '', '.'); ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- menampilkan informasi jumlah data -->
      <div class="col-sm-12 col-md-3">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row">
              <div class="col-5">
                <div class="icon-big2 text-center">
                  <i class="fas fa-users text-warning"></i>
                </div>
              </div>
              <div class="col-7 col-stats">
                <div class="numbers">
                  <p class="card-category">Jumlah User</p>
                  <?php
                  // sql statement untuk menampilkan jumlah data pada tabel "tbl_tempat"
                  $query = mysqli_query($mysqli, "SELECT * FROM tbl_user")or die('Ada kesalahan pada query jumlah data : ' . mysqli_error($mysqli));
                  // ambil jumlah data dari hasil query
                  $jumlah_barang_keluar = mysqli_num_rows($query);
                  ?>
                  <!-- tampilkan data -->
                  <h4 class="card-title"><?php echo number_format($jumlah_barang_keluar, 0, '', '.'); ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- menampilkan informasi jumlah data -->
      <div class="col-sm-12 col-md-3">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row">
              <div class="col-5">
                <div class="icon-big2 text-center">
                  <i class="far fa-comment-alt text-danger"></i>
                </div>
              </div>
              <div class="col-7 col-stats">
                <div class="numbers">
                  <p class="card-category">Jumlah Lapor</p>
                  <?php
                  // sql statement untuk menampilkan jumlah data pada tabel "tbl_tempat"
                  $query = mysqli_query($mysqli, "SELECT * FROM tbl_lapor")or die('Ada kesalahan pada query jumlah data : ' . mysqli_error($mysqli));
                  // ambil jumlah data dari hasil query
                  $jumlah_barang_keluar = mysqli_num_rows($query);
                  ?>
                  <!-- tampilkan data -->
                  <h4 class="card-title"><?php echo number_format($jumlah_barang_keluar, 0, '', '.'); ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- menampilkan informasi stok barang yang telah mencapai batas minimum -->
    <div class="card">
      <div class="card-header">
        <!-- judul tabel -->
        <div class="card-title"><i class="fas fa-info-circle mr-2"></i> Peta Lokasi Hutan Mangrove</div>
      </div>
      <div class="card-body">
        <div id="map1" style="width: 100%; height:500px; " ></div>
      </div>
    </div>
  </div>
<?php } ?>