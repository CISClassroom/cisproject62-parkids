<?php
// Start the session
session_start();
error_reporting(~E_NOTICE);

?>

<DOCTYPE html>
<html lang="en">
   <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Athiti" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    

    <title>ข้อมูลผู้เรียนและผู้ปกครอง </title>
 
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
        }


        #register_student {
        font-family: 'Athiti', sans-serif;  
        border-collapse: collapse;
        width: 100%;
        }

    #register_student td, #register_student th {
        border: 1px solid black;
        padding: 15px 10px;
        }

    #register_student tr:nth-child(even){background-color: white;}

    #register_student tr:hover {background-color: #ddd;}

    #register_student th {
        padding-top: 10px;
        padding-bottom: 10px;
        text-align: center;
        background-color: skyblue;
        color: black;
        width:50%;
        height:20%;
        }
  

    .btn {width:150px;
        height: 7%;}


    </style>
   <body>

    <div class="top-bar">
    <div class="mean">
 
    <h4> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="index_admin.php">กลับไปยังหน้าหลัก </a></h4>
 
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
    <h2><b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ข้อมูลการสมัครเรียน</h2></b> <br>
             
       
 		<div class="col-md-10 col-md-offset-1"><br><br>
 
             <form action="information_student.php" method="GET"> 
        <center>   <input type="text" name="search" style="width:550px;height:50px; font-size:20px;" class='form-control' placeholder="ค้นหาชื่อผู้เรียน" value="" ></center><br>
        <br>
        <center><button class="btn w3-blue"  >ค้นหา</button></center><br>                                    
        </form>
    <?php
        $searchKey="";
        $sr=1;
        $con = mysqli_connect("localhost","root","","parkidsplearn");
        mysqli_set_charset($con,"utf8");
 			if($_GET['search']!="") {
                $searchKey = $_GET['search'];
                $query  = "SELECT register_student.*,register_tutor.* FROM register_student,register_tutor WHERE register_student.tutor_id=register_tutor.tutor_id 
                AND register_student.s_fullname LIKE '%$searchKey%' OR register_tutor.t_subject LIKE '%$searchKey%' ";
               
            }
            else{
                $query  = "SELECT register_student.*,register_tutor.* FROM register_student,register_tutor WHERE register_student.tutor_id=register_tutor.tutor_id";
 			} 					
           $result = mysqli_query($con, $query);  
                        
    ?>
     
         <hr>

            <table id="register_student"> 
            <tr>
                    <th>ลำดับ</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>เพศ</th>
                    <th>วิชาที่เรียน</th>
                    <th>ระดับชั้น</th>
                    <th>ชื่อผู้ปกครอง</th>
                    <th>ไลน์</th>
                    <th>เบอร์โทรติดต่อ</th>
                    <th>E-mail</th>
                    <th>ชื่อครูผู้สอน</th>  
                    <th>แก้ไขข้อมูล</th>  
                    <th>ลบข้อมูล</th>  
                </tr>
        <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><center><?php echo $sr;?></td>
                    <td><center><?php echo $row["s_fullname"]; ?></td>
                    <td><center><?php echo $row["s_gender"]; ?></td>
                    <td><center><?php echo $row["t_subject"]; ?></td>
                    <td><center><?php echo $row["s_class"]; ?></td>
                    <td><center><?php echo $row["p_fullname"]; ?></td>
                    <td><center><?php echo $row["p_line"]; ?></td>
                    <td><center><?php echo $row["p_mobile"]; ?></td>
                    <td><center><?php echo $row["p_email"]; ?></td>
                    <td><center><?php echo $row["t_fullname"]; ?></td>
                    <td><leftr><button type="button" class="btn btn-primary" 
                    data-toggle="modal" data-target="#Modal<?php echo $row["student_id"]; ?>">แก้ไข</button></td>
                    <td><center><a href="del_student.php?student_id=<?php echo $row['student_id']; ?>">ลบ</a></td>

                    <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="Modal<?php echo $row["student_id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูล</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="update_student.php" method="get">
      <div class="modal-body">
      
            <div class="form-group">
            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row["student_id"]; ?>">
            <label for="exampleInputEmail1">ชื่อ-นามสกุล</label>
            <input type="input" class="form-control" id="name" name="name" value="<?php echo $row["s_fullname"]; ?>">
            </div>
            <div class="form-group">
            <label >เพศ</label>
            <select class="form-control" name="gender">
                <option value="<?php echo $row["s_gender"]; ?>"><?php echo $row["s_gender"]; ?></option>
                <option value="ชาย">ชาย</option>
                <option value="หญิง">หญิง</option>
            </select>
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">ที่อยู่</label>
            <input type="input" class="form-control"  name="location" value="<?php echo $row["s_location"]; ?>">
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">จังหวัด</label>
            <input type="input" class="form-control"  name="province" value="<?php echo $row["s_province"]; ?>">
            </div>
            
            <div class="form-group">
            <label for="exampleInputEmail1">ระดับชั้น</label>
            <input type="input" class="form-control" name="class" value="<?php echo $row["s_class"]; ?>">
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">วันที่สอน</label>
            <input type="input" class="form-control" name="date" value="<?php echo $row["s_date"]; ?>">
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">เวลา</label>
            <input type="input" class="form-control"  name="time" value="<?php echo $row["s_time"]; ?>">
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">ผู้ปกครอง</label>
            <input type="input" class="form-control"  name="p_fullname" value="<?php echo $row["p_fullname"]; ?>">
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">เบอร์โทร</label>
            <input type="input" class="form-control"  name="mobile" value="<?php echo $row["p_mobile"]; ?>">
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">ไลน์</label>
            <input type="input" class="form-control"  name="line" value="<?php echo $row["p_line"]; ?>">
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">อีเมล์</label>
            <input type="input" class="form-control"  name="email" value="<?php echo $row["p_email"]; ?>">
            </div>
            
           
            
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
        </form>
      </div>
    </div>
  </div>
</div>
                </tr> 
            <?php $sr++;}
        ?>	
		</table>	
        <br>
 	</body>   
</html>



