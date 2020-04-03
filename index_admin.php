<?php
// Start the session
session_start();
$connect = mysqli_connect("localhost", "root", "", "parkidsplearn");
$tab_query = "SELECT * FROM register_tutor ORDER BY tutor_id ASC";
$tab_result = mysqli_query($connect, $tab_query);
$tab_menu = '';
$tab_content = '';
 $product_query = "SELECT * FROM register_tutor WHERE tutor_id ";
 $product_result = mysqli_query($connect, $product_query);
 while($sub_row = mysqli_fetch_array($product_result))
 {
  $tab_content .= '
  <div class="col-md-3" style="margin-bottom:36px;">
  <a href="profile_tutor.php?tutor_id='.$sub_row["tutor_id"].'"><img src="images/'.$sub_row["image"].'" class="img-responsive img-thumbnail" style="width:200px; height:200px;"/>
  <h4>'.$sub_row["t_fullname"].'</h4>
  <h4>วิชา : '.$sub_row["t_subject"].'</h4>
  <h4>เบอร์โทร : '.$sub_row["t_mobile"].'</h4>
  <h4>ค่าใช้จ่าย/ชั่วโมง : '.$sub_row["t_cost"].' บาท</h4>

  </div></a>
  ';
 }
 $tab_content .= '<div style="clear:both"></div></div>';

?>
<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">
    <link href="https://fonts.googleapis.com/css?family=Athiti" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
    <title>Home : ผู้ดูแลระบบ</title>
    <style>
                    .card {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            width: 15%;
            border-radius: 5px;
            margin: 40px;
            display: inline-block;
            }

            .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
            }

            img {
            border-radius: 5px 5px 0 0;
            }

            .container {
            padding: 2px 16px;
            }
            </style>
                
</head>

    <style type=text/css>

        body
        {font-family: 'Athiti', sans-serif;}

        .top-bar{
            text-align: right;
            width: 100%;
            height: 10%;
            background-color: #0085ac;
            padding: 12px 15px;
           
        }

        .top-bar a {
            float: right;
           color: white;
           padding: 1px 15px;
           font-size: 17px;
        }
    
        .bar {

            width:100%;
            height: 60vh;
            background-image: url("images/pkp6.png");
            background-repeat: no-repeat;
            background-size: cover;
            text-align: center;
        }
       
        .menu{
            background-color: rgb(255, 255, 255);
            text-align: right; 
             
        }

        .menu a {
            background-color: #0085ac;
            color: white;
         
        }

        .w3-button {width:150px;}

        .label{
            text-align: right;
        }



    </style>
   
<body onload="myFunction()">

        <div class="top-bar">
        <?php
        if (isset($_SESSION['member_id'])){
            echo "<h5><a href='Profile.php'> ".$_SESSION['member_username'];
            echo "<br>";
            echo "<h5><a href='logout.php'>ออกจากระบบ</a></h5>";
          }
          else{
            echo "<h5><a href='login.php'> เข้าสู่ระบบ</a></h5>";
          }
         ?>
        </div>
   

<center>
<div class="bar" style="max-width:100%">

<img class="mySlides" src="images/pkp12.png"  style="width:100%">
<img class="mySlides" src="images/pkp11.png" style="width:100%">

<button class="w3-button w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
<button class="w3-button w3-display-right" onclick="plusDivs(1)">&#10095;</button>
</div>

<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
showDivs(slideIndex += n);
}

function showDivs(n) {
var i;
var x = document.getElementsByClassName("mySlides");
if (n > x.length) {slideIndex = 1}
if (n < 1) {slideIndex = x.length}
for (i = 0; i < x.length; i++) {
  x[i].style.display = "none";  
}
x[slideIndex-1].style.display = "block";  
}
</script>
</center>

    
        <br><br><br><br><br><br>
     

</div>
</center>

    <div class="menu"> <br>

        <a href="information_member.php" class="w3-btn"><h4> ข้อมูลสมาชิก</h4></a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        <a href="information_tutor.php" class="w3-btn" ><h4> ข้อมูลติวเตอร์</h4></a></button>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        <a href="information_student.php"class="w3-btn" ><h4> ข้อมูลการสมัครเรียน </h4></a></button>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
        <a href="Paymentlist.php" class="w3-btn " ><h4> รายการชำระเงินจากผู้สมัครเรียน</h4></a></button>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        <a href="upslip.php" class="w3-btn" ><h4> แจ้งรายได้ให้ติวเตอร์</h4></a></button>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
 
   </div>
   
   <br><br>


   <div class=text>
         <h2><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         บริการคิดส์เพลิน</h2></b>
    </div>
 

     <div class="container">
     <br />
     <ul class="nav nav-tabs">
     </ul>
     <div class="tab-content">
     <br />
     <?php
     echo $tab_content;
     ?>
     </div>
     </div>



   </div>

   <script>
function myFunction() {
  alert("ยินดีต้อนรับแอดมิน!");
}
</script>
</body>
</html>