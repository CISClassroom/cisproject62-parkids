<?php
$con = mysqli_connect("localhost","root","","parkidsplearn");
mysqli_set_charset($con,"utf8");
$id =$_GET["id"];
$name = $_GET["name"];
$birthday=$_GET["birthday"];
$username = $_GET["username"];
$password = $_GET["password"];
$status = $_GET["status"];
$sql="UPDATE `member` SET
`member_fullname`='$name ',
`member_gender`='$name',
`member_birthday`='$birthday',
`member_username`='$username',
`member_password`='$password',
`member_status`='$status'
WHERE `member`.`member_id` = '$id'";
mysqli_query($con,$sql);
Header("Location: information_member.php");
?>