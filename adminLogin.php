<?php
    session_start();
    // include Function  file
    include_once('function.php');
    // Object creation
    $usercredentials=new DB_con();
    if(isset($_POST['signin']))
    {
        // Posted Values
        $uname=$_POST['username'];
        $pasword=$_POST['password'];
        //Function Calling
        $ret=$usercredentials->signin($uname,$pasword);
        $num=mysqli_fetch_array($ret);
    if($num>0)
    {
      $_SESSION['uid']=$num['id'];
      $_SESSION['fname']=$num['username'];
      // For success
      echo "<script>window.location.href='adminView.php'</script>";
    }
    else
    {
        // Message for unsuccessfull login
        echo "<script>alert('Invalid details. Please try again');</script>";
        echo "<script>window.location.href='adminReg.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sign In</title>
<link rel = "stylesheet" href = "style.css">
</head>
<header>
    <h1 align="center"> <img src="Title.png" alt="HCSC"  width="50%" height="50%"  ></h1> 
    
</header>
<body>
<div class="main">
    <form action="" method="POST">
  
    <h1 class="sign" align="center">Sign In</h1>
    
    <h4 align="center">Username</h4><br>
    <input class="un" type="text" placeholder="Enter First Name" name="username" required><br>

    <h4 align="center">Password</h4><br>
    <input class="pass" type="password" placeholder="Enter Password" name="password" required><br>

    <button class="submit" type="submit" name="signin">Sign In</button><br><br>
   
   <p class="link" align="center">Not registered yet? <a href="adminReg.php"> Register here</a>.</p>
  </div>
  
</form>
</body>
<footer>
    <h4 align="right" style="padding-right: 20px; font-size: 10px;"><i>Created by Loy Netshiozwi</i></h4>
</footer>
</html>



