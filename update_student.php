<?php
$con = mysqli_connect("localhost","root","","parkidsplearn");
mysqli_set_charset($con,"utf8");
$id =$_GET["id"];
$name = $_GET["name"];
$gender = $_GET["gender"];
$location=$_GET["location"];
$s_province = $_GET["province"];
$class = $_GET["class"];
$s_date = $_GET["date"];
$s_time = $_GET["time"];
$p_fullname = $_GET["p_fullname"];
$mobile = $_GET["mobile"];
$email = $_GET["email"];
$line = $_GET["line"];

$sql="UPDATE `register_student` SET
`s_fullname`='$name',
`s_gender`='$gender',
`s_location`='$location',
`s_province`='$s_province',
`s_class`='$class',
`s_date`='$s_date',
`s_time`='$s_time',
`p_fullname`='$p_fullname',
`p_mobile`='$mobile',
`p_email`='$email',
`p_line`='$line',

WHERE `register_student`.`student_id` = '$id'";
mysqli_query($con,$sql);
Header("Location: information_student.php");
?>