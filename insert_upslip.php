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

        $u_firstname = mysqli_real_escape_string($db, $_POST['u_fullname']);
        $u_bank  =  mysqli_real_escape_string($db, $_POST['u_bank']);
        $u_amount   =  mysqli_real_escape_string($db, $_POST['u_amount ']);
        $u_date	 =  mysqli_real_escape_string($db, $_POST['u_date']);
        $u_time =  mysqli_real_escape_string($db, $_POST['u_time']);
        
       

  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO upslip (u_fullname, u_bank, u_amount, u_date, u_time, image) VALUES ('$u_fullname' , '$u_bank' , '$u_amount' , '$u_date' , '$u_time','$image')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM images");
  header('Location: upslip.php');
?>
