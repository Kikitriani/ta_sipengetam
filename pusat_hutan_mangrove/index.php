<?php 
if (basename($_SERVER['PHP_SELF']) === basename(__FILE__)) {
  // alihkan ke halaman error 404
  header('location: 404.html');
}
// jika file di include oleh file lain, tampilkan isi file
else {
    ?>

    <style> 
        p{
            color: black;
            font-size: 10pt;
            /*line-height: 100%;*/
        }
    </style>    

    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Pusat Hutan Mangrove</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                            <li class="breadcrumb-item active"><a class="text-white">Pusat Hutan Mangrove</a></li>
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
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Hutan Mangrove</h6>
                <h1 class="mb-3">Daftar Hutan Mangrove di Ketapang</h1>
                <div class="col-md-5 m-auto mb-5">
                    <input id="cari" type="text" class="form-control rounded-3" placeholder="cari hutan mangrove">
                </div>
            </div>

            <!-- <div class="row g-4"> -->

                <div id="hasil-cari">
                    <div class="row g-4">
                        <?php 

                        // $delay = 0.1;
                        $query = mysqli_query($mysqli, "SELECT * FROM tbl_tempat") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));

                        while ($data = mysqli_fetch_assoc($query)) { 
                            $delay = floatval('0.'.$data['id_tempat'])*2;?>
                            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="<?=$delay?>s">
                                <a href="?module=detail&id=<?=$data['id_tempat']?>">
                                    <div class="team-item bg-light">
                                        <div class="overflow-hidden">
                                            <img class="img-fluid" style="height: 200px !important;" src="administrator/assets/img/tempat/<?=$data['gambar']?>" alt="">
                                        </div>
                                        <div class="p-2">
                                            <h5 class="mb-2"><?=$data['nama_tempat']?></h5>
                                            <p><?=$data['lokasi']?></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php 
                        } ?>
                    </div>
                </div>

            <!-- </div> -->
        </div>
    </div>
    <!-- Team End -->

    <?php 
} ?>


<script>
    // $(document).ready(function(){
    //     $("#cari").on("keyup", function() {
    //         var value = $(this).val().toLowerCase();
    //         $("#hasil-cari *").filter(function() {
    //             $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    //         });
    //     });
    // });
    // load(cari());

    // load("pusat_hutan_mangrove/data.php");
    // function cari(){
    // //membuat variabel val_cari dan mengisinya dengan nilai pada field cari
    //     var val_cari = $('#cari').val();

    //     //kode 1
    //     var request = $.ajax ({
    //         url : "pusat_hutan_mangrove/data.php",
    //         data : "cari="+val_cari,
    //         type : "GET",
    //         dataType: "html"
    //     });

    //     //menampilkan pesan Sedang mencari saat aplikasi melakukan proses pencarian
    //     $('#hasil-cari').html('Sedang Mencari…');

    //     //Jika pencarian selesai
    //     request.done(function(output) {
    //         //Tampilkan hasil pencarian pada tag div dengan id hasil-cari
    //         $('#hasil-cari').html(output);
    //     });
    // };

    // $('#searchString').keyup(function(e) {
    //     clearTimeout($.data(this, 'timer'));
    //     if (e.keyCode == 13)
    //       search(true);
    //   else
    //       $(this).data('timer', setTimeout(search, 500));
    // });

    // function search(force) {
    //     var existingString = $("#searchString").val();
    //     if (!force && existingString.length < 3) return; //wasn't enter, not > 2 char
    //     $.get('/Tracker/Search/' + existingString, function(data) {
    //         $('div#results').html(data);
    //         $('#results').show();
    //     });
    // }

    // }
</script>