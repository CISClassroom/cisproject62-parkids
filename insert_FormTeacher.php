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
      
        $t_fullname = mysqli_real_escape_string($db, $_POST['t_fullname']);
        $t_gender   =  mysqli_real_escape_string($db, $_POST['t_gender']);
        $t_subject  =  mysqli_real_escape_string($db, $_POST['t_subject']);
        $t_class	 =  mysqli_real_escape_string($db, $_POST['t_class']);
        $t_location =  mysqli_real_escape_string($db, $_POST['t_location']);
        $t_province =  mysqli_real_escape_string($db, $_POST['t_province']);
        $t_about    =  mysqli_real_escape_string($db, $_POST['t_about']);
        $t_date     =  mysqli_real_escape_string($db, $_POST['t_date']);
        $t_time     =  mysqli_real_escape_string($db, $_POST['t_time']);
        $t_mobile   =  mysqli_real_escape_string($db, $_POST['t_mobile']);
        $t_email   =  mysqli_real_escape_string($db, $_POST['t_email']);
        $t_line     =  mysqli_real_escape_string($db, $_POST['t_line']);
        $t_cost     =  mysqli_real_escape_string($db, $_POST['t_cost']);


  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO register_tutor (t_fullname,t_gender,t_subject,t_class,t_location,t_province,t_about,t_date,t_time,t_mobile,t_email,t_line,t_cost,image) VALUES ('$t_fullname' , '$t_gender' , '$t_subject' , '$t_class' ,'$t_location' ,'$t_province' , '$t_about' ,'$t_date' ,'$t_time' , '$t_mobile' ,'$t_email' , '$t_line' , '$t_cost','$image')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM images");
  header('Location: FormTeacher.php');

?>


