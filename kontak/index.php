<?php 
if (basename($_SERVER['PHP_SELF']) === basename(__FILE__)) {
  // alihkan ke halaman error 404
  header('location: 404.html');
}
// jika file di include oleh file lain, tampilkan isi file
else {
    if (isset($_GET['pesan'])) {
    // jika pesan = 1
        if ($_GET['pesan'] == 1) { ?>
            <script>
                swal("Terima Kasih!", "Laporan anda sedang kami tindak lanjuti", "success");
            </script> 
            <?php 
        }
    }
?>

<!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Kontak Kami</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                            <li class="breadcrumb-item active"><a class="text-white">Kontak</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Team Start -->
 <div class="container-xxl py-5">
    <div class="container">
        <!--<div class="text-center wow fadeInUp" data-wow-delay="0.1s">-->
        <!--    <h6 class="section-title bg-white text-center text-primary px-3">Kontak</h6>-->
        <!--    <h1 class="mb-5">Silahkan Hubungi Kami</h1>-->
        <!--</div>-->
        <div class="row g-4">
            
            <div class="col-lg-8 col-md-8 wow fadeInUp" data-wow-delay="0.1s">
                <div class=" text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title bg-white text-primary px-3">Lapor</h6>
                    <h5 class="mb-4">Ada kerusakan hutan Mangrove di Ketapang, Lapor disini !!!</h5>
                </div>
                <form action="kontak/proses_entry.php" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <!--<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>-->
                    </div>
                    <div class="mb-3">
                        <label for="id_tempat" class="form-label">Tempat</label>
                        <select name="id_tempat" id="id_tempat" class="form-control">
                            <option value="">Pilih Tempat</option>
                            <?php 
                            $query1 = mysqli_query($mysqli, "SELECT id_tempat, nama_tempat FROM tbl_tempat") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
                            while($data1 = mysqli_fetch_assoc($query1)){
                            echo "<option value='".$data1['id_tempat']."'>".$data1['nama_tempat']."</option>";
                            } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea id="summernote" name="keterangan"></textarea>
                    </div>
                    <input type="submit" name="simpan" value="Kirim" class="btn btn-success btn-round pl-4 pr-4 mr-2">
                </form>
                
            </div>
            
            <?php 
            $query2 = mysqli_query($mysqli, "SELECT * FROM tbl_about") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
            $data2 = mysqli_fetch_assoc($query2);
            ?>
            <div class="col-lg-4 col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class=" text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title bg-white text-primary px-3">Kontak Kami</h6>
                    <h5 class="mb-4">Silahkan Hubungi Kami</h5>
                </div>
                <div class="text-center">
                    <p><i class="fa-solid fa-phone"></i> <?=$data2['kontak']?></p>
                    <p><i class="fa-solid fa-envelope"></i> <?=$data2['email']?></p>
                    <p><i class="fa-solid fa-globe"></i> <?=$data2['website']?></p>
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- Team End -->

<?php 
} ?>