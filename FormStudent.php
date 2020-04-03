<?php
// Start the session
session_start();
$connect = mysqli_connect("localhost", "root", "", "parkidsplearn");
$tutor_id = $_GET["tutor_id"];
$tutor_query = "SELECT * FROM register_tutor WHERE tutor_id='$tutor_id'";
$tutor_result = mysqli_query($connect, $tutor_query);

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

   
    <title> สมัครเรียน</title>
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
        .w3-button {
            width:150px;
            font-family: 'Athiti', sans-serif;
            background-color: #0085ac;
            color: white;
            text-align: center;
        }

        h1 ,h3, h5 {
        font-family: 'Athiti', sans-serif;
        }

        .student{
                   
                   -webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
                   -moz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
                   box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75); 
                   width: 1000px;
                   margin: auto;
                   text-align: center;
                   margin-top: 30px; 
   
               }
        .parent{
                   -webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
                   -moz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
                   box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75); 
                   width: 1000px;
                   margin: auto;
                   text-align: center;
                   margin-top: 30px; 

        }
    </style>

    <body>
            <h5> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="index_student.php">กลับไปยังหน้าหลัก </a></h5>


        <center>
       <br><h1><b> สมัครเรียน </h1></b><br>
         
       <?php
    $tutor_id= $_GET['tutor_id'];

    $tutor_query = "SELECT * FROM register_tutor WHERE tutor_id='$tutor_id' ";
    $tutor_result = mysqli_query($connect, $tutor_query);
    $row = mysqli_fetch_array($tutor_result);
        ?>
       <form class="form-groub" action="insert_FormStudent.php" method="GET" 
        
      
        <center> 
        <div class="student"> <br><br>

         <center> <h3><u>  ข้อมูลผู้เรียน</h3></u> </center><br><br>
            <input type="hidden" class="custom-select d-block w-100" name="tutor_id" id="tutor_id" value="<?php echo "$tutor_id"?>" readonly required>
            <br><br>

            <label for="fullname">ชื่อ-นามสกุล : </label>
            <input type="varchar" class="form-control" name="s_fullname" id="s_fullname" value="<?php echo $_SESSION["member_fullname"]?>" readonly required> 
              <br><br>


            <label for="gender">เพศ : </label>      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="s_gender" value="หญิง"> หญิง     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="s_gender" value="ชาย"> ชาย  <br><br>


            <label for="class">ระดับชั้น : </label>
            <select class="custom-select d-block w-100" name="s_class" id="s_class" required>
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

            <label for="location">สถานที่เรียน : </label>
            <textarea style="width: 400px; height: 100px;" name="s_location" id="s_location"></textarea>
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <label for="province">จังหวัด : </label>
            <input type="varchar" class="form-control" name="s_province" id="s_province"  required>
            <br><br><br>

            <label for="Date">วันที่ต้องการเรียน : </label>
            <input type="varchar" class="form-control" name="s_date" id="s_date" required>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      
            <label for="Time">เวลาที่เรียน : </label>
            <input type="varchar" class="form-control" name="s_time" id="s_time" required>
            <br><br><br><br> </label> 
     
        </center></div><br>

        
        

        <div class="parent">   
        
        <center><br><u> <h3>ข้อมูลผู้ปกครอง</h3></u> <br>
         <br><br>
            <label for="fullname">ชื่อ-นามสกุล: </label>
            <input type="varchar" class="form-control" name="p_fullname" id="p_fullname" required> 
             <br><br>

            <label for="Line ID">Line ID : </label>
            <input type="varchar" class="form-control" name="p_line" id="p_line" required>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <label for="Mobile">เบอร์โทรติดต่อ : </label>
            <input type="varchar" class="form-control" name="p_mobile" id="p_mobile" required>   <br><br>

            <label for="E-mail">E-mail : </label>
            <input type="varchar" class="form-control" name="p_email" id="p_email"  required>  <br><br><br>
            </div><br><br>
           
</center>



            <div class="button">
            <center>
            <h3><button onclick="myFunction()" class="w3-button "type="submit" name="upload"> ยืนยัน</h3></a></button>

            <script>
            function myFunction() {
            alert("ยืนยันการสมัครเรียน");
    }
</script>
            </div>
</center>
 
                  

    
</body>
</html>


           