<?php
// Mengecek AJAX Request
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )) {
	// panggil file "config.php" untuk koneksi ke database
	require_once "../administrator/config/database.php";
    // require_once "../../config/fungsi_.php";

    if(isset($_GET['tanggal'])){
        $tahun_start = date('Y-m-d', strtotime(substr($_GET['tanggal'],0,10)));
        $tahun_end   = date('Y-m-d', strtotime(substr($_GET['tanggal'],-10)));
        $id_tempat   = $_GET['id_tempat'];
        $between = "AND a.tgl_monitor BETWEEN '$tahun_start' AND '$tahun_end'";
    }

    $query1 = mysqli_query($mysqli, "SELECT *, COUNT(a.id_log) as jumlah FROM tbl_log_pohon a 
        LEFT JOIN tbl_pohon b ON a.id_pohon=b.id_pohon
        WHERE b.id_tempat =$id_tempat $between")or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));

    $data3 = mysqli_fetch_assoc($query1);

    if($data3['jumlah']=="0"){
        echo '
        <div class="alert alert-info" role="alert">
            <i class="fas fa-info-circle title-icon"></i> Data Monitoring Mangrove tidak ditemukan.
        </div>';
    }else{
        function tgl_indo($tanggal){
        	$bulan = array (
        		1 =>   'Januari',
        		'Februari',
        		'Maret',
        		'April',
        		'Mei',
        		'Juni',
        		'Juli',
        		'Agustus',
        		'September',
        		'Oktober',
        		'November',
        		'Desember'
        	);
        	$pecahkan = explode('-', $tanggal);
        	
        	// variabel pecahkan 0 = tanggal
        	// variabel pecahkan 1 = bulan
        	// variabel pecahkan 2 = tahun
         
        	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
        }
        
        function nama_hari_indo($tanggal) {
        	// format tanggal yyyy-mm-dd
        	$tgl = substr($tanggal,8,2);
        	$bln = substr($tanggal,5,2);
        	$thn = substr($tanggal,0,4);
        
        	$info = date('w', mktime(0,0,0,$bln,$tgl,$thn));
        
        	switch ($info) {
        		case '0': return "Minggu"; break;
        		case '1': return "Senin"; break;
        		case '2': return "Selasa"; break;
        		case '3': return "Rabu"; break;
        		case '4': return "Kamis"; break;
        		case '5': return "Jumat"; break;
        		case '6': return "Sabtu"; break;
        	}
        }
    
                        $query6 = mysqli_query($mysqli, "SELECT * FROM tbl_log_pohon a 
                        LEFT JOIN tbl_pohon b ON a.id_pohon=b.id_pohon
                        WHERE b.id_tempat = $id_tempat $between")or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
                
                        while($data6 = mysqli_fetch_assoc($query6)){
                            $year[] = date('Y', strtotime($data6['tgl_monitor']));
                            // $year[] = $data6['tgl_monitor'];
                            $tinggi[] = $data6['tinggi'];
                            $diameter[] = $data6['diameter'];
                            $persentase_tumbuh[] = $data6['persentase_tumbuh'];
                            
                        }
                        
                        $foto           = $data3['foto'];
                        $jenis          = $data3['jenis'];
                        $usia_tanam     = $data3['usia_tanam'];
                        $jumlah_bibit   = $data3['jumlah_bibit'];
                        $tgl            = tgl_indo($data3['tgl_tanam']);
                        $nama_hari      = nama_hari_indo($data3['tgl_tanam']);
                        
                        ?> 
                        <div class="row">
                            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 270px;">
                                <div class="position-relative h-100">
                                    <img class="img-fluid position-absolute w-100 h-75" src="administrator/assets/img/tempat/<?=$foto?>" alt="" style="object-fit: cover;">
                                </div>
                            </div>
                            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                                <h6 class="section-title bg-white text-start text-primary pe-3">Detail Bibit Pohon Hutan Mangrove</h6>
                                <table class="table">
                                    <tr>
                                        <td>Tanggal Penanaman</td>
                                        <td><b><?php echo $nama_hari.", ". $tgl; ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Pohon</td>
                                        <td><b><?=$jenis?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Usia Penanaman</td>
                                        <td><b><?=$usia_tanam?> Bulan</b></td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Bibit</td>
                                        <td><b><?=$jumlah_bibit?> Batang</b></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="text-center" style="margin-top: -40px !important;">
                                    <h6 class="card-title">Monitoring Pertumbuhan Hutan Mangrove Berdasarkan Tinggi Pohon</h6>
                                </div>
                                <canvas id="chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                            <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="text-center" style="margin-top: -40px !important;">
                                    <h6 class="card-title">Monitoring Pertumbuhan Hutan Mangrove Berdasarkan Diameter Pohon</h6>
                                </div>
                                <canvas id="chart_2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                            <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="text-center" style="margin-top: -40px !important;">
                                    <h6 class="card-title">Monitoring Persentase Tumbuh Hutan Mangrove</h6>
                                </div>
                                <canvas id="chart_3" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
            <script>
                var ctx = document.getElementById("chart").getContext('2d');
                var chart_1 = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: <?php echo json_encode($year); ?>,
                        datasets: [{
                            label           : 'Volume',
                            data            : <?php echo json_encode($tinggi); ?>,
                            backgroundColor : 'rgba(60,141,188,0.9)',
                            borderColor     : 'rgba(60,141,188,0.8)',
                            borderWidth     : 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                            }]
                        }
                    }
                });
                
                var ctx_2 = document.getElementById("chart_2").getContext('2d');
                var chart_2 = new Chart(ctx_2, {
                    type: 'bar',
                    data: {
                        labels: <?php echo json_encode($year); ?>,
                        datasets: [{
                            label           : 'Diameter Pohon',
                            data            : <?php echo json_encode($diameter); ?>,
                            backgroundColor : 'rgba(255, 99, 71, 0.9)',
                            borderColor     : 'rgba(255, 99, 71, 0.8)',
                            borderWidth     : 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                            }]
                        }
                    }
                });
                
                var ctx_3 = document.getElementById("chart_3").getContext('2d');
                var chart_3 = new Chart(ctx_3, {
                    type: 'bar',
                    data: {
                        labels: <?php echo json_encode($year); ?>,
                        datasets: [{
                            label           : 'Persentase Tumbuh',
                            data            : <?php echo json_encode($persentase_tumbuh); ?>,
                            backgroundColor : 'rgba(0, 128, 0, 0.9)',
                            borderColor     : 'rgba(0, 128, 0, 0.8)',
                            borderWidth     : 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                            }]
                        }
                    }
                });
            </script> 
            
            <?php 
        }
} else {
    echo '<script>window.location="../../login-error"</script>';
}
?>

