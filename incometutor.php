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


            <title> แจ้งรายได้ติวเตอร์ </title>
 
   </head>

   <style type=text/css>
    body {
        background-color: skyblue;
        font-family: 'Athiti', sans-serif;
    }
    .w3-button {width:200px;}

    .incometutor{
        background-color: rgba(255, 255, 255, 0.658);
        -webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
        box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75); 
        width: 800px;
        height: 400;
        margin: auto;
        text-align: center;
        margin-top: 30px; 
    }
    input[type=varchar]  {
        width: 30%;
        height: 35;
        padding: 10px 15px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        }
  
    </style>

    <body>
<center>
        <br>
        <h1>แจ้งรายได้ติวเตอร์</h1>
        <br><br>

        <form class="form-groub" action="insert_incometutor.php" method="GET">

        <div class ="incometutor"> <br><br><br>

            <label for="cate">หมวดการเรียน : </label>
            <select class="custom-select d-block w-100" name="i_category" id="i_category" required>
            <option value="">คิดส์เพลินวิชาการ</option>
            <option>คิดส์เพลินกีฬา</option>
            <option>คิดส์เพลินดนตรีและศิลปะ</option>
            <option>คิดส์เพลินวิชาอื่นๆ</option>
            </select>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <label for="subject">วิชา : </label>
            <select class="custom-select d-block w-100" name="i_subject" id="i_subject" required>
            <option value="">คณิตศาสตร์</option>
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

            <label for="firstName">ชื่อ : </label>
            <input type="varchar" class="form-control" name="t_firstName" id="t_firstName"  required>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              
            <label for="lastName">นามสกุล : </label>
            <input type="varchar" class="form-control" name="t_lastname" id="t_lastName" required> <br><br>

            <label for="Baht"> จำนวนเงิน : </label> 
            <input type="varchar" class="form-control" name="i_amount" id="i_amount" required>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 

            <label for="date"> วันที่ได้รับ : </label> 
            <input type="date" class="form-control" name="i_date" id="i_date"  required> <br><br>

            <text for="slip"> สลิปการโอน : </text>
            


        </div><br><br>
        

        <div class="button">
            <h3><button class="w3-button w3-pink">บันทึก</button></h3> <br><br>        
        </div>
</center>
</body>
</html>
