<?php
$con = mysqli_connect("localhost","root","","parkidsplearn");

mysqli_set_charset($con,"utf8");

$tutor_id = $_GET["tutor_id"];

$query = "DELETE FROM register_tutor WHERE tutor_id='$tutor_id'";
mysqli_query($con,$query);

header("Location:information_tutor.php");
?>

