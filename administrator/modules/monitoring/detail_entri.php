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
    
        // sql statement untuk menampilkan data dari tabel "tbl_user" berdasarkan "id_pohon"
        $query = mysqli_query($mysqli, "SELECT * FROM tbl_pohon a LEFT JOIN tbl_tempat b ON a.id_tempat=b.id_tempat WHERE a.id_pohon='$id_pohon'")
        or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
        // ambil data hasil query
        $data = mysqli_fetch_assoc($query);
    }
  ?>

  <style>
    .btn-default{
      color: black !important;
    }
    .white{
      color: white !important;
    }
  </style>

  <div id="pesan"></div>

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
      </div>
    </div>
  </div>

  <div class="page-inner mt--5">
    <div class="card">
      <div class="card-header">
        <!-- judul form -->
        <div class="card-title">Tambah Monitoring <?=$data['nama_tempat']?></div>
      </div>
      <!-- form entri data -->
      <form action="modules/monitoring/proses_entri.php" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
        <div class="card-body">  
          <div class="row">
            <div class="col-sm-6">
                <input class="form-control" type="text" value="<?=$id_pohon?>" name="id_pohon" required hidden/>
              <div class="form-group">
                <label>Tanggal Monitoring <span class="text-danger">*</span></label>
                <input type="text" name="tanggal" class="form-control date-picker" autocomplete="off" value="<?php echo date("d-m-Y"); ?>" required>
                <div class="invalid-feedback">Tanggal Monitoring tidak boleh kosong.</div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Gambar <span class="text-danger">*</span></label>
                <input class="form-control" type="file" name="file" required/>
                <div class="invalid-feedback">Gambar tidak boleh kosong.</div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Tinggi Rata - Rata (cm)<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="tinggi" required/>
                <div class="invalid-feedback">Tinggi Rata - Rata tidak boleh kosong.</div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Diameter (cm)<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="diameter" required/>
                <div class="invalid-feedback">Diameter tidak boleh kosong.</div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Persentase Tumbuh<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="persentase_tumbuh" required/>
                <div class="invalid-feedback">Persentase Tumbuh tidak boleh kosong.</div>
              </div>
            </div>
            
            <div class="col-sm-12">
              <div class="form-group">
                <label>Keterangan</label>
                <textarea id="summernote" name="keterangan"></textarea>
              </div>  
            </div>   
          </div>
          
        </div>
        <div class="card-action">
          <!-- tombol simpan data -->
          <input type="submit" name="simpan_log" value="Simpan" class="btn btn-success btn-round pl-4 pr-4 mr-2">
          <!-- tombol kembali ke halaman data barang masuk -->
          <a href="?module=detail_monitoring&id=<?=$data['id_tempat']?>" class="btn btn-default white btn-round pl-4 pr-4">Batal</a>
        </div>
      </form>
    </div>
  </div>
<?php } ?>



