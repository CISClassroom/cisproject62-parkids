<?php
// Start the session
session_start();

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
    

    <title>ข้อมูลผู้เรียน</title>
 
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
        padding-top: 20px;
        padding-bottom: 15px;
        text-align: center;
        background-color: skyblue;
        color: black;
     
        }


    .btn {width:150px;
        height: 7%;}


    </style>
   <body>

    <div class="top-bar">
    <div class="mean">
 
    <h4> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="index_teacher.php">กลับไปยังหน้าหลัก </a></h4>
 
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
    <h2><b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ข้อมูลผู้เรียน</h2></b> <br>

    <div class="row">
 			<div class="col-md-10 col-md-offset-1"><br><br>
 				<div class="row">
               <?php
               $searchKey="";
               $sr=1;
                    $con = mysqli_connect("localhost","root","","parkidsplearn");
 					if(isset($_POST['search'])) {
                        $searchKey = $_POST['search'];
                         $query  = "SELECT * FROM register_student WHERE s_fullname LIKE '%$searchKey%' or s_subject LIKE '%$searchKey'";
                         

                     }
                     else
                     {
                        $query  = "SELECT * FROM register_student WHERE s_fullname LIKE '%$searchKey%'";
 					} 					

              
                     $result = mysqli_query($con, $query); 
                    
				?>
 				<form action="information student_tutor.php" method="POST"> 
 										
                       
                <center>   <input type="text" name="search" style="width:550px;height:50px; font-size:20px;" class='form-control' placeholder="ค้นหาชื่อผู้เรียน" value="" ></center><br>
                <br>
                <center><button class="btn w3-blue"  >ค้นหา</button></center><br>
                                           
                                       </form>
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
                </tr>
        <?php
             $con = mysqli_connect("localhost","root","","parkidsplearn");
             mysqli_set_charset($con,"utf8");
             $tutor = $_SESSION['member_fullname'];
             $query  = "SELECT register_student.*,register_tutor.* 
             FROM register_student,register_tutor WHERE register_student.tutor_id=register_tutor.tutor_id AND register_tutor.t_fullname='$tutor'";
             $result = mysqli_query($con, $query);  
             $sr=0;

            while ($row = mysqli_fetch_assoc($result)) {
                $sr++;
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
                </tr> 
            <?php }
        ?>	
		</table>  
    </html>


