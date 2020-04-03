<?php
// Start the session
session_start();
$connect = mysqli_connect("localhost", "root","", "parkidsplearn");
$tab_query = "SELECT * FROM member ORDER BY member_id ASC";
$tab_result = mysqli_query($connect, $tab_query);
$tab_menu = '';
$tab_content = '';
 $product_query = "SELECT * FROM member WHERE member_id  ";
 $product_result = mysqli_query($connect, $product_query);

 

?>
<!DOCTYPE html>
<html>
<title>MyProfile</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Athiti" rel="stylesheet">

  </header>
  

<style>

      body,h1,h4
        {font-family: 'Athiti', sans-serif;}

      .w3-container {
        background-image: url("images/b.png");
        width: 800px;
        height: 550px;
        margin: auto;
        background-size: cover;
        font-size: 20px;
        -webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
        box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75); }

     
</style>


<body 

class="w3-light-grey w3-content" style="max-width:1600px">


<br><br>
    <div class="w3-container">
    <br><br>
    <h1><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; My Profile</b></h1>

  <!-- Detail -->
  <?php
    $member_id= $_GET['member_id'];

    $member_query = "SELECT * FROM member WHERE member_id='$member_id' ";
    $member_result = mysqli_query($connect, $member_query);
    while($row = mysqli_fetch_array($member_result))
    {
   echo '<div class="col-md-3" style="margin:70px;"></div>';
   echo '<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          ชื่อ-นามสกุล : '.$row["member_fullname"].'</h4>';
   echo '<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          เพศ : '.$row["member_gender"].'</h4>';
   echo '<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          วันเดือนปีเกิด : '.$row["member_birthday"].'</h4>';
   echo '<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          Username : '.$row["member_username"].'</h4>';
   echo '<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          Password : '.$row["member_password"].'</h4>';
   echo '<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          Status : '.$row["member_status"].'<br><br><br><br><br><br><br></h4>';  
   

  echo '</div>';
 

    }  
   ?>


    </div>
  </div>
</div>


</body>
</html>
