<?php
$con = mysqli_connect("localhost","root","","parkidsplearn");

mysqli_set_charset($con,"utf8");

$student_id = $_GET["student_id"];

$query = "DELETE FROM register_student WHERE student_id='$student_id'";
mysqli_query($con,$query);

header("Location:information_student.php");
?>

