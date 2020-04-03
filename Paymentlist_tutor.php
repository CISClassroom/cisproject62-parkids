<?php
// Start the session
session_start();
if($_SESSION["member_status"]!=3){
echo "หน้านี้เฉพาะครู";
}
else{
$user=$_SESSION["member_fullname"];
$connect = mysqli_connect("localhost", "root", "", "parkidsplearn");
mysqli_set_charset($connect,"utf8");
 $tab_query = "SELECT * FROM upslip ORDER BY upslip_id ASC";
 $tab_result = mysqli_query($connect, $tab_query);
 $tab_menu = '';
 $tab_content = '';
 $product_query = "SELECT * FROM upslip where u_fullname = '$user' ORDER BY upslip_id ASC";
 $product_result = mysqli_query($connect, $product_query);
 while($sub_row = mysqli_fetch_array($product_result))
 {
  $tab_content .= '
  <div class="col-md-3" style="margin-bottom:36px;">
   <img src="images/'.$sub_row["image"].'" class="img-responsive img-thumbnail" style="width:200px; height:330px;"/>
   <h4>ชื่อ-นามสกุล : '.$sub_row["u_fullname"].'</h4>
   <h4>ธนาคาร : '.$sub_row["u_bank"].'</h4>
   <h4>จำนวนเงิน : '.$sub_row["u_amount"].' บาท</h4>
   <h4>วันที่โอน : '.$sub_row["u_date"].'</h4>
   <h4>เวลาที่โอน : '.$sub_row["u_time"].'</h4>

   
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
    

            <title> รายได้ของฉัน </title>

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
         height: 13%;
         background-color: #0085ac;
         padding: 15px 15px;
            }

    .top a {
        float: right;
        color: white;
        padding: 1px 20px;
        font-size: 17px;
               }

  
        .mean {  
            text-align: left;
            color: black;
        }

        .mean a {
        color: white;
        font-family: 'Athiti', sans-serif;
        }

h3{
   text-align: left;  
}


.w3-button {width:150px;}

</style>

   <body>
   <div class="top-bar">

<div class="mean">
<h4> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index_teacher.php">กลับไปยังหน้าหลัก </a></h4>
 

<div class="top">
    <?php
    if (isset($_SESSION['member_id'])){
        echo "<h5><a href='profile.php'> ".$_SESSION['member_username'];
        echo "<br>";
        echo "<h5><a href='logout.php'>ออกจากระบบ</a></h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ";
      }
      else{
        echo "<h5><a href='login.php'> เข้าสู่ระบบ</a></h5>";
      }  
               
     ?>
    </div>
    </div>
    </div>
      <br>
                <h2><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; รายได้ของฉัน</h2></b><br>

    


        <div class="container">
       <br />
       <ul class="nav nav-tabs">
       </ul>
       <div class="tab-content">
       <br />
       <?php
       echo $tab_content;
    }
       ?>
       </div>
       </div>
  
       </body>
</html>