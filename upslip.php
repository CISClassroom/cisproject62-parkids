<?php
// Start the session
session_start();

// Create database connection
  $db = mysqli_connect("localhost", "root", "", "parkidsplearn");
  //mysqli_set_charset($con,"utf8");
  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text

        $u_fullname = mysqli_real_escape_string($db, $_POST['u_fullname']);
        $u_bank  =  mysqli_real_escape_string($db, $_POST['u_bank']);
        $u_amount   =  mysqli_real_escape_string($db, $_POST['u_amount']);
        $u_date	 =  mysqli_real_escape_string($db, $_POST['u_date']);
        $u_time =  mysqli_real_escape_string($db, $_POST['u_time']);
        
       

  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO upslip (u_fullname, u_bank, u_amount, u_date, u_time, image) VALUES ('$u_fullname' , '$u_bank' , '$u_amount' , '$u_date' , '$u_time','$image')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM upslip");

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
    
    

    <title>แจ้งรายได้ให้ติวเตอร์</title>
 
   </head>
   <style type=text/css>


     body
        {font-family: 'Athiti', sans-serif;}

        .top-bar{
         text-align: right;
         width: 100%;
         height: 11%;
         background-color: #0085ac;
         padding: 4px 15px;
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

     h1,h2,h3,h5{
        font-family: 'Athiti', sans-serif;
        text-align: left;  
     }

    .upslip{
                   
        -webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
        box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75); 
        width: 950px;
        height: 450;
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
        .button {
        width:110px;
        font-family: 'Athiti', sans-serif;
        margin: center;
        text-align: center;
        background-color: #0085ac;
         }
           

</style>

<body>
          
   <div class="top-bar">

<div class="mean">
<h5> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="index_admin.php">กลับไปยังหน้าหลัก </a>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="upsliplist.php">รายการที่ชำระทั้งหมด </a></h5>
    </div>
    </div>

  

  
         <br>
         <h2><b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; แจ้งรายได้ให้ติวเตอร์</h2></b> 
         <br>


     <center>

        <form class="form-groub" action="upslip.php" method="POST" enctype="multipart/form-data">

       <div class ="upslip"> <br><br>

    <figure class="figure">
    <img id="imgUpload" class="figure-img img-fluid rounded" alt="" onchange="readURL(this);">
    <figcaption class="figure-caption">
    </figure>

    <label>อัพโหลดรูปภาพ : </label> &nbsp;&nbsp;
    <input type="hidden" name="size" value="1000000">
    <input type="file" class="form-control" name="image" id="image" onchange="readURL(this);" > 
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <br><br><br>

    
    <label for="fullName">ชื่อ-นามสกุล ผู้รับ : </label>
    <select class="form-control" name="u_fullname" id="u_fullname"  required>
        <?php $connect = mysqli_connect("localhost", "root", "", "parkidsplearn");
        mysqli_set_charset($connect,"utf8");
        $product_query = "SELECT * FROM `member` WHERE `member_status`=3";
        $product_result = mysqli_query($connect, $product_query);
        while($sub_row = mysqli_fetch_array($product_result)){?>
    <option value="<?php echo $sub_row["member_fullname"];?>"><?php echo $sub_row["member_fullname"];?></option>
 <?php } ?>
    </select>
    <br><br>
    
    <label for="bank"> ธนาคาร : </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio" name="u_bank" value="KTB"> ธนาคารกรุงไทย 
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio" name="u_bank" value="SCB"> ธนาคารไทยพาณิชย์ <br><br>

    <label for="Baht"> จำนวนเงินที่โอน : </label> 
    <input type="varchar" class="form-control" name="u_amount" id="u_amount"  required>  <br><br>

    <label for="date"> วันที่โอน : </label> 
    <input type="date" class="form-control" name="u_date" id="u_date"  required>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 

    <label for="time"> เวลาที่โอน : </label> 
    <input type="time" class="form-control" name="u_time" id="u_time"  required> 
    </div><br><br>


        <div class="button">
            
            <h3><button onclick="myFunction()" class="w3-button "type="submit" name="upload"> ชำระเงิน</h3></a></button>

            <script>
            function myFunction() {
            alert("ยืนยันการแจ้งรายได้ให้ติวเตอร์");
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


   
