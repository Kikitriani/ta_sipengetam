<?php 
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )) {
    // panggil file "config.php" untuk koneksi ke database
    require_once "../administrator/config/database.php";

    if(isset($_GET['cari'])){
        $cari = $_GET['cari'];
        $data = "WHERE nama_tempat LIKE '%".$cari."%'";
        ?>
        <style> 
            p{
                color: black;
                font-size: 10pt;
                /*line-height: 100%;*/
            }
        </style>   
        <div class="row g-4">
        <?php 

        $delay = 0.1;
        $query = mysqli_query($mysqli, "SELECT * FROM tbl_tempat $data") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));

        while ($data = mysqli_fetch_assoc($query)) { 
            $tempat = floatval('0.'.$data['id_tempat']);?>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="<?=$tempat?>s">
                <a href="?module=detail&id=<?=$data['id_tempat']?>" class="">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" style="height: 200px !important;" src="administrator/assets/img/tempat/<?=$data['gambar']?>" alt="">
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0"><?=$data['nama_tempat']?></h5>
                            <small><?=$data['lokasi']?></small>
                        </div>
                    </div>
                </a>
            </div>
            <?php 
        } ?>
        </div>
    <?php 
    }
}
 ?>