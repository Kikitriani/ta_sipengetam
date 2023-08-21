<?php 
if (basename($_SERVER['PHP_SELF']) === basename(__FILE__)) {
  // alihkan ke halaman error 404
  header('location: 404.html');
}
// jika file di include oleh file lain, tampilkan isi file
else {

	$id_tempat = $_GET['id'];
	$query = mysqli_query($mysqli, "SELECT *, a.keterangan AS ket FROM tbl_tempat a 
	LEFT JOIN tbl_riwayat b ON a.id_tempat=b.id_tempat WHERE a.id_tempat='$id_tempat' ORDER BY b.tanggal DESC") 
	or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));

    $data = mysqli_fetch_assoc($query);
    ?>
    
    <style>
        .star-light {
            color: #e9ecef;
        }
        .progress {
          display: -webkit-box;
          display: -ms-flexbox;
          display: flex;
          height: 1rem;
          overflow: hidden;
          font-size: .75rem;
          background-color: #e9ecef;
          border-radius: .25rem;
        }
        .progress-label-left {
          float: left;
          margin-right: 0.5em;
          line-height: 1em;
        }
        .progress-label-right {
          float: right;
          margin-left: 0.3em;
          line-height: 1em;
        }
        .btn-rounded{     
          border: 1px solid gray;
          border-radius: 40px;
        }
        .btn-rounded-sm{
            /*border: 1px solid gray;*/
            border-radius: 5px;
        }
        .btn-default:hover {
          color: #FFF;
          background: rgba(58, 133, 191, 0.75);
          border: 1px solid rgba(58, 133, 191, 0.75);
        }
        .row-height{
          height: 40vh;
        }
        .hw-50{
            height: 30px;
            width: 30px;
        }
        .form-control:read-only {
          background-color: #198758 !important;
          opacity: 1;
        }
        /*    Avatar    */

        .avatar {
          position: relative;
          display: inline-block;
        }
        
        .avatar-img {
          width: 100%;
          height: 100%;
          -o-object-fit: cover;
          object-fit: cover;
        }
        
        .avatar-title {
          width: 100%;
          height: 100%;
          background-color: $secondary-color;
          color: #fff;
          display: flex;
          align-items: center;
          justify-content: center;
        }
        
        .avatar-online::before, .avatar-offline::before, .avatar-away::before {
          position: absolute;
          right: 0;
          bottom: 0;
          width: 25%;
          height: 25%;
          border-radius: 50%;
          content: '';
          border: 2px solid #fff;
        }
        
        .avatar-online::before {
          background-color: $success-color;
        }
        
        .avatar-offline::before {
          background-color: #97a2b1;
        }
        
        
        .avatar-away::before {
          background-color: $warning-color;
        }
        
        .avatar {
          width: 3rem;
          height: 3rem;
        }
          .border {
            border-width: 3px !important;
          }
          .rounded {
            border-radius: 6px !important;
          }
          .avatar-title {
            font-size: 18px;
          }
        
        
        .border-dark {
          border-color: #202940 !important;
        }
    </style>

     <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown"><?=$data['nama_tempat']?></h1>
                        <?php  
    						if($data['status']==1){
    							echo '<h3><span class="badge bg-success">Masih Beroperasi</span></h3>';
    						}else if($data['status']==2){
    							echo '<h3><span class="badge bg-danger">Kerusakan</span></h3>';
    						}else if($data['status']==3){
    							echo '<h3><span class="badge bg-warning">Perbaikan</span></h3>';
    						}else{
    						    echo '<h3><span class="badge bg-success">Masih Beroperasi</span></h3>';
    						}
    				    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
    
    

    <div class="container-xxl pb-5">
        <div class="container">
            <!-- <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3">Peta</h6>
                <h1 class="mb-5">Peta Lokasi Hutan Mangrove</h1>
            </div> -->
            <div class="row g-5">
            	<div class="col-lg-8 wow fadeInUp" data-wow-delay="0.3s">
                    <div id="map1" style="width: 100%; height:400px;"></div>
                </div>

                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">Alalmat</h6>
                    <p><i class="fa fa-map-marker-alt bg-blue"></i> <?=$data['lokasi']?></p>
                    <h6 class="section-title bg-white text-start text-primary pe-3">Keterangan </h6>
                    <p><?=$data['ket']?></p>
                </div>
                <div class="col-lg-12">
                    <div class="text-center">
            			<h6 class="section-title bg-white text-center text-primary px-3">Galeri</h6>
            			<h4 class="mb-5">Galeri <?=$data['nama_tempat']?></h4>
            		</div>
                    <div class="owl-carousel testimonial-carousel position-relative">
        			    <?php 
                        $query1 = mysqli_query($mysqli, "SELECT * FROM tbl_tempat a 
                        RIGHT JOIN tbl_galeri b ON a.id_tempat=b.id_tempat 
                        WHERE b.id_tempat=$id_tempat ORDER BY b.id_galeri DESC") 
                        or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
                    
                        while($data1 = mysqli_fetch_assoc($query1)){?>
            				<div class="testimonial-item text-center">
            					<img class="border p-2 mx-auto mb-3" src="administrator/assets/img/tempat/<?=$data1['foto']?>" style="width: 80; height: 300px">
            					<div class="testimonial-text bg-light text-center p-4">
            						<?=$data1['keterangan']?>
            					</div>
            				</div>
            				<?php 
            			} ?>
    		        </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Monitoring Start -->
    <?php 
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
    
    $query1 = mysqli_query($mysqli, "SELECT * FROM tbl_pohon WHERE id_tempat=$id_tempat") 
    or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));

    $data1 = mysqli_fetch_assoc($query1); 
    $tgl = tgl_indo($data1['tgl_tanam']);
    ?>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-12">
                    <div class="text-center">
                		<h6 class="section-title bg-white text-center text-primary px-3">Monitoring Hutan Mangrove</h6>
                		<h4 class="mb-0">Monitoring <?=$data['nama_tempat']?></h4>
                	</div>
            	</div>
            	<div class="col-lg-12">
            	   <form id="form_1">
            	       <div class="row justify-content-md-center">
                			<div class="col-md-5 col-sm-5 col-xs-5" style="padding-right: 0px">
                				<div class="form-group">
                					<input type="text" class="form-control" name="id_tempat" value="<?=$id_tempat?>" hidden>
                					<input type="text" class="form-control date-range rounded-3" id="tanggal" name="tanggal" placeholder="Range Tanggal" autocomplete="off" required>
                				</div>
                			</div>
                			<div class="col-md-2 col-sm-3 col-xs-3">
                				<div class="form-group">
                					<button type="button" class="form-control btn btn-success rounded-3" id="btn_1">
                						<i class="fas fa-search"></i> Cari
                					</button>
                				</div>
                			</div>
            		    </div>
            		</form>
            	</div>
            	
            	<!--<div class="row mt-4">	-->
            	<div class="col-lg-12 col-sm-6 col-xs-12 mb-2">
            		<div id="chart-1">
                        <div class="row">
                            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 270px;">
                                <div class="position-relative h-100">
                                    <img class="img-fluid position-absolute w-100 h-75" src="administrator/assets/img/tempat/<?=$data1['foto']?>" alt="" style="object-fit: cover;">
                                </div>
                            </div>
                            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                                <h6 class="section-title bg-white text-start text-primary pe-3">Detail Bibit Pohon Hutan Mangrove</h6>
                                <table class="table">
                                    <tr>
                                        <td>Tanggal Penanaman</td>
                                        <td><b><?php echo nama_hari_indo($data1['tgl_tanam']).', '.$tgl; ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Pohon</td>
                                        <td><b><?=$data1['jenis']?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Usia Penanaman</td>
                                        <td><b><?=$data1['usia_tanam']?> Bulan</b></td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Bibit</td>
                                        <td><b><?=$data1['jumlah_bibit']?> Batang</b></td>
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
                        <?php
        
                        $query5 = mysqli_query($mysqli, "SELECT * FROM tbl_log_pohon a 
                        LEFT JOIN tbl_pohon b ON a.id_pohon=b.id_pohon
                        WHERE b.id_tempat = $id_tempat")or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
                
                        while($data5 = mysqli_fetch_assoc($query5)){
                            $year[] = date('Y', strtotime($data5['tgl_monitor']));
                            // $year[] = $data5['tgl_monitor'];
                            $tinggi[] = $data5['tinggi'];
                            $diameter[] = $data5['diameter'];
                            $persentase_tumbuh[] = $data5['persentase_tumbuh'];
                            
                        }
                        ?> 
                        
            		</div>
            
            	</div>
            	</div>
                
            </div>
        </div>
    </div>
    <!-- Monitoring End -->
    
    <input id="id_tempat" name="id_tempat" value="<?=$id_tempat?>" hidden>
    
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    	<div class="container">
    	    <div class="text-center">
            	<h6 class="section-title bg-white text-center text-primary px-3">Ulasan</h6>
            	<h4 class="mb-5">Ulasan <?=$data['nama_tempat']?></h4>
        	</div>
    	    <div class="row g-5">
    	        <div class="col-lg-6">
                	<div class="row">
                        <div class="col-sm-6">
                            <p>
                                <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>
                                <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                                </div>
                            </p>
                            <p>
                                <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>
                                
                                <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                                </div>               
                            </p>
                            <p>
                                <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>
                                
                                <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                                </div>               
                            </p>
                            <p>
                                <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>
                                
                                <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                                </div>               
                            </p>
                            <p>
                                <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>
                                
                                <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                                </div>               
                            </p>
                        </div>
                		<div class="col-sm-6 text-center">
                			<h1 class="text-warning mt-4 mb-4">
                				<b><span id="average_rating">0.0</span></b>
                			</h1>
                			<div class="mb-3">
                				<i class="fas fa-star star-light mr-1 main_star"></i>
                                <i class="fas fa-star star-light mr-1 main_star"></i>
                                <i class="fas fa-star star-light mr-1 main_star"></i>
                                <i class="fas fa-star star-light mr-1 main_star"></i>
                                <i class="fas fa-star star-light mr-1 main_star"></i>
            	    		</div>
                			<p><span id="total_review">0</span> Ulasan</p>
                		</div>
                		
                		<div class="col-sm-12 text-center">
                			<button type="button" name="add_review" id="add_review" class="btn btn-default btn-rounded mt-4"><i class="fas fa-edit text-warning"></i> Tulis Ulasan</button>
                		</div>
                	</div>
    	        </div>
    	        <div class="col-lg-6">
    	            <div class="overflow-auto row-height">
    	                <div id="review_content"></div>
    	            </div>
    	        </div>
    	    </div>
    	</div>
    </div>

    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    	<div class="container">
    		<?php 
    		$query1 = mysqli_query($mysqli, "SELECT * FROM tbl_riwayat WHERE id_tempat=$id_tempat") 
    		or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli)); ?>

    		<div class="text-center">
    			<h6 class="section-title bg-white text-center text-primary px-3">Riwayat</h6>
    			<h4 class="mb-5">Riwayat Pengelolaan <?=$data['nama_tempat']?></h4>
    		</div>
    		<div class="owl-carousel testimonial-carousel position-relative">
    			<?php 
    			while ($data1 = mysqli_fetch_assoc($query1)) { ?>
    				<div class="testimonial-item text-center">
    					<img class="border p-2 mx-auto mb-3" src="administrator/assets/img/tempat/<?=$data1['gambar']?>" style="width: 80; height: 300px">
    					<h5 class="mb-0">
    						<?php  
    						if($data1['status']==1){
    							echo "Masih Beroperasi";
    						}else if($data1['status']==2){
    							echo "Kerusakan";
    						}else if($data1['status']==3){
    							echo "Perbaikan";
    						}
    						?>
    					</h5>
    					<p>
    						<?php echo nama_hari_indo($data1['tanggal']).', '.tanggal_indo($data1['tanggal']); ?>
    					</p>
    					<div class="testimonial-text bg-light text-center p-4">
    						<?=$data1['keterangan']?>
    					</div>
    				</div>
    				<?php 
    			} ?>
    		</div>
    	</div>
    </div>
    
    <div id="review_modal" class="modal" tabindex="-1" role="dialog">
      	<div class="modal-dialog" role="document">
        	<div class="modal-content">
    	      	<div class="modal-header">
    	        	<h5 class="modal-title text-center"><?=$data['nama_tempat']?></h5>
    	        	<!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
    	      	</div>
    	      	<div class="modal-body">
    	      	    <form>
        	      		<h4 class="text-center mt-2 mb-4">
        	        		<i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
        	        	</h4>
        	        	<div class="mb-3">
        	        	    <input type="text" name="id_tempat" id="id_tempat" class="form-control" value="<?=$id_tempat?>" hidden>
        	        	</div>
        	        	<div class="mb-3">
        	        	    <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Isikan nama Anda">
        	        	</div>
        	        	<!--<div class="mb-3">-->
        	        	<!--    <input type="email" name="email" id="email" class="form-control" placeholder="Isikan email Anda">-->
        	        	<!--</div>-->
        	        	<div class="mb-3">
        	        	    <textarea name="user_review" id="user_review" class="form-control" placeholder="Bagikan pengalaman Anda tentang tempat ini"></textarea>
        	            </div>
        	        	<div class="text-center mt-4">
        	        	    <button type="button" class="btn btn-danger btn-rounded-sm" data-bs-dismiss="modal" aria-label="Close">Batal</button>
        	        		<button type="button" class="btn btn-primary btn-rounded-sm" id="save_review">Posting</button>
        	        	</div>
    	        	</form>
    	      	</div>
        	</div>
      	</div>
    </div>

    <script>
        var rating_data = 0;
    
        $('#add_review').click(function(){
    
            $('#review_modal').modal('show');
    
        });
    
        $(document).on('mouseenter', '.submit_star', function(){
    
            var rating = $(this).data('rating');
    
            reset_background();
    
            for(var count = 1; count <= rating; count++)
            {
    
                $('#submit_star_'+count).addClass('text-warning');
    
            }
    
        });
    
        function reset_background()
        {
            for(var count = 1; count <= 5; count++)
            {
    
                $('#submit_star_'+count).addClass('star-light');
    
                $('#submit_star_'+count).removeClass('text-warning');
    
            }
        }
    
        $(document).on('mouseleave', '.submit_star', function(){
    
            reset_background();
    
            for(var count = 1; count <= rating_data; count++)
            {
    
                $('#submit_star_'+count).removeClass('star-light');
    
                $('#submit_star_'+count).addClass('text-warning');
            }
    
        });
    
        $(document).on('click', '.submit_star', function(){
    
            rating_data = $(this).data('rating');
    
        });
    
        $('#save_review').click(function(){
            // alert("berjalan");
    
            var id_tempat   = $('#id_tempat').val();
            // var email       = $('#email').val();
            var user_name   = $('#user_name').val();
            var user_review = $('#user_review').val();
    
            if(user_name == '' || user_review == '' || id_tempat == '')
            {
                alert("Please Fill Both Field");
                return false;
            }
            else
            {
                $.ajax({
                    url:"pusat_hutan_mangrove/submit_rating.php",
                    method:"POST",
                    data:{rating_data:rating_data, user_name:user_name, user_review:user_review, id_tempat:id_tempat},
                    success:function(data)
                    {
                        if(data == "Sukses"){
                            $('#review_modal').modal('hide');
                            load_rating_data();
                            swal("Terima Kasih!", "Pengalaman Anda sangat berarti bagi kami", "success");
                        }
    
                    }
                })
            }
    
        });
        
        load_rating_data();

        function load_rating_data()
        {
            var id_tempat   = $('#id_tempat').val();
            // alert(id_tempat);
            $.ajax({
                url:"pusat_hutan_mangrove/submit_rating.php",
                method:"POST",
                data:{action:'load_data', id_tempat:id_tempat},
                dataType:"JSON",
                success:function(data)
                {
                    // console.log(data);
                    $('#average_rating').text(data.average_rating);
                    $('#total_review').text(data.total_review);
    
                    var count_star = 0;
    
                    $('.main_star').each(function(){
                        count_star++;
                        if(Math.ceil(data.average_rating) >= count_star)
                        {
                            $(this).addClass('text-warning');
                            $(this).addClass('star-light');
                        }
                    });
    
                    $('#total_five_star_review').text(data.five_star_review);
    
                    $('#total_four_star_review').text(data.four_star_review);
    
                    $('#total_three_star_review').text(data.three_star_review);
    
                    $('#total_two_star_review').text(data.two_star_review);
    
                    $('#total_one_star_review').text(data.one_star_review);
    
                    $('#five_star_progress').css('width', (data.five_star_review/data.total_review) * 100 + '%');
    
                    $('#four_star_progress').css('width', (data.four_star_review/data.total_review) * 100 + '%');
    
                    $('#three_star_progress').css('width', (data.three_star_review/data.total_review) * 100 + '%');
    
                    $('#two_star_progress').css('width', (data.two_star_review/data.total_review) * 100 + '%');
    
                    $('#one_star_progress').css('width', (data.one_star_review/data.total_review) * 100 + '%');
    
                    if(data.review_data.length > 0)
                    {
                        var html = '';
    
                        for(var count = 0; count < data.review_data.length; count++)
                        {
                            // html += '<div class="overflow-auto">';
                            
                            // html += '<div class="row mb-3">';
    
                            // html += '<div class="col-sm-12">';
    
                            html += '<div class="card mb-2">';
    
                            html += '<div class="card-body">';
                            
                            // html += '<div class="row"><div class="col-sm-1"><h5>Example heading <span class="badge bg-secondary">'+data.review_data[count].user_name.charAt(0)+'</span></h5></div><div class="col-sm-11"><b>'+data.review_data[count].user_name+'</b></div></div>';
                            
                            html += '<div class="avatar"><span class="avatar-title rounded-circle border border-white bg-info">'+data.review_data[count].user_name.charAt(0)+'</span></div><span style="margin-left: 5px !important;">'+ data.review_data[count].user_name+'</span><br>';
                            
    
                            for(var star = 1; star <= 5; star++)
                            {
                                var class_name = '';
    
                                if(data.review_data[count].rating >= star)
                                {
                                    class_name = 'text-warning';
                                }
                                else
                                {
                                    class_name = 'star-light';
                                }
    
                                html += '<i class="fas fa-star '+class_name+' mr-1"></i> ';
                            }
    
                            html += data.review_data[count].datetime;
                            
                            html += '<br />';
    
                            html += data.review_data[count].user_review;
    
                            html += '</div>';
    
                            // html += '<div class="card-footer text-right">On '+data.review_data[count].datetime+'</div>';
    
                            html += '</div>';
    
                            // html += '</div>';
    
                            // html += '</div>';
                            
                            // html += '</div>';
                        }
    
                        $('#review_content').html(html);
                    }
                }
            })
        }
    </script>
    
    <script>
		$(document).ready(function(){
// 			$('#chart-1').load('pusat_hutan_mangrove/get_1.php');

// 			$('.date-picker-bulan').datepicker({
// 				autoclose: true,
// 				todayHighlight: true,
// 				format: "mm-yyyy",
// 				startView: "months", 
// 				minViewMode: "months"
// 			});

            $('.date-range').daterangepicker({
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                locale: {
                    format: 'DD-MM-YYYY'
                }
                 
            });
            
            var ctx = document.getElementById("chart").getContext('2d');
            var chart_1 = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($year); ?>,
                    datasets: [{
                        label           : 'Tinggi Pohon',
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
			

			$('#btn_1').click(function(){
			 //   alert('ada');
				if ($('#tanggal').val()==""){
					$( "#tanggal" ).focus();
					swal("Peringatan!", "Tanggal tidak boleh kosong.", "warning");
				}else{
					var data = $('#form_1').serialize();

					$.ajax({
						type : "GET",                                
						url  : "pusat_hutan_mangrove/get_1.php",   
						data : data,                               
						success: function(result){
							$('#chart-1').html(result);
						}
					});
				}
			});
		});
	</script>


    
    <?php 
} ?>