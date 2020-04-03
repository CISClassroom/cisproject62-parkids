<?php

$con = mysqli_connect("localhost","root","","parkidsplearn");
mysqli_set_charset($con,"utf8");

 $tutor_id = $_GET['tutor_id'];
 $s_fullname = $_GET['s_fullname'];
 $s_gender    = $_GET['s_gender'];
 //$s_category  = $_GET['s_category']; 
 //$s_subject   = $_GET['s_subject'];
 $s_class	  = $_GET['s_class'];
 $s_location  = $_GET['s_location'];
 $s_province  = $_GET['s_province'];
 $s_date      = $_GET['s_date'];
 $s_time      = $_GET['s_time'];
 $p_fullname = $_GET['p_fullname'];
 $p_line      = $_GET['p_line'];
 $p_mobile    = $_GET['p_mobile'];
 $p_email     = $_GET['p_email'];



 $query = "INSERT INTO `register_student`(`student_id`, `tutor_id`, `s_fullname`, `s_gender`, `s_class`, `s_location`, `s_province`, `s_date`, `s_time`, `p_fullname`, `p_line`, `p_mobile`, `p_email`) 
 VALUES (NULL, '$tutor_id', '$s_fullname', '$s_gender', '$s_class', '$s_location', '$s_province', '$s_date', '$s_time', '$p_fullname', '$p_line', '$p_mobile', '$p_email')";
  
  
  mysqli_query($con,$query);
  header('Location: index_student.php');
 ?>

