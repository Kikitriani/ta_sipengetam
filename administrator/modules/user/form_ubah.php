<?php
// mencegah direct access file PHP agar file PHP tidak bisa diakses secara langsung dari browser dan hanya dapat dijalankan ketika di include oleh file lain
// jika file diakses secara langsung
if (basename($_SERVER['PHP_SELF']) === basename(__FILE__)) {
  // alihkan ke halaman error 404
  header('location: 404.html');
}
// jika file di include oleh file lain, tampilkan isi file
else {
  // mengecek data GET "id_user"
  if (isset($_GET['id'])) {
    // ambil data GET dari tombol ubah
    $id_user = $_GET['id'];

    // sql statement untuk menampilkan data dari tabel "tbl_user" berdasarkan "id_user"
    $query = mysqli_query($mysqli, "SELECT * FROM tbl_user WHERE id_user='$id_user'")
    or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
    // ambil data hasil query
    $data = mysqli_fetch_assoc($query);
  }
  ?>
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
          <li class="nav-item"><a>Ubah</a></li>
        </ul>
      </div>
    </div>
  </div>

  <div class="page-inner mt--5">
    <div class="card">
      <div class="card-header">
        <!-- judul form -->
        <div class="card-title">Ubah Data User</div>
      </div>
      <!-- form ubah data -->
      <form action="modules/user/proses_ubah.php" method="post" class="needs-validation" novalidate>
        <div class="card-body">
          <input type="hidden" name="id_user" value="<?php echo $data['id_user']; ?>">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Nama User <span class="text-danger">*</span></label>
                <input type="text" name="nama_user" class="form-control" autocomplete="off" value="<?php echo $data['nama_user']; ?>" required>
                <div class="invalid-feedback">Nama user tidak boleh kosong.</div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>Username <span class="text-danger">*</span></label>
                <input type="text" name="username" class="form-control" autocomplete="off" value="<?php echo $data['username']; ?>" required>
                <div class="invalid-feedback">Username tidak boleh kosong.</div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Kosongkan password jika tidak diubah" autocomplete="off">
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>Hak Akses <span class="text-danger">*</span></label>
                <select name="hak_akses" class="form-control" autocomplete="off" required>  <!-- chosen-select -->
                  <option value="<?php echo $data['hak_akses']; ?>"><?php echo $data['hak_akses']; ?></option>
                  <?php 
                  if ($data['hak_akses']=="Super Admin") {
                    echo '
                    <option value="Administrator">Administrator</option>
                    ';
                  }
                  ?>
                </select>
                <div class="invalid-feedback">Hak akses tidak boleh kosong.</div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="form-group">
                <label>Nama Tempat <span class="text-danger">*</span></label>
                <select name="id_tempat" id="" class="form-control" required>
                  <?php 
                  $query1 = mysqli_query($mysqli, "SELECT id_tempat, nama_tempat FROM tbl_tempat") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));

                  while ($data1 = mysqli_fetch_assoc($query1)) { ?>
                    <option value="<?=$data1['id_tempat']?>" <?php if($data1['id_tempat']==$data['id_tempat']){echo 'selected="selected"';} ?>><?=$data1['nama_tempat']?></option>
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