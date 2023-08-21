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
    $id_tempat = $_GET['id'];

    // sql statement untuk menampilkan data dari tabel "tbl_user" berdasarkan "id_tempat"
    $query = mysqli_query($mysqli, "SELECT * FROM tbl_tempat WHERE id_tempat='$id_tempat'")
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
      /*color: white !important;*/
    }
  </style>

  <div id="pesan"></div>

  <div class="panel-header bg-success-gradient">
    <div class="page-inner py-4">
      <div class="page-header text-white">
        <!-- judul halaman -->
        <h4 class="page-title text-white"><i class="fas fa-file-pdf mr-2"></i></i> Tempat</h4>
        <!-- breadcrumbs -->
        <ul class="breadcrumbs">
          <li class="nav-home"><a href="?module=dashboard"><i class="flaticon-home text-white"></i></a></li>
          <li class="separator"><i class="flaticon-right-arrow"></i></li>
          <li class="nav-item"><a href="?module=tempat" class="text-white">Tempat</a></li>
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
        <div class="card-title">Ubah Tempat</div>
      </div>
      <!-- form entri data -->
      <form action="modules/tempat/proses_ubah.php" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
        <div class="card-body">  
          <div class="row">
            <div class="col-sm-6">
              <input type="text" value="<?=$id_tempat?>" name="id_tempat" hidden>
              <div class="form-group">
                <label>Nama Tempat <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_tempat" value="<?=$data['nama_tempat']?>" required/>
                <div class="invalid-feedback">Nama Tempat tidak boleh kosong.</div>
              </div>
              <div class="form-group">
                <label>Gambar</label>
                <input class="form-control" type="file" name="file" />
              </div>
              <div class="form-group">
                <label>Latitude <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="lat" id="lat" value="<?=$data['lat']?>" required/>
                <div class="invalid-feedback">Latitude tidak boleh kosong.</div>
              </div>
              <div class="form-group">
                <label>Longitude <span class="text-danger">*</span></label>
                <input class="form-control" type="text" id="lng" name="lng" value="<?=$data['lng']?>" required/>
                <div class="invalid-feedback">longitude tidak boleh kosong.</div>
              </div>
              <div class="form-group">
                <label>Lokasi <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="lokasi" value="<?=$data['lokasi']?>" required/>
                <div class="invalid-feedback">Lokasi tidak boleh kosong.</div>
              </div>
            </div>
            <div class="col-sm-6">
              <div id="map" style="height: 400px;"></div>
            </div>  
            <div class="col-sm-12">
              <div class="form-group">
                <label>Keterangan</label>
                <textarea id="summernote" name="keterangan"><?= $data['keterangan'] ?></textarea>
              </div>  
            </div>   
          </div>
          
        </div>
        <div class="card-action">
          <!-- tombol simpan data -->
          <input type="submit" name="simpan" value="Simpan" class="btn btn-success btn-round pl-4 pr-4 mr-2">
          <!-- tombol kembali ke halaman data barang masuk -->
          <a href="?module=tempat" class="btn btn-default text-white btn-round pl-4 pr-4">Batal</a>
        </div>
      </form>
    </div>
  </div>
<?php } ?>



