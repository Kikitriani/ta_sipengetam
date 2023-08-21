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
  include "notif.php";
?>
  <style>
    .btn-success {
      background: #009000 !important;
      border-color: #009000 !important;
      color: #ffffff !important;
    }
    .btn-success:hover, .btn-success:focus, .btn-success:disabled {
        background: #009000 !important;
        border-color: #009000 !important;
    }
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
  <div class="panel-header bg-success-gradient">
    <div class="page-inner py-45">
      <div class="d-flex align-items-left align-items-md-top flex-column flex-md-row">
        
        <?php include "page_header.php"; ?>
        
        <div class="ml-md-auto py-2 py-md-0">
           <!--tombol entri data -->
          <a href="?module=form_entri_monitoring" class="btn btn-putih btn-round">
            <span class="btn-label"><i class="fa fa-plus mr-2"></i></span> Entri Data
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="page-inner mt--5">
    <div class="card">
      <div class="card-header">
        <!-- judul tabel -->
        <div class="card-title">
            Info Pembibitan Mangrove
            <div class="pull-right">
                <!-- tombol entri data -->
                <!--<a href="?module=form_entri_monitoring" class="btn btn-success btn-round">-->
                <!--    <span class="btn-label"><i class="fa fa-plus mr-2"></i></span> Entri Data-->
                <!--</a>-->
            </div>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <!-- tabel untuk menampilkan data dari database -->
          <table class="tabel-mangrove display table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th class="text-center">No.</th>
                <th class="text-center">Gambar</th>
                <th class="text-center">Tanggal Tanam</th>
                <th class="text-center">Nama Tempat</th>
                <th class="text-center">Detail Pohon</th>
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
                  $where = "WHERE a.id_tempat=$id_tempat";
              }
              $no = 1;
              $query = mysqli_query($mysqli, "SELECT *, a.foto AS gambar_monitoring FROM tbl_pohon a LEFT JOIN tbl_tempat b ON b.id_tempat=a.id_tempat $where ORDER BY a.id_pohon DESC") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));

              while ($data = mysqli_fetch_assoc($query)) { ?>
                <tr>
                  <td width="30" class="text-center"><?php echo $no++; ?></td>
                  <td width="100" class="text-center"><img class="thumbnail" width="100" height="60px" src="./assets/img/tempat/<?=$data['gambar_monitoring']?>" /></td>
                  <td width="100"><?php echo nama_hari_indo($data['tgl_tanam']).', '.tanggal_indo($data['tgl_tanam']); ?></td>
                  <td width="150"><?php echo $data['nama_tempat']; ?></td>
                  <td width="250" class="text-center"><?php echo "Jenis Pohon <b>".$data['jenis']."</b><br>Jumlah bibit sebanyak <b>".$data['jumlah_bibit']." Batang</b><br>Usia bibit <b>".$data['usia_tanam']." Bulan</b>"; ?></td>
                  <td width="120" class="text-center">
                    <div>                      
                      <!-- tombol detail monitoring -->
                      <a href="?module=detail_monitoring&id=<?php echo $data['id_pohon']; ?>" style="margin-right:5px" data-toggle="tooltip" data-placement="top" title="Detail" class="btn btn-icon btn-round btn-success btn-sm" >
                        <i class="fas fa-chart-line fa-sm"></i>
                      </a>
                      <!-- tombol edit monitoring -->
                      <a href="?module=form_ubah_monitoring&id=<?php echo $data['id_pohon']; ?>" style="margin-right:5px" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-icon btn-round btn-info btn-sm" >
                        <i class="fas fa-pencil-alt fa-sm"></i>
                      </a>
                      <!-- tombol hapus data -->
                      <a href="modules/monitoring/proses_hapus.php?id_pohon=<?php echo $data['id_pohon']; ?>" onclick="return confirm('Anda yakin ingin menghapus data dengan id <?php echo $data['id_pohon']; ?>?')" class="btn btn-icon btn-round btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus">
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
<?php 
} 
?>