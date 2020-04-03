<?php
// Create database connection
  $db = mysqli_connect("localhost", "root", "", "parkidsplearn");
  //mysqli_set_charset($con,"utf8");
  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text

        $pay_full = mysqli_real_escape_string($db, $_POST['pay_full']);
        $pay_bank  =  mysqli_real_escape_string($db, $_POST['pay_bank']);
        $pay_amount   =  mysqli_real_escape_string($db, $_POST['pay_amount ']);
        $pay_date	 =  mysqli_real_escape_string($db, $_POST['pay_date']);
        $pay_time =  mysqli_real_escape_string($db, $_POST['pay_time']);
        
       

  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO payment (pay_full,pay_bank,pay_amount,pay_date,pay_time,image) VALUES ('$pay_full' , '$pay_bank' , '$pay_amount' , '$pay_date' , '$pay_time','$image')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM images");
  header('Location: payment.php');
?>


