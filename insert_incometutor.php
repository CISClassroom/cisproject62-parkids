<?php 

$con = mysqli_connect("localhost","root","","parkidsplearn");
mysqli_set_charset($con,"utf8");

 $i_category   = $_GET['i_category'];
 $i_subject    = $_GET['i_subject'];
 $t_firstname    = $_GET['t_firstname'];
 $t_lastname  = $_GET['t_lastname'];
 $i_amount    = $_GET['i_amount'];
 $i_date    = $_GET['i_date']; 

      
    
 $query = "INSERT INTO `incometutor` (`incometutor_id`, `i_category`, `i_subject`, `t_firstname`, `t_lastname`, `i_amount`, `i_date`) 
 VALUES (NULL, '$i_category','$i_subject', '$t_firstname' , '$t_lastname' , '$i_amount' , '$i_date')";
 
  mysqli_query($con,$query);
  header('Location: incometutor.php');
 ?>