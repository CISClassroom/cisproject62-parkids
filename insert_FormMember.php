<?php 

 
 $con = mysqli_connect("localhost","root","","parkidsplearn");
 mysqli_set_charset($con,"utf8");

 $member_fullname = $_GET['member_fullname'];
 $member_gender = $_GET['member_gender'];
 $member_birthday = $_GET['member_birthday'];
 $member_username = $_GET['member_username'];
 $member_password = $_GET['member_password'];
 $member_status = $_GET['member_status'];

      
      
 $query = "INSERT INTO `member` (`member_id`, `member_fullname`, `member_gender`,`member_birthday`, `member_username`, `member_password`, `member_status`) 
 VALUES (NULL, '$member_fullname', '$member_gender','$member_birthday', '$member_username', '$member_password', '$member_status')";
 mysqli_query($con,$query);
 header('Location: Login.php');
?>

