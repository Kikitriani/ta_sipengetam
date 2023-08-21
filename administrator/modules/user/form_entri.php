<?php
// mencegah direct access file PHP agar file PHP tidak bisa diakses secara langsung dari browser dan hanya dapat dijalankan ketika di include oleh file lain
// jika file diakses secara langsung
if (basename($_SERVER['PHP_SELF']) === basename(__FILE__)) {
  // alihkan ke halaman error 404
  header('location: 404.html');
}
// jika file di include oleh file lain, tampilkan isi file
else { ?>
  <div class="panel-header bg-success-gradient">
    <div class="page-inner py-4">
      <div class="page-header text-white">
        <!-- judul halaman -->
        <h4 class="page-title text-white"><i class="fas fa-user mr-2"></i> Manajemen User</h4>
        <!-- breadcrumbs -->
        <ul class="breadcrumbs">
          <li class="nav-home"><a href="?module=dashboard"><i class="flaticon-home text-white"></i></a></li>
          <li class="separator"><i class="flaticon-right-arrow"></i></li>
          <li class="nav-item"><a href="?module=user" class="text-white">User</a></li>
          <li class="separator"><i class="flaticon-right-arrow"></i></li>
          <li class="nav-item"><a>Entri</a></li>
        </ul>
      </div>
    </div>
  </div>

  <div class="page-inner mt--5">
    <div class="card">
      <div class="card-header">
        <!-- judul form -->
        <div class="card-title">Entri Data User</div>
      </div>
      <!-- form entri data -->
      <form action="modules/user/proses_entri.php" method="post" class="needs-validation" novalidate>
        <div class="card-body">
          <div class="row">

            <div class="col-md-4">
              <div class="form-group">
                <label>Nama User <span class="text-danger">*</span></label>
                <input type="text" name="nama_user" class="form-control" autocomplete="off" required>
                <div class="invalid-feedback">Nama user tidak boleh kosong.</div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>Username <span class="text-danger">*</span></label>
                <input type="text" name="username" class="form-control" autocomplete="off" required>
                <div class="invalid-feedback">Username tidak boleh kosong.</div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Password <span class="text-danger">*</span></label>
                <input type="password" name="password" class="form-control" autocomplete="off" required>
                <div class="invalid-feedback">Password tidak boleh kosong.</div>
              </div>
            </div>
            <?php 
            if($_SESSION['hak_akses']=="Super Admin"){
            ?>  
            <div class="col-md-4">
              <div class="form-group">
                <label>Hak Akses <span class="text-danger">*</span></label>
                <select name="hak_akses" class="form-control" autocomplete="off" required>
                  <option selected disabled value="">Pilih Hak Akses</option>
                  <option value="Administrator">Administrator</option>
                </select>
                <div class="invalid-feedback">Hak akses tidak boleh kosong.</div>
              </div>
            </div>
            <?php } ?>
            <div class="col-md-8">
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
                <div class="invalid-feedback">Nama Tempat tidak boleh kosong.</div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-action">
          <!-- tombol simpan data -->
          <input type="submit" name="simpan" value="Simpan" class="btn btn-success btn-round pl-4 pr-4 mr-2">
          <!-- tombol kembali ke halaman data user -->
          <a href="?module=user" class="btn btn-default btn-round pl-4 pr-4">Batal</a>
        </div>
      </form>
    </div>
  </div>
  <?php } ?>