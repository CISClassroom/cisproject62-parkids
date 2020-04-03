<?php
session_start();

  // Create database connection
  error_reporting(~E_NOTICE);
  $db = mysqli_connect("localhost", "root", "", "parkidsplearn");
  mysqli_set_charset($db,"utf8");
  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
      // Get text
      
    
      $t_fullname = mysqli_real_escape_string($db, $_POST['t_fullname']);
      $t_gender   =  mysqli_real_escape_string($db, $_POST['t_gender']);
      $t_subject  =  mysqli_real_escape_string($db, $_POST['t_subject']);
      $t_class	 =  mysqli_real_escape_string($db, $_POST['t_class']);
      $t_location =  mysqli_real_escape_string($db, $_POST['t_location']);
      $t_province =  mysqli_real_escape_string($db, $_POST['t_province']);
      $t_about    =  mysqli_real_escape_string($db, $_POST['t_about']);
      $t_date     =  mysqli_real_escape_string($db, $_POST['t_date']);
      $t_time     =  mysqli_real_escape_string($db, $_POST['t_time']);
      $t_mobile   =  mysqli_real_escape_string($db, $_POST['t_mobile']);
      $t_email   =  mysqli_real_escape_string($db, $_POST['t_email']);
      $t_line     =  mysqli_real_escape_string($db, $_POST['t_line']);
      $t_cost     =  mysqli_real_escape_string($db, $_POST['t_cost']);


  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO register_tutor (t_fullname,t_gender,t_subject,t_class,t_location,t_province,t_about,t_date,t_time,t_mobile,t_email,t_line,t_cost,image) VALUES ('$t_fullname' , '$t_gender' , '$t_subject' , '$t_class' ,'$t_location' ,'$t_province' , '$t_about' ,'$t_date' ,'$t_time' , '$t_mobile' ,'$t_email' , '$t_line' , '$t_cost','$image')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM register_tutor");
 
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


            <title> สมัครเป็นติวเตอร์</title>
 
   </head>

    <style type=text/css>
    body {
            background-image: url("images/b.png");
            width:100%;
            height: 70vh;
            background-repeat: no-repeat;
            background-size: cover;
            font-family: 'Athiti', sans-serif;
         }
        .w3-button {width:150px;
            background-color: #0085ac;
            color: white;}
        

        .teacher{
                   
        -webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
        box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75); 
        width: 1000px;
        height: 800;
        margin: auto;
        text-align: center;
        margin-top: 30px; 
   
        }

        h1,h3,h5{
            font-family: 'Athiti', sans-serif;
        }

    </style>
       
    
