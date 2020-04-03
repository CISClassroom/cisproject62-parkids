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


   
    <title> สมัครสมาชิก</title>
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

        h1,h3,h5 {
          font-family: 'Athiti', sans-serif;
        }

        .w3-button {width:150px;
            background-color: #0085ac;
            color: white;}

        input[type=varchar] ,input[type=password] {
        width: 35%;
        height: 35;
        padding: 10px 15px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        }

        .member{
                   
        -webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
        box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75); 
        width: 800px;
        height: 500;
        margin: auto;
        text-align: center;
        margin-top: 30px; 
   
               }

    </style>

<body>

        <h5> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="index.php">กลับไปยังหน้าหลัก </a></h5>

    <center>
   <br><h1> สมัครสมาชิก</h1><br>
    
   <form class="form-groub" action="insert_FormMember.php" method="GET">
    
    <div class="member"> <br><br>
        
        <label for="fullName">ชื่อ-นามสกุล : </label>
        <input type="varchar" class="form-control" name="member_fullname" id="member_fullname" required>
         <br><br>

        <label for="gender">เพศ : </label>      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" name="member_gender" value="หญิง"> หญิง     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" name="member_gender" value="ชาย"> ชาย  <br><br>

        <label for="birthday">วัน/เดือน/ปีเกิด : </label>
        <input type="date" class="form-control" name="member_birthday" id="member_birthday" required>   <br><br>

        <label for="username">Username : </label>
        <input type="varchar" class="form-control" name="member_username" id="member_username"  required>   <br>
        <label> ***กรุณาจำ Username เพื่อเข้าสู่ระบบ </label>  
        <br><br>

        <label for="Password">Password : </label>
        <input type="password" class="form-control" name="member_password" id="member_password"  required>   <br>
        <label> ***กรุณาจำ Password เพื่อเข้าสู่ระบบ </label> <br><br>

        <label for="type">ประเภทการสมัคร : </label>      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" name="member_status" value="1"> ประเภทผู้เรียน &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" name="member_status" value="2"> ประเภทผู้ปกครอง  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" name="member_status" value="3"> ประเภทติวเตอร์   <br><br><br>


        </div><br><br> 

        <div class="button">
            
            <h3><button onclick="myFunction()" class="w3-button "> ยืนยัน</h3></a></button>

            <script>
            function myFunction() {
            alert("ยืนยันการสมัครเป็นสมาชิก");
    }
</script>
            </div>
      


</center>
</body>
</html>