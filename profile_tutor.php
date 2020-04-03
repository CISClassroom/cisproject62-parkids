<?php
// Start the session
session_start();
$connect = mysqli_connect("localhost", "root","", "parkidsplearn");
$tab_query = "SELECT * FROM register_tutor ORDER BY tutor_id ASC";
$tab_result = mysqli_query($connect, $tab_query);
$tab_menu = '';
$tab_content = '';
 $product_query = "SELECT * FROM register_tutor WHERE tutor_id ";
 $product_result = mysqli_query($connect, $product_query);

 

?>
<!DOCTYPE html>
<html>
<title>Profile tutor</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Athiti" rel="stylesheet">


  

<style>

      body,h1,h4
        {font-family: 'Athiti', sans-serif;}

      .detail {
        background-color: #FEC9CB;}
</style>


<body 
 
class="w3-light-grey w3-content" style="max-width:1600px">

<!-- Sidebar/menu -->

<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:320px;" id="mySidebar"><br>
  <div class="w3-container">
    <a href="#" onclick="w3_close()" 
    class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu"
    
      <i class="fa"></i>
    </a>
    <?php
    $tutor_id= $_GET['tutor_id'];

    $tutor_query = "SELECT * FROM register_tutor WHERE tutor_id='$tutor_id' ";
    $tutor_result = mysqli_query($connect, $tutor_query);
    while($row = mysqli_fetch_array($tutor_result))
    {

   echo '<div class="col-md-3" style="margin-bottom:36px;">';
   echo '<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img  src="images/'.$row["image"].'"  class="img-responsive img-thumbnail" style="width:200px; height:200px;"/>';
   echo '<br><br><h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;             '.$row["t_fullname"].'</h4>';
   echo '<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       วิชาที่สอน : '.$row["t_subject"].'</h4>';
   echo '<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       เบอร์โทร : '.$row["t_mobile"].'</h4>';
   echo '<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       ค่าใช้จ่าย/ชั่วโมง : '.$row["t_cost"].'บาท</h4>';

  echo '</div>';
   
    }
   ?>
   
</nav> 

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">


<div class = detail>  
  <!-- Header -->
  <header id="portfolio">
    <a href="#"><img src="/w3images/avatar_g2.jpg" style="width:70px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa "></i></span>
    <div class="w3-container">
    <br><br>
    <h1><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; โปรไฟล์ติวเตอร์</b></h1>
    </div>
  </header>

  <!-- Detail -->
  
  <?php
    $tutor_id= $_GET['tutor_id'];

    $tutor_query = "SELECT * FROM register_tutor WHERE tutor_id='$tutor_id' ";
    $tutor_result = mysqli_query($connect, $tutor_query);
    while($row = mysqli_fetch_array($tutor_result))
    {
   echo '<div class="col-md-3" style="margin:70px;"></div>';
   echo '<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          ชื่อครูผู้สอน : '.$row["t_fullname"].'</h4>';
   echo '<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          วิชาที่สอน : '.$row["t_subject"].'</h4>';
   echo '<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          เบอร์โทรติดต่อ : '.$row["t_mobile"].'</h4>';
   echo '<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          ค่าใช้จ่าย/ชั่วโมง : '.$row["t_cost"].'</h4>';
   echo '<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          สถานที่สอน : '.$row["t_location"].'</h4>';
   echo '<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          จังหวัด : '.$row["t_province"].'</h4>';
   echo '<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          รายละเอียดเกี่ยวกับติวเตอร์ : '.$row["t_about"].'</h4>';
   echo '<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          วันที่สอน : '.$row["t_date"].'</h4>';
   echo '<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          E-mail : '.$row["t_email"].'</h4>';
   echo '<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
          ID Line : '.$row["t_line"].'<br><br><br><br><br></h4>';

  echo '</div>';
   

    }
   ?>

</div>

</body>
</html>
