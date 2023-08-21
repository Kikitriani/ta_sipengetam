<?php
// mencegah direct access file PHP agar file PHP tidak bisa diakses secara langsung dari browser dan hanya dapat dijalankan ketika di include oleh file lain
// jika file diakses secara langsung
if (basename($_SERVER['PHP_SELF']) === basename(__FILE__)) {
  // alihkan ke halaman error 404
  header('location: 404.html');
}
// jika file di include oleh file lain, tampilkan isi file
else {
  // menampilkan pesan sesuai dengan proses yang dijalankan
  // jika pesan tersedia
  if (isset($_GET['pesan'])) {
    // jika pesan = 1
    if ($_GET['pesan'] == 1) {
      // tampilkan pesan sukses simpan data
      echo '<div class="alert alert-notify alert-success alert-dismissible fade show" role="alert">
              <span data-notify="icon" class="fas fa-check"></span> 
              <span data-notify="title" class="text-success">Sukses!</span> 
              <span data-notify="message">Data berhasil disimpan.</span>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
    }
    // jika pesan = 2
    elseif ($_GET['pesan'] == 2) {
      // tampilkan pesan sukses hapus data
      echo '<div class="alert alert-notify alert-success alert-dismissible fade show" role="alert">
              <span data-notify="icon" class="fas fa-check"></span> 
              <span data-notify="title" class="text-success">Sukses!</span> 
              <span data-notify="message">Data berhasil dihapus.</span>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
    }
    // jika pesan = 3
    elseif ($_GET['pesan'] == 3) {
      // tampilkan pesan sukses hapus data
      echo '<div class="alert alert-notify alert-success alert-dismissible fade show" role="alert">
              <span data-notify="icon" class="fas fa-check"></span> 
              <span data-notify="title" class="text-success">Sukses!</span> 
              <span data-notify="message">Data berhasil diubah.</span>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
    }
  }
?>
  <style>
    .btn-success {
      background: #f8f9fa !important;
      border-color: #f8f9fa !important;
      color: #009000 !important;
    }
    .btn-success:hover, .btn-success:focus, .btn-success:disabled {
        background: #f8f9fa !important;
        border-color: #f8f9fa !important;
    }
  </style>
  <div class="panel-header bg-success-gradient">
    <div class="page-inner py-45">
      <div class="d-flex align-items-left align-items-md-top flex-column flex-md-row">
        <div class="page-header text-white">
          <!-- judul halaman -->
          <h4 class="page-title text-white"><i class="fas fa-map-marked-alt mr-2"></i></i> Tempat</h4>
          <!-- breadcrumbs -->
          <ul class="breadcrumbs">
            <li class="nav-home"><a href="?module=dashboard"><i class="flaticon-home text-white"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="?module=tempat" class="text-white">Tempat</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a>Data</a></li>
          </ul>
        </div>
        <div class="ml-md-auto py-2 py-md-0">
            <!-- tombol entri data -->
            <?php
            if($_SESSION['hak_akses']=="Super Admin"){ ?>
                <a href="?module=form_entri_tempat" class="btn btn-success btn-round">
                    <span class="btn-label"><i class="fa fa-plus mr-2"></i></span> Entri Data
                </a>
                <?php
            }
            ?>
          
        </div>
      </div>
    </div>
  </div>

  <div class="page-inner mt--5">
    <div class="card">
      <div class="card-header">
        <!-- judul tabel -->
        <div class="card-title">Info Lokasi</div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <!-- tabel untuk menampilkan data dari database -->
          <table id="tabel-dokumen" class="display table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th class="text-center">No.</th>
                <th class="text-center">Gambar</th>
                <th class="text-center">Nama Tempat</th>
                <th class="text-center">Lat</th>
                <th class="text-center">Lng</th>
                <th class="text-center">Lokasi</th>
                <!-- <th class="text-center">Keterangan</th> -->
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if($_SESSION['hak_akses']=="Super Admin"){
                  $where = "";
              }else{
                  $id_tempat = $_SESSION['id_tempat'];
                  $where = "WHERE id_tempat=$id_tempat";
              }
              $no = 1;
              $query = mysqli_query($mysqli, "SELECT * FROM tbl_tempat $where ORDER BY id_tempat DESC") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));

              while ($data = mysqli_fetch_assoc($query)) { ?>
                <tr>
                  <td width="40" class="text-center"><?php echo $no++; ?></td>
                  <td width="100" class="text-center"><img class="thumbnail" width="100" height="60px" src="./assets/img/tempat/<?= $data['gambar'] ?>" /></td>
                  <td width="200"><?php echo $data['nama_tempat']; ?></td>
                  <td width="100"><?php echo $data['lat']; ?></td>
                  <td width="100"><?php echo $data['lng']; ?></td>
                  <td width="200"><?php echo $data['lokasi']; ?></td>
                  <td width="150" class="text-center">
                    <div>                      
                      <!-- tombol edit tempat -->
                      <a href="?module=form_ubah_tempat&id=<?php echo $data['id_tempat']; ?>" style="margin-right:5px" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-icon btn-round btn-info btn-sm" >
                        <i class="fas fa-pencil-alt fa-sm"></i>
                      </a>
                        <?php
                        if($_SESSION['hak_akses']=="Super Admin"){ ?>
                            <!-- tombol hapus data -->
                            <a href="modules/tempat/proses_hapus.php?id=<?php echo $data['id_tempat']; ?>" onclick="return confirm('Anda yakin ingin menghapus data dengan id <?php echo $data['id_tempat']; ?>?')" class="btn btn-icon btn-round btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus">
                                <i class="fas fa-trash fa-sm"></i>
                            </a> <?php
                        }
                        ?>
                      
                    </div>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
<?php 
} 
?>