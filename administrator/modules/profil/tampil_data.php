<?php
// mencegah direct access file PHP agar file PHP tidak bisa diakses secara langsung dari browser dan hanya dapat dijalankan ketika di include oleh file lain
// jika file diakses secara langsung
if (basename($_SERVER['PHP_SELF']) === basename(__FILE__)) {
  // alihkan ke halaman error 404
  header('location: 404.html');
}
// jika file di include oleh file lain, tampilkan isi file
else {
  // menampilkan pesan sesuai dengan proses yang dijalankan
  // jika pesan tersedia
  if (isset($_GET['pesan'])) {
    // jika pesan = 1
    if ($_GET['pesan'] == 1) {
      // tampilkan pesan sukses simpan data
      echo '<div class="alert alert-notify alert-success alert-dismissible fade show" role="alert">
              <span data-notify="icon" class="fas fa-check"></span> 
              <span data-notify="title" class="text-success">Sukses!</span> 
              <span data-notify="message">Data berhasil disimpan.</span>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
    }
    // jika pesan = 2
    elseif ($_GET['pesan'] == 2) {
      // tampilkan pesan sukses hapus data
      echo '<div class="alert alert-notify alert-success alert-dismissible fade show" role="alert">
              <span data-notify="icon" class="fas fa-check"></span> 
              <span data-notify="title" class="text-success">Sukses!</span> 
              <span data-notify="message">Data berhasil dihapus.</span>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
    }
    // jika pesan = 3
    elseif ($_GET['pesan'] == 3) {
      // tampilkan pesan sukses hapus data
      echo '<div class="alert alert-notify alert-success alert-dismissible fade show" role="alert">
              <span data-notify="icon" class="fas fa-check"></span> 
              <span data-notify="title" class="text-success">Sukses!</span> 
              <span data-notify="message">Data berhasil diubah.</span>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
    }
  }
?>
  <style>
    .btn-default{
      color: black !important;
    }.btn-default:hover{
      color: black !important;
    }
    .white{
      color: white !important;
    }
  </style>
  <div class="panel-header bg-success-gradient">
    <div class="page-inner py-45">
      <div class="d-flex align-items-left align-items-md-top flex-column flex-md-row">
        <div class="page-header text-white">
          <!-- judul halaman -->
          <h4 class="page-title text-white"><i class="fas fa-address-card mr-2"></i></i> Konfigurasi Aplikasi</h4>
          <!-- breadcrumbs -->
          <ul class="breadcrumbs">
            <li class="nav-home"><a href="?module=dashboard"><i class="flaticon-home text-white"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="?module=profil" class="text-white">Konfigurasi Aplikasi</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a>Data</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <?php 
  $query = mysqli_query($mysqli, "SELECT * FROM tbl_about") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));

  $data = mysqli_fetch_assoc($query); ?>

  <div class="page-inner mt--5">
    <div class="card">
      <div class="card-header">
        <!-- judul tabel -->
        <div class="card-title">Info Konfigurasi Aplikasi</div>
      </div>
        <form action="modules/profil/proses_ubah.php" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
        <div class="card-body">  
          <div class="row">
            <div class="col-sm-6">
              <input type="text" name="id_about" id="id_about" value="<?=$data['id_about']?>" hidden>
              <div class="form-group">
                <label>Nama Aplikasi</label>
                <input type="text" name="judul" id="judul" class="form-control" value="<?=$data['judul']?>" readonly>
              </div>
              <div class="form-group">
                <label>Kontak</label>
                <input type="text" name="kontak" id="kontak" class="form-control" value="<?=$data['kontak']?>" readonly>
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" id="email" class="form-control" value="<?=$data['email']?>" readonly>
              </div>
              <div class="form-group">
                <label>Website</label>
                <input type="text" name="website" id="website" class="form-control" value="<?=$data['website']?>" readonly>
              </div>
              
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Gambar</label>
                <input class="form-control" type="file" name="file" id="gambarHelper">
                <img src="./assets/img/tempat/<?=$data['gambar']?>" alt="" class="w-100 h-100">
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
          <button type="button" id="btnUbah" name="Ubah" class="btn btn-success btn-round pl-4 pr-4 mr-2">Ubah</button>
          <input type="submit" id="simpan" name="simpan" value="Simpan" class="btn btn-success btn-round pl-4 pr-4 mr-2">
          <!-- tombol kembali ke halaman data barang masuk -->
          <button type="button" id="btnBatal" class="btn btn-default white btn-round pl-4 pr-4">Batal</a>
        </div>
      </form>
        
    </div>
  </div>
<?php 
} 
?>

<script>
  $(document).ready(function(){

    $('#simpan').hide();
    $('#btnBatal').hide();
    $('#gambarHelper').hide();
    $("#summernote").summernote("disable");

    $('#btnBatal').click(function(){
      $('#btnUbah').show();
      $('#simpan').hide();
      $('#btnBatal').hide();
      $('#gambarHelper').hide();
      $("#summernote").summernote("disable");
      $('#judul').attr('readonly','true');
      $('#email').attr('readonly','true');
      $('#kontak').attr('readonly','true');
      $('#website').attr('readonly','true');
    });

    $('#btnUbah').click(function(){
      $('#btnUbah').hide();
      $('#simpan').show();
      $('#btnBatal').show();

      $("#summernote").summernote("enable");
      $('#judul').removeAttr('readonly');
      $('#email').removeAttr('readonly');
      $('#kontak').removeAttr('readonly');
      $('#website').removeAttr('readonly');

      $('#gambarHelper').show();
    });

  });
</script>

