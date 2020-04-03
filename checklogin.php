
<?php 
session_start();
        if(isset($_POST['member_username'])){
				//connection
                  $con = mysqli_connect("localhost","root","","parkidsplearn");
                  mysqli_set_charset($con,"utf8");
				//รับค่า user & password
                  $member_username = $_POST['member_username'];
                  $member_password = $_POST['member_password'];
				//query 
                  $sql="SELECT * FROM member Where member_username='".$member_username."' and member_password='".$member_password."' ";

                  $result = mysqli_query($con,$sql);
				
                  if(mysqli_num_rows($result)==1){

                      $row = mysqli_fetch_array($result);

                      $_SESSION["member_id"] = $row["member_id"];
                      $_SESSION["member_username"] = $row["member_username"];
                      $_SESSION["member_fullname"] = $row["member_fullname"];
                      $_SESSION["member_status"] = $row["member_status"];

                      if($_SESSION["member_status"]=="1"){ //ถ้าเป็น users=1 ให้กระโดดไปหน้า index_student.php

                        Header("Location: index_student.php");

                      }

                      if ($_SESSION["member_status"]=="2"){  //ถ้าเป็น users=2 ให้กระโดดไปหน้า index_student.php

                        Header("Location: index_student.php");

                      }

                      if ($_SESSION["member_status"]=="3"){  //ถ้าเป็น users=3 ให้กระโดดไปหน้า index_teacher.php

                        Header("Location: index_teacher.php");

                      }

                      if ($_SESSION["member_status"]=="4"){  //ถ้าเป็น users=4 ให้กระโดดไปหน้า index_admin.php

                        Header("Location: index_admin.php");

                      }


                    }else{
                      echo "<script>";
                          echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                          echo "window.history.back()";
                      echo "</script>";
  
                    }
        }

?>