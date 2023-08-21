<?php 
if (basename($_SERVER['PHP_SELF']) === basename(__FILE__)) {
  // alihkan ke halaman error 404
  header('location: 404.html');
}
// jika file di include oleh file lain, tampilkan isi file
else {
?>
    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div class="owl-carousel header-carousel position-relative">
            <?php 
                    // $id_tempat = $_GET['id'];
            $query = mysqli_query($mysqli, "SELECT * FROM tbl_tempat") 
            or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));

            while($data = mysqli_fetch_assoc($query)){ ?>
                <div class="owl-carousel-item position-relative" style="background-position: center center;background-size: cover;">
                    <img class="img-fluid" src="administrator/assets/img/tempat/<?=$data['gambar']?>" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-sm-10 col-lg-8">
                                    <!-- <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Best Online Courses</h5> -->
                                    <h1 class="display-3 text-white animated slideInDown"><?=$data['nama_tempat']?></h1>
                                    <p class="fs-5 text-white mb-4 pb-2"><?=$data['lokasi']?></p>
                                    <a href="?module=detail&id=<?=$data['id_tempat']?>" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php 
            }
            ?>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <!--<i class="far fa-map-marked-alt"></i>-->
                            <i class="fa fa-3x fa-map-marker-alt text-primary mb-4"></i>
                            <h5 class="mb-3">Pencarian</h5>
                            <p>Memudahkan anda untuk mencari dan menemukan area hutan mangrove yang ada di ketapang</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-globe text-primary mb-4"></i>
                            <h5 class="mb-3">Lokasi Hutan Mangrove</h5>
                            <p>Anda dapat mengetahui lokasi dan alamat serta informasi tentang hutan mangrove di ketapang</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-home text-primary mb-4"></i>
                            <h5 class="mb-3">Waktu Akses</h5>
                            <p>Memudahkan anda dalam mencari informasi terkait hutan mangrove kapanpun dan dimanapun</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-book-open text-primary mb-4"></i>
                            <h5 class="mb-3">Monitoring</h5>
                            <p>Anda bisa mengetahui informasi terkait riwayat pengelolaan hutan mangrove serta melaporkan apabila terdapat kerusakan diarea hutan mangrove tersebut</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3">Peta</h6>
                <h1 class="mb-5">Peta Lokasi Hutan Mangrove</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-12">
                    <div id="map1" style="width: 100%; height:500px;"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tentang Hutan Mangrove -->
    
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3">Tentang Hutan Mangrove</h6>
                <h1 class="mb-5">Informasi Terkait Hutan Mangrove</h1>
            </div>
            <?php 
            $query2 = mysqli_query($mysqli, "SELECT * FROM tbl_edukasi") 
            or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
        
            while($data2 = mysqli_fetch_assoc($query2)){ 
            ?>
            <div class="row mb-2">
                <div class="col-lg-12">
                    <h3 class="mb-1"><?=$data2['judul']?></h3>
                    <?=$data2['keterangan']?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    
    <!-- About Start -->
    <?php 
                    // $id_tempat = $_GET['id'];
    $query1 = mysqli_query($mysqli, "SELECT * FROM tbl_about") 
    or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));

    $data1 = mysqli_fetch_assoc($query1); ?>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="administrator/assets/img/tempat/<?=$data1['gambar']?>" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">Tentang SI Pengetam</h6>
                    <h1 class="mb-4">Selamat Datang di SI Pengetam</h1>
                    <?=$data1['keterangan']?>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
    

     <!-- Testimonial Start -->
    <!-- <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3">Testimonial</h6>
                <h1 class="mb-5">Our Students Say!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative">
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="img/testimonial-1.jpg" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="img/testimonial-2.jpg" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="img/testimonial-3.jpg" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="img/testimonial-4.jpg" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Testimonial End -->
<?php 
} ?>