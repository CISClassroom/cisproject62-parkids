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
    

    <title>ข้อมูลติวเตอร์ </title>
 
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


     #register_tutor {
        font-family: 'Athiti', sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

     #register_tutor td, #register_tutor th {
        border: 1px  solid black;
        padding: 15px 10px;

        }

     #register_tutor tr:nth-child(even){background-color: white;}

     #register_tutor tr:hover {background-color: #ddd;}

     #register_tutor th {
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
         <h1><b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ข้อมูลติวเตอร์</></h1></b> <br>  



 			<div class="col-md-11 col-md-offset-1"> <br><br>
 
               <?php
               $searchKey="";
               $sr=1;
                    $con = mysqli_connect("localhost","root","","parkidsplearn");
                    mysqli_set_charset($con,"utf8");
 					if(isset($_POST['search'])) {
                        $searchKey = $_POST['search'];
                         $query  = "SELECT * FROM register_tutor WHERE t_fullname LIKE '%$searchKey%' or t_subject LIKE '%$searchKey'";
                         

                     }
                     else
                     {
                        $query  = "SELECT * FROM register_tutor WHERE t_fullname LIKE '%$searchKey%'";
 					} 					

              
                     $result = mysqli_query($con, $query); 
                    
				?>
 				<form action="information_tutor.php" method="POST"> 
 										
                       
                <center>   <input type="text" name="search" style="width:550px;height:50px; font-size:20px;" class='form-control' placeholder="ค้นหาชื่อติวเตอร์" value="" ></center><br>
                <br>
                <center><button class="btn w3-blue"  >ค้นหา</button></center><br>
                                           
                                       </form>
                                       <hr>

                
            <table id="register_tutor">
            <center>
                <tr>
                    <th>ลำดับ</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>เพศ</th>
                    <th>วิชาที่สอน</th>
                    <th>ระดับชั้น</th>
                    <th>เบอร์โทร</th>
                    <th>อีเมล์</th>
                    <th>ไลน์</th>
                    <th>ค่าเรียน/ชม.</th>
                    <th>แก้ไขข้อมูล</th>
                    <th>ลบข้อมูล</th>  
                    
                </tr>
        <?php
        
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><center><?php echo $sr;?></td>
                
                    <td><center><?php echo $row["t_fullname"]; ?></td>
                    <td><center><?php echo $row["t_gender"]; ?></td>
                    <td><center><?php echo $row["t_subject"]; ?></td>
                    <td><center><?php echo $row["t_class"]; ?></td>
                    <td><center><?php echo $row["t_mobile"]; ?></td>
                    <td><center><?php echo $row["t_email"]; ?></td>
                    <td><center><?php echo $row["t_line"]; ?></td>
                    <td><center><?php echo $row["t_cost"]; ?></td>
                    <td><center><button type="button" class="btn btn-primary" 
                    data-toggle="modal" data-target="#Modal<?php echo $row["tutor_id"]; ?>">แก้ไข</button></td>
                    <td><center><a href="del_tutor.php?tutor_id=<?php echo $row['tutor_id']; ?>">ลบ</a></td>

                    <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="Modal<?php echo $row["tutor_id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูล</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="update_tutor.php" method="get">
      <div class="modal-body">
      
            <div class="form-group">
            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row["tutor_id"]; ?>">
            <label for="exampleInputEmail1">ชื่อ-นามสกุล</label>
            <input type="input" class="form-control" id="name" name="name" value="<?php echo $row["t_fullname"]; ?>">
            </div>
            <div class="form-group">
            <label >เพศ</label>
            <select class="form-control" name="gender">
                <option value="<?php echo $row["t_gender"]; ?>"><?php echo $row["t_gender"]; ?></option>
                <option value="ชาย">ชาย</option>
                <option value="หญิง">หญิง</option>
            </select>
            </div>
      
            <div class="form-group">
            <label for="exampleInputEmail1">วิชาที่สอน</label>
            <input type="input" class="form-control"  name="subject" value="<?php echo $row["t_subject"]; ?>">
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">ระดับชั้น</label>
            <input type="input" class="form-control" name="class" value="<?php echo $row["t_class"]; ?>">
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">เบอร์โทร</label>
            <input type="input" class="form-control"  name="mobile" value="<?php echo $row["t_mobile"]; ?>">
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">ไลน์</label>
            <input type="input" class="form-control"  name="line" value="<?php echo $row["t_line"]; ?>">
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">อีเมล์</label>
            <input type="input" class="form-control"  name="email" value="<?php echo $row["t_email"]; ?>">
            </div>
            
            <div class="form-group">
            <label for="exampleInputEmail1">ค่าเรียน</label>
            <input type="input" class="form-control"  name="cost" value="<?php echo $row["t_cost"]; ?>">
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

                
            <?php  $sr++;}
            
        ?>
        <ul>
				
		</table>	
    <br>
        </body>	
    </form>
    </html>



