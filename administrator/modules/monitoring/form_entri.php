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
      <?php include "page_header.php"; ?>
    </div>
  </div>

  <div class="page-inner mt--5">
    <div class="card">
      <div class="card-header">
        <!-- judul form -->
        <div class="card-title">Tambah Monitoring Mangrove</div>
      </div>
      <!-- form entri data -->
      <form action="modules/monitoring/proses_entri.php" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
        <div class="card-body">  
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label>Nama Tempat <span class="text-danger">*</span></label>
                <select name="id_tempat" id="" class="form-control" required>
                  <?php 
                    if($_SESSION['hak_akses']=="Super Admin"){
                        $where = "";
                        echo '<option value="">Pilih Tempat</option>';
                    }else{
                        $id_tempat = $_SESSION['id_tempat'];
                        $where = "WHERE id_tempat=$id_tempat";
                    }
                  // include '../../config/database.php';
                  $query = mysqli_query($mysqli, "SELECT id_tempat, nama_tempat FROM tbl_tempat $where") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));

                  while ($data = mysqli_fetch_assoc($query)) { ?>
                    <option value="<?=$data['id_tempat']?>"><?=$data['nama_tempat']?></option>
                  <?php } ?>


                </select>
                <div class="invalid-feedback">Nama Tempat tidak boleh kosong.</div>
              </div>
              <div class="form-group">
                <label>Tanggal <span class="text-danger">*</span></label>
                <input type="text" name="tanggal" class="form-control date-picker" autocomplete="off" value="<?php echo date("d-m-Y"); ?>" required>
                <div class="invalid-feedback">Tanggal tidak boleh kosong.</div>
              </div>
            </div>
            
            <div class="col-sm-4">
              <div class="form-group">
                <label>Gambar <span class="text-danger">*</span></label>
                <input class="form-control" type="file" name="file" required/>
                <div class="invalid-feedback">Gambar tidak boleh kosong.</div>
              </div>
              <!--<div class="form-group">-->
              <!--  <label>Jenis Pohon <span class="text-danger">*</span></label>-->
              <!--  <select name="jenis" id="" class="form-control" required>-->
              <!--    <option value="">Pilih Jenis Pohon</option>-->
              <!--    <option value="Lumnitzera">Lumnitzera</option>-->
              <!--    <option value="Excoaria">Excoaria</option>-->
              <!--    <option value="Xylocarpus">Xylocarpus</option>-->
              <!--  </select>-->
              <!--  <div class="invalid-feedback">Jenis Pohon tidak boleh kosong.</div>-->
              <!--</div>-->
              <div class="form-group">
                <label>Jenis Pohon <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="jenis" required/>
                <div class="invalid-feedback">Jenis Pohon tidak boleh kosong.</div>
              </div>
            </div>
            
            <div class="col-sm-4">
              <div class="form-group">
                <label>Usia Pohon (Bulan) <span class="text-danger">*</span></label>
                <input class="form-control" type="number" name="usia" required/>
                <div class="invalid-feedback">Usia Pohon tidak boleh kosong.</div>
              </div>
              <div class="form-group">
                <label>Jumlah Bibit (Batang) <span class="text-danger">*</span></label>
                <input class="form-control" type="number" name="jumlah" required/>
                <div class="invalid-feedback">Jumlah Bibit tidak boleh kosong.</div>
              </div>
            </div>
            
            <!--<div class="col-sm-12">-->
            <!--  <div class="form-group">-->
            <!--    <label>Keterangan</label>-->
            <!--    <textarea id="summernote" name="keterangan"></textarea>-->
            <!--  </div>  -->
            <!--</div>   -->
          </div>
          
        </div>
        <div class="card-action">
          <!-- tombol simpan data -->
          <input type="submit" name="simpan" value="Simpan" class="btn btn-success btn-round pl-4 pr-4 mr-2">
          <!-- tombol kembali ke halaman data barang masuk -->
          <a href="?module=monitoring" class="btn btn-default white btn-round pl-4 pr-4">Batal</a>
        </div>
      </form>
    </div>
  </div>
<?php } ?>



