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
    $id_riwayat = $_GET['id'];

    // sql statement untuk menampilkan data dari tabel "tbl_user" berdasarkan "id_riwayat"
    $query = mysqli_query($mysqli, "SELECT * FROM tbl_riwayat WHERE id_riwayat='$id_riwayat'")
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
        <div class="card-title">Ubah Riwayat</div>
      </div>
      <!-- form entri data -->
      <form action="modules/riwayat/proses_ubah.php" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
        <div class="card-body">  
          <div class="row">
            <div class="col-sm-6">
              <input type="text" value="<?=$data['id_riwayat']?>" name="id_riwayat" hidden>
              <div class="form-group">
                <label>Nama Tempat <span class="text-danger">*</span></label>
                <select name="id_tempat" id="" class="form-control" required>
                  <option value="">Pilih Tempat</option>
                  <?php 
                  $query1 = mysqli_query($mysqli, "SELECT id_tempat, nama_tempat FROM tbl_tempat") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));

                  while ($data1 = mysqli_fetch_assoc($query1)) { 
                    if ($data1['id_tempat']==$data['id_tempat']) {
                      echo "<option value='".$data1['id_tempat']."' selected>".$data1['nama_tempat']."</option>";
                    }else{
                      echo "<option value='".$data1['id_tempat']."'>".$data1['nama_tempat']."</option>";
                    }
                    ?>
                  <?php } ?>


                </select>
                <div class="invalid-feedback">Orientation tidak boleh kosong.</div>
              </div>
              <div class="form-group">
                <label>Tanggal <span class="text-danger">*</span></label>
                <input type="text" name="tanggal" class="form-control date-picker" autocomplete="off" value="<?=date('d-m-Y', strtotime($data['tanggal']))?>" required>
                <div class="invalid-feedback">Tanggal tidak boleh kosong.</div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Gambar</label>
                <input class="form-control" type="file" name="file" />
              </div>
              <div class="form-group">
                <label>status <span class="text-danger">*</span></label>
                <select name="status" id="" class="form-control" required>
                  <?php 
                  if($data['status']==1){
                    echo '<option value="1" selected>Masih Beroperasi</option>
                    <option value="2">Kerusakan</option>
                    <option value="3">Perbaikan</option>
                    ';
                  }else if($data['status']==2){
                    echo '<option value="1">Masih Beroperasi</option>
                    <option value="2" selected>Kerusakan</option>
                    <option value="3">Perbaikan</option>
                    ';
                  }else if($data['status']==3){
                    echo '<option value="1">Masih Beroperasi</option>
                    <option value="2">Kerusakan</option>
                    <option value="3" selected>Perbaikan</option>
                    ';
                  } ?>
                </select>
                <div class="invalid-feedback">Status tidak boleh kosong.</div>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label>Keterangan</label>
                <textarea id="summernote" name="keterangan"><?=$data['keterangan']?></textarea>
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



