<?php
$con = mysqli_connect("localhost","root","","parkidsplearn");
mysqli_set_charset($con,"utf8");
$id =$_GET["id"];
$name = $_GET["name"];
$gender = $_GET["gender"];
$category=$_GET["category"];
$subject = $_GET["subject"];
$class = $_GET["class"];
$mobile = $_GET["mobile"];
$email = $_GET["email"];
$line = $_GET["line"];
$cost = $_GET["cost"];
$sql="UPDATE `register_tutor` SET
`t_fullname`='$name',
`t_gender`='$gender',
`t_category`='$category',
`t_subject`='$subject',
`t_class`='$class',
`t_mobile`='$mobile',
`t_email`='$email',
`t_line`='$line',
`t_cost`='$cost'
WHERE `register_tutor`.`tutor_id` = '$id'";
mysqli_query($con,$sql);
Header("Location: information_tutor.php");
?>