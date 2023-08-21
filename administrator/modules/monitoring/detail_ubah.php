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
    $id_log = $_GET['id'];

    // sql statement untuk menampilkan data dari tabel "tbl_user" berdasarkan "id_log"
    $query = mysqli_query($mysqli, "SELECT *, a.keterangan AS ket_log, a.id_pohon AS id_pohon_log FROM tbl_log_pohon a 
    LEFT JOIN tbl_pohon b ON a.id_pohon=b.id_pohon 
    LEFT JOIN tbl_tempat c ON b.id_tempat=c.id_tempat 
    WHERE a.id_log='$id_log'")
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
      <?php include "page_header.php"; ?>
    </div>
  </div>

  <div class="page-inner mt--5">
    <div class="card">
      <div class="card-header">
        <!-- judul form -->
        <div class="card-title">Ubah Monitoring <?=$data['nama_tempat']?></div>
      </div>
      <!-- form entri data -->
      <form action="modules/monitoring/proses_ubah.php" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
        <div class="card-body">  
          <div class="row">
            <div class="col-sm-6">
              <input type="text" value="<?=$id_log?>" name="id_log" hidden>
              <input type="text" value="<?=$data['id_pohon_log']?>" name="id_pohon" hidden>
              <div class="form-group">
                <label>Tanggal Monitoring<span class="text-danger">*</span></label>
                <input type="text" name="tanggal" class="form-control date-picker" autocomplete="off" value="<?=date('d-m-Y', strtotime($data['tgl_monitor']))?>" required>
                <div class="invalid-feedback">Tanggal tidak boleh kosong.</div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Gambar</label>
                <input class="form-control" type="file" name="file" />
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Tinggi Rata - Rata (cm)<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="tinggi" value="<?=$data['tinggi']?>" required/>
                <div class="invalid-feedback">Tinggi Rata - Rata tidak boleh kosong.</div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Diameter (cm)<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="diameter" value="<?=$data['diameter']?>" required/>
                <div class="invalid-feedback">Diameter tidak boleh kosong.</div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Persentase Tanam<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="persentase_tanam" value="<?=$data['persentase_tanam']?>" required/>
                <div class="invalid-feedback">Persentase Tanam tidak boleh kosong.</div>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label>Keterangan</label>
                <textarea id="summernote" name="keterangan"><?=$data['ket_log']?></textarea>
              </div>  
            </div>   
          </div>
          
        </div>
        <div class="card-action">
          <!-- tombol simpan data -->
          <input type="submit" name="simpan_log" value="Simpan" class="btn btn-success btn-round pl-4 pr-4 mr-2">
          <!-- tombol kembali ke halaman data barang masuk -->
          <a href="?module=detail&id=$id_log" class="btn btn-default white btn-round pl-4 pr-4">Batal</a>
        </div>
      </form>
    </div>
  </div>
<?php } ?>



