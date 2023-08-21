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
        <h4 class="page-title text-white"><i class="fas fa-book-open mr-2"></i></i> Edukasi</h4>
        <!-- breadcrumbs -->
        <ul class="breadcrumbs">
          <li class="nav-home"><a href="?module=dashboard"><i class="flaticon-home text-white"></i></a></li>
          <li class="separator"><i class="flaticon-right-arrow"></i></li>
          <li class="nav-item"><a href="?module=edukasi" class="text-white">Edukasi</a></li>
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
        <div class="card-title">Tambah Edukasi</div>
      </div>
      <!-- form entri data -->
      <form action="modules/edukasi/proses_entri.php" method="post" class="form-validate-summernote needs-validation" enctype="multipart/form-data" novalidate>
        <div class="card-body">  
          <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Judul <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="judul" value="" required/>
                    <div class="invalid-feedback">Judul tidak boleh kosong.</div>
                </div>  
            </div>
            
            <div class="col-sm-12">
              <div class="form-group">
                <label>Keterangan<span class="text-danger">*</span></label>
                <textarea id="summernote"class="form-control" name="keterangan" required></textarea>
                <div class="invalid-feedback">Keterangan tidak boleh kosong.</div>
              </div>  
            </div>
        </div>
        <div class="card-action">
          <!-- tombol simpan data -->
          <input type="submit" name="simpan" value="Simpan" class="btn btn-success btn-round pl-4 pr-4 mr-2">
          <!-- tombol kembali ke halaman data barang masuk -->
          <a href="?module=edukasi" class="btn btn-default white btn-round pl-4 pr-4">Batal</a>
        </div>
      </form>
    </div>
  </div>
<?php } ?>
