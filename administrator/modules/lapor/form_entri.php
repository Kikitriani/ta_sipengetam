<?php
// mencegah direct access file PHP agar file PHP tidak bisa diakses secara langsung dari browser dan hanya dapat dijalankan ketika di include oleh file lain
// jika file diakses secara langsung
if (basename($_SERVER['PHP_SELF']) === basename(__FILE__)) {
  // alihkan ke halaman error 404
  header('location: 404.html');
}
// jika file di include oleh file lain, tampilkan isi file
else { ?>

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
        <h4 class="page-title text-white"><i class="fas fa-file-pdf mr-2"></i></i> Riwayat</h4>
        <!-- breadcrumbs -->
        <ul class="breadcrumbs">
          <li class="nav-home"><a href="?module=dashboard"><i class="flaticon-home text-white"></i></a></li>
          <li class="separator"><i class="flaticon-right-arrow"></i></li>
          <li class="nav-item"><a href="?module=riwayat" class="text-white">Riwayat</a></li>
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
        <div class="card-title">Tambah Riwayat</div>
      </div>
      <!-- form entri data -->
      <form action="modules/riwayat/proses_entri.php" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
        <div class="card-body">  
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label>Nama Tempat <span class="text-danger">*</span></label>
                <select name="id_tempat" id="" class="form-control" required>
                  <option value="">Pilih Tempat</option>
                  <?php 
                  // include '../../config/database.php';
                  $query = mysqli_query($mysqli, "SELECT id_tempat, nama_tempat FROM tbl_tempat") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));

                  while ($data = mysqli_fetch_assoc($query)) { ?>
                    <option value="<?=$data['id_tempat']?>"><?=$data['nama_tempat']?></option>
                  <?php } ?>


                </select>
                <div class="invalid-feedback">Orientation tidak boleh kosong.</div>
              </div>
              <div class="form-group">
                <label>Tanggal <span class="text-danger">*</span></label>
                <input type="text" name="tanggal" class="form-control date-picker" autocomplete="off" value="<?php echo date("d-m-Y"); ?>" required>
                <div class="invalid-feedback">Tanggal tidak boleh kosong.</div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Gambar <span class="text-danger">*</span></label>
                <input class="form-control" type="file" name="file" />
              </div>
              <div class="form-group">
                <label>status <span class="text-danger">*</span></label>
                <select name="status" id="" class="form-control" required>
                  <option value="">Pilih Status</option>
                  <option value="1">Masih Beroperasi</option>
                  <option value="2">Kerusakan</option>
                  <option value="3">Perbaikan</option>
                </select>
                <div class="invalid-feedback">Status tidak boleh kosong.</div>
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
          <input type="submit" name="simpan" value="Simpan" class="btn btn-success btn-round pl-4 pr-4 mr-2">
          <!-- tombol kembali ke halaman data barang masuk -->
          <a href="?module=riwayat" class="btn btn-default white btn-round pl-4 pr-4">Batal</a>
        </div>
      </form>
    </div>
  </div>
<?php } ?>



