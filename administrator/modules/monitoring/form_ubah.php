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
    $query = mysqli_query($mysqli, "SELECT * FROM tbl_pohon WHERE id_pohon='$id_pohon'")
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
        <div class="card-title">Ubah Pembibitan Mangrove</div>
      </div>
      <!-- form entri data -->
      <form action="modules/monitoring/proses_ubah.php" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
        <div class="card-body">  
          <div class="row">
            <div class="col-sm-4">
              <input type="text" value="<?=$data['id_pohon']?>" name="id_pohon" hidden>
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
                  $query1 = mysqli_query($mysqli, "SELECT id_tempat, nama_tempat FROM tbl_tempat $where") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));

                  while ($data1 = mysqli_fetch_assoc($query1)) { 
                    if ($data1['id_tempat']==$data['id_tempat']) {
                      echo "<option value='".$data1['id_tempat']."' selected>".$data1['nama_tempat']."</option>";
                    }else{
                      echo "<option value='".$data1['id_tempat']."'>".$data1['nama_tempat']."</option>";
                    }
                    ?>
                  <?php } ?>


                </select>
                <div class="invalid-feedback">Nama Tempat tidak boleh kosong.</div>
              </div>
              <div class="form-group">
                <label>Tanggal <span class="text-danger">*</span></label>
                <input type="text" name="tanggal" class="form-control date-picker" autocomplete="off" value="<?=date('d-m-Y', strtotime($data['tgl_tanam']))?>" required>
                <div class="invalid-feedback">Tanggal tidak boleh kosong.</div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Gambar</label>
                <input class="form-control" type="file" name="file" />
              </div>
              <div class="form-group">
                <label>Jenis Pohon <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="jenis" value="<?=$data['jenis']?>" required/>
                <div class="invalid-feedback">Jenis Pohon tidak boleh kosong.</div>
              </div>
            </div> 
            
            <div class="col-sm-4">
              <div class="form-group">
                <label>Usia Pohon (Bulan) <span class="text-danger">*</span></label>
                <input class="form-control" type="number" name="usia" value="<?=$data['usia_tanam']?>" required/>
                <div class="invalid-feedback">Usia Pohon tidak boleh kosong.</div>
              </div>
              <div class="form-group">
                <label>Jumlah Bibit (Batang) <span class="text-danger">*</span></label>
                <input class="form-control" type="number" name="jumlah" value="<?=$data['jumlah_bibit']?>" required/>
                <div class="invalid-feedback">Jumlah Bibit tidak boleh kosong.</div>
              </div>
            </div>
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



