<?php
session_start();
  $db = mysqli_connect("localhost", "root", "", "parkidsplearn");
  //mysqli_set_charset($con,"utf8");
  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
      // Get text
      
    
        $pay_full = mysqli_real_escape_string($db, $_POST['pay_full']);
        $pay_bank  =  mysqli_real_escape_string($db, $_POST['pay_bank']);
        $pay_amount   =  mysqli_real_escape_string($db, $_POST['pay_amount']);
        $pay_date	 =  mysqli_real_escape_string($db, $_POST['pay_date']);
        $pay_time =  mysqli_real_escape_string($db, $_POST['pay_time']);


  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO payment (pay_full,pay_bank,pay_amount,pay_date,pay_time,image) VALUES ('$pay_full','$pay_bank','$pay_amount','$pay_date','$pay_time','$image')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM payment");
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
    

    <title> Payment </title>
 
   </head>

   <style type=text/css>

    body {
        font-family: 'Athiti', sans-serif;
    }
    .w3-button {
        width:200px;
        font-family: 'Athiti', sans-serif;
        background-color: #0085ac;
        color: white;
        }
        
    h1 ,h5 {
        font-family: 'Athiti', sans-serif;
    }
    .top-bar{
         text-align: right;
         width: 100%;
         height: 13%;
         background-color: #0085ac;
         padding: 1px 15px;
            }

    .top a {
        float: right;
        color: white;
        padding: 0px 20px;
        font-size: 17px;
               }

    .mean{
        text-align: left;
        color: white;
    }

    .payment{
        background-color: rgba(255, 255, 255, 0.658);
        -webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
        box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75); 
        width: 1000px;
        height: 500;
        margin: auto;
        text-align: center;
        margin-top: 30px; 
        background-color: #b9e5fb;
              
    }
    input[type=varchar]  {
        width: 30%;
        height: 40;
        padding: 10px 15px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        }
  
    </style>

<body>


<div class="top-bar">

<div class="mean">
<h5> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="index_student.php">กลับไปยังหน้าหลัก </a></h5>

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
<center>
        <br><br>
        <h1>แจ้งชำระค่าใช้จ่าย</h1>
        <br><br>

        <form class="form-groub" action="payment.php" method="POST" enctype="multipart/form-data">

        <div class ="payment"> <br><br>

        <figure class="figure">
            <img id="imgUpload" class="figure-img img-fluid rounded" alt="" onchange="readURL(this);">
            <figcaption class="figure-caption">
        </figure>

            <label>อัพโหลดรูปภาพ : </label> &nbsp;&nbsp;
            <input type="hidden" name="size" value="1000000">
            <input type="file" class="form-control" name="image" id="image" onchange="readURL(this);" > 
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <br><br><br>


            <label for="fullname">ชื่อ-นามสกุล : </label>
            <input type="varchar" class="form-control" name="pay_full" id="pay_full" value="<?php echo $_SESSION["member_fullname"]?>" required>
            <br><br>
            
            <label for="bank"> ธนาคาร : </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="pay_bank" value="KTB"> ธนาคารกรุงไทย 
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="pay_bank" value="SCB"> ธนาคารไทยพาณิชย์ <br><br>

            <label for="Baht"> จำนวนเงินที่โอน : </label> 
            <input type="varchar" class="form-control" name="pay_amount" id="pay_amount"  required>  <br><br>

            <label for="date"> วันที่โอน : </label> 
            <input type="date" class="form-control" name="pay_date" id="pay_date"  required>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
            <label for="time"> เวลาที่โอน : </label> 
            <input type="time" class="form-control" name="pay_time" id="pay_time"  required> 
        </div><br><br>




            <div class="button">
            
            <h3><button onclick="myFunction()" class="w3-button "type="submit" name="upload">แจ้งการชำระเงิน</h3></a></button>

            <script>
            function myFunction() {
            alert("ยืนยันการชำระเงิน");
    }
</script>
            </div>

        <script src="node_modules/jquery/dist/jquery.min.js" ></script>
            <script src="node_modules/bootstrap/dist/js/bootstrap.min.js" ></script>
            <script src="node_modules/popper.js/dist/.min.js" ></script>
            <script type='text/javascript'>

                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            $('#imgUpload')
                                .attr('src', e.target.result)
                                .width(250)
                                .height(250);
                        };

                        reader.readAsDataURL(input.files[0]);
                    }
                }

            </script>

                     
        </div>
        </center>
    </body>
</html>
    