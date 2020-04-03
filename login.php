<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="">
        <link href="https://fonts.googleapis.com/css?family=Athiti" rel="stylesheet">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        <title>Login</title>

   <style>
       
        body {font-family: 'Athiti', sans-serif;}

        h5 {
          font-family: 'Athiti', sans-serif;
          text-align: left;
        }
        h4 {
          font-family: 'Athiti', sans-serif;
          text-align: right;
        }

        .login{
                   
        background-color: #b9e5fb;
        width: 800px;
        height: 350px;
        margin: auto;
        text-align: center;
        font-size: 20px;
        
        }

        input[type=varchar], input[type=password] {
        width: 40%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        font-size: 20px;
        box-sizing: border-box;
        }

        .w3-button {
        background-color: rgb(235, 83, 121);
        color: white;
        padding: 20px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 15%;
        height: 60px;
        background-color: #0085ac;
        font-family: 'Athiti', sans-serif;
        font-size: 20px;
        }

       
     


    </style>
</head>

<body>

  <div class ="top">

  <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <a href="index.php">กลับไปยังหน้าหลัก</a>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;         
  <a href="FormMember.php">สมัครสมาชิก </a></h5>
    
  </div>

<center> <br>
<h2>LOGIN </h2>
<br>


  <div class="login"> 
      <form action ="checklogin.php"  method="POST" >
      <br><br><br>
      
        <label for="member_username"><b>Username : </b></label>
        <input type="varchar" placeholder="Enter username" name="member_username" required>   <br>
     
        <label for="member_password"><b>Password : </b></label>
        <input type="password" placeholder="Enter Password" name="member_password"required>  <br>

   </div> <br>

    <div class="button">
        <button class="w3-button " type="submit"> Login </button>

    </div>
</center>    
   
 
</form>

</body>
</html>
