<?php
// mencegah direct access file PHP agar file PHP tidak bisa diakses secara langsung dari browser dan hanya dapat dijalankan ketika di include oleh file lain
// jika file diakses secara langsung
if (basename($_SERVER['PHP_SELF']) === basename(__FILE__)) {
  // alihkan ke halaman error 404
  header('location: 404.html');
}
// jika file di include oleh file lain, tampilkan isi file
else { 
  if (isset($_GET['id'])) {
    // ambil data GET dari tombol ubah
    $id_pohon = $_GET['id'];

    $query = mysqli_query($mysqli, "SELECT * FROM tbl_pohon a LEFT JOIN tbl_tempat b ON a.id_tempat=b.id_tempat WHERE id_pohon='$id_pohon'")
    or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
    // ambil data hasil query
    $data = mysqli_fetch_assoc($query);
  }
  include "notif.php";
  ?>

  <style>
    .btn-putih {
      background: #f8f9fa !important;
      border-color: #f8f9fa !important;
      color: #009000 !important;
    }
    .btn-putih:hover, .btn-putih:focus, .btn-putih:disabled {
        background: #f8f9fa !important;
        border-color: #f8f9fa !important;
    }
  </style>
  
  

  <!--<div id="pesan"></div>-->

  <div class="panel-header bg-success-gradient">
    <div class="page-inner py-4">
      <div class="page-header text-white">
        <!-- judul halaman -->
        <h4 class="page-title text-white"><i class="fas fa-chart-line mr-2"></i></i> Monitoring Mangrove</h4>
        <!-- breadcrumbs -->
        <ul class="breadcrumbs">
          <li class="nav-home"><a href="?module=dashboard"><i class="flaticon-home text-white"></i></a></li>
          <li class="separator"><i class="flaticon-right-arrow"></i></li>
          <li class="nav-item"><a href="?module=monitoring" class="text-white">Monitoring Mangrove</a></li>
          <li class="separator"><i class="flaticon-right-arrow"></i></li>
          <li class="nav-item"><a>Data</a></li>
        </ul>
        <div class="ml-md-auto py-2 py-md-0">
           <!--tombol entri data -->
          <a href="?module=detail_entri_monitoring&id=<?=$id_pohon?>" class="btn btn-putih btn-round">
            <span class="btn-label"><i class="fa fa-plus mr-2"></i></span> Entri Data
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="page-inner mt--5">
    <div class="card">
      <div class="card-header">
         <!--judul tabel -->
        <div class="card-title">
            Monitoring <?=$data['nama_tempat']?>
            <!--<div class="pull-right">-->
                 <!--tombol entri data -->
            <!--    <a href="?module=form_entri_monitoring" class="btn btn-success btn-round">-->
            <!--        <span class="btn-label"><i class="fa fa-plus mr-2"></i></span> Entri Data-->
            <!--    </a>-->
            <!--</div>-->
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
           <!--tabel untuk menampilkan data dari database -->
          <table class="tabel-mangrove display table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th class="text-center">No.</th>
                <th class="text-center">Gambar</th>
                <th class="text-center">Tanggal Monitoring</th>
                <th class="text-center">Detail Monitoring</th>
                <th class="text-center">Keterangan</th> 
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if($_SESSION['hak_akses']=="Super Admin"){
                  $where = "WHERE a.id_pohon=$id_pohon";
              }else{
                  $id_tempat = $_SESSION['id_tempat'];
                  $where = "WHERE a.id_pohon=$id_pohon AND b.id_tempat=$id_tempat";
              }
              $no = 1;
              $query = mysqli_query($mysqli, "SELECT * FROM tbl_log_pohon a LEFT JOIN tbl_pohon b ON a.id_pohon=b.id_pohon $where ORDER BY a.id_pohon DESC") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));

              while ($data = mysqli_fetch_assoc($query)) { ?>
                <tr>
                  <td width="40" class="text-center"><?php echo $no++; ?></td>
                  <td width="100" class="text-center"><img class="thumbnail" width="100" height="60px" src="./assets/img/tempat/<?=$data['foto_log']?>" /></td>
                  <td width="100"><?php echo nama_hari_indo($data['tgl_monitor']).', '.tanggal_indo($data['tgl_monitor']); ?></td>
                  <td width="200">
                      <?php 
                      echo "Tinggi rata-rata pohon <b>".$data['tinggi']." cm </b><br>"; 
                      echo "Diameter rata-rata pohon <b>".$data['diameter']." cm </b><br>"; 
                      echo "Persentase tumbuh sebesar <b>".$data['persentase_tumbuh']."</b><br>"; 
                      ?>
                  </td>
                  <td width="200"><?php echo $data['keterangan']; ?></td>
                  <td width="100" class="text-center">
                    <div>                      
                       <!--tombol edit monitoring -->
                      <a href="?module=detail_ubah_monitoring&id=<?php echo $data['id_log']; ?>" style="margin-right:5px" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-icon btn-round btn-info btn-sm" >
                        <i class="fas fa-pencil-alt fa-sm"></i>
                      </a>
                       <!--tombol hapus data -->
                      <a href="modules/monitoring/proses_hapus.php?id_log=<?php echo $data['id_log']; ?>" onclick="return confirm('Anda yakin ingin menghapus data dengan id <?php echo $data['id_pohon']; ?>?')" class="btn btn-icon btn-round btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus">
                        <i class="fas fa-trash fa-sm"></i>
                      </a>
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
<?php } ?>