<body>
    <h5> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="index_teacher.php">กลับไปยังหน้าหลัก </a></h5>

    <center>

                
        <br>
        <?php   $id = $_SESSION["member_fullname"];
                $userData="SELECT * FROM `register_tutor` WHERE `t_fullname`='$id'";
                $userDataQuery=mysqli_query($db,$userData);
                while ($row = mysqli_fetch_assoc($userDataQuery)) {
                    $t_fullname = $row["t_fullname"];
                    $t_gender = $row["t_gender"];
                    $t_location = $row["t_location"];
                    $t_province = $row["t_province"];
                    $t_about = $row["t_about"];
                    $t_date = $row["t_date"];
                    $t_time = $row["t_time"];
                    $t_mobile = $row["t_mobile"];
                    $t_email = $row["t_email"];
                    $t_line = $row["t_line"];
                    $t_cost = $row["t_cost"];

                } ?>
        <button class="w3-btn " style="width:20%"><h1> สมัครเป็นติวเตอร์ </h1></button>
        
        <br>
        <form class="form-groub" action="FormTeacher.php" method="POST" enctype="multipart/form-data">



        <div class="teacher"> <br><br>

        <figure class="figure">
            <img id="imgUpload" class="figure-img img-fluid rounded" alt="" >
            <figcaption class="figure-caption">
        </figure>

            <label>อัพโหลดรูปภาพ : </label> &nbsp;&nbsp;
            <input type="hidden" name="size" value="1000000">
            <input type="file" class="form-control" name="image" id="image"  > 
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <br><br><br>

            <label for="fullName">ชื่อ - นามสกุล : </label>
            <input type="varchar" class="form-control" name="t_fullname" id="t_fullname" value="<?php echo $t_fullname;?>" required> 
             <br><br>

            <label for="gender">เพศ : </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="t_gender" value="หญิง" <?php if($t_gender=="หญิง"){echo "checked";} ?>> หญิง &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="t_gender" value="ชาย" <?php if($t_gender=="ชาย"){echo "checked";} ?>> ชาย <br><br>

    

            <label for="subject">วิชา : </label>
            <select class="custom-select d-block w-100" name="t_subject" id="t_subject"  required>
            <option>คณิตศาสตร์</option>
            <option>ภาษาไทย</option>
            <option>วิทยาศาสตร์</option>
            <option>สังคมศึกษา</option>
            <option>ภาษาอังกฤษ</option>

            <option>ว่ายน้ำ</option>
            <option>ฟุตบอล</option>
            <option>เทควันโด</option>
            <option>แบตมินตัน</option>
            <option>วอลเล่ย์บอล</option>

            <option>เปียโน</option>
            <option>ร้องเพลง</option>
            <option>กีต้าร์</option>
            <option>ไวโอลิน</option>
            <option>วาดภาพ</option>

            <option>ทำอาหาร</option>
            <option>ทำขนม</option>
            </select>
            <br><br>

            <label for="class">ระดับชั้นที่สอน : </label>
            <select class="custom-select d-block w-100" name="t_class" id="t_class" required>
            <option>อนุบาล 1</option>
            <option>อนุบาล 2</option>
            <option>อนุบาล 3</option>
            <option>ประถมศึกษาปีที่ 1</option>
            <option>ประถมศึกษาปีที่ 2</option>
            <option>ประถมศึกษาปีที่ 3</option>
            <option>ประถมศึกษาปีที่ 4</option>
            <option>ประถมศึกษาปีที่ 5</option>
            <option>ประถมศึกษาปีที่ 6</option>
            </select>
            <br><br>

        
            <label for="location">สถานที่สอน : </label>
            <input style="width: 400px; height: 100px;" name="t_location" id="t_location" value="<?php echo $t_location;?>"></input>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <label for="province">จังหวัด : </label>
            <input type="varchar" class="form-control" name="t_province" id="t_province" value="<?php echo $t_province;?>"  required>
            <br><br><br>
                            
            <label for="about">รายละเอียดเกี่ยวกับติวเตอร์ : </label>
            <input style="width: 400px; height: 100px;" name="t_about" id="t_about" value="<?php echo $t_about;?>"></input>
            <br><br><br>
                            
            <label for="date">วันที่สอน : </label>
            <input type="varchar" class="form-control" name="t_date" id="t_date"  value="<?php echo $t_date;?>" required>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      
            <label for="time">เวลาที่สอน : </label>
            <input type="varchar" class="form-control" name="t_time" id="t_time" value="<?php echo $t_time;?>" required>
            <br><br>

            <label for="mobile">เบอร์โทรติดต่อ : </label>
            <input type="varchar" class="form-control" name="t_mobile" id="	t_mobile"  value="<?php echo $t_mobile;?>" required>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                           
            <label for="e-mail">E-mail : </label>
            <input type="varchar" class="form-control" name="t_email" id="t_email" value="<?php echo $t_email;?>" required>
            <br><br> 

            <label for="line">Line ID : </label>
            <input type="varchar" class="form-control" name="t_line" id="t_line" value="<?php echo $t_line;?>" required>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <label for="cost">ค่าเรียน/ชั่วโมง : </label>
            <input type="varchar" class="form-control" name="t_cost" id="t_cost" value="<?php echo $t_cost;?>" required>
            <br><br><br>  </div> 

            <br><br>

                

            <div class="button">
            
            <h3><button onclick="myFunction()" class="w3-button "type="submit" name="upload"> ยืนยัน</h3></a></button>

            <script>
            function myFunction() {
            alert("ยืนยันการสมัครเป็นติวเตอร์");
    }
</script>
            </div>
            
            <script src="node_modules/jquery/dist/jquery.min.js" ></script>
            <script src="node_modules/bootstrap/dist/js/bootstrap.min.js" ></script>
            <script src="node_modules/popper.js/dist/.min.js" ></script>
            <script type='text/javascript'>

                     
        </div>
        </center>
    </body>
</html>
    