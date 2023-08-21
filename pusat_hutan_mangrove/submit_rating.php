<?php 
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )) {
    // panggil file "config.php" untuk koneksi ke database
    require_once "../administrator/config/database.php";

    if(isset($_POST["rating_data"])){
        $result   = mysqli_query($mysqli, "SELECT max(id_ulasan) as kode FROM tbl_ulasan")or die('Ada kesalahan pada query tampil data id: '. mysqli_error($mysqli));
    
        $data     = mysqli_fetch_assoc($result);
        $id       = $data['kode'] + 1;
        
        $id_tempat      = $_POST["id_tempat"];
        $user_name      = $_POST["user_name"];
		$user_rating	= $_POST["rating_data"];
		$user_review	= $_POST["user_review"];
        
        $insert = mysqli_query($mysqli, "INSERT INTO tbl_ulasan(id_ulasan, id_tempat, nama, rating, review) VALUES('$id', '$id_tempat', '$user_name', '$user_rating', '$user_review')")or die('Ada kesalahan pada query insert : ' . mysqli_error($mysqli));
        if ($insert) {
            // header('location: ../main.php?module=detail&id='.$id_tempat.'&pesan=1');
            echo "Sukses";
        }
    }
    
    else if(isset($_POST['action']) && isset($_POST['id_tempat'])){
    	$average_rating = 0;
    	$total_review = 0;
    	$five_star_review = 0;
    	$four_star_review = 0;
    	$three_star_review = 0;
    	$two_star_review = 0;
    	$one_star_review = 0;
    	$total_user_rating = 0;
    	$review_content = array();
    	$id_tempat = $_POST['id_tempat'];
    	
    	$query   = mysqli_query($mysqli, "SELECT * FROM tbl_ulasan WHERE id_tempat = '$id_tempat' ORDER BY id_ulasan DESC")or die('Ada kesalahan pada query tampil data id: '. mysqli_error($mysqli));
    	
    // 	$query   = mysqli_query($mysqli, "SELECT * FROM tbl_ulasan ORDER BY id_ulasan DESC")or die('Ada kesalahan pada query tampil data id: '. mysqli_error($mysqli));
        // $result  = mysqli_fetch_assoc($query);
    
    // 	foreach($result as $row)
    	while ($row = mysqli_fetch_assoc($query))
    	{
    		$review_content[] = array(
    			'user_name'		=>	$row["nama"],
    			'user_review'	=>	$row["review"],
    			'rating'		=>	$row["rating"],
    			'datetime'		=>	date('l, d F Y h:i:s A', strtotime($row["created_date"]))
    		);
    
    		if($row["rating"] == '5')
    		{
    			$five_star_review++;
    		}
    
    		if($row["rating"] == '4')
    		{
    			$four_star_review++;
    		}
    
    		if($row["rating"] == '3')
    		{
    			$three_star_review++;
    		}
    
    		if($row["rating"] == '2')
    		{
    			$two_star_review++;
    		}
    
    		if($row["rating"] == '1')
    		{
    			$one_star_review++;
    		}
    
    		$total_review++;
    
    		$total_user_rating = $total_user_rating + $row["rating"];
    
    	}
        if($total_user_rating == 0){
            $average_rating = 0;
        }else{
    	    $average_rating = $total_user_rating / $total_review;
        }
    
    	$output = array(
    		'average_rating'	=>	number_format($average_rating, 1),
    		'total_review'		=>	$total_review,
    		'five_star_review'	=>	$five_star_review,
    		'four_star_review'	=>	$four_star_review,
    		'three_star_review'	=>	$three_star_review,
    		'two_star_review'	=>	$two_star_review,
    		'one_star_review'	=>	$one_star_review,
    		'review_data'		=>	$review_content
    	);
    
    	echo json_encode($output);
    
    }else{
        echo json_encode("id tempat tidak ditemukan");
    }
}
 ?>