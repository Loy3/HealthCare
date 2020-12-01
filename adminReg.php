<?php

// include Function  file
include_once('function.php');
// Object creation
$userdata=new DB_con();
if(isset($_POST['submit']))
{
// Posted Values
$uname=$_POST['username'];
$uemail=$_POST['email'];
$pasword=$_POST['password'];
$confPass=$_POST['confPass'];

if($pasword == $confPass){
//Function Calling
$sql=$userdata->registration($uname,$uemail,$pasword);
if($sql)
{
// Message for successfull insertion
echo "Registration successfull.";
echo "<script>window.location.href='adminLogin.php'</script>";
}
else
{
// Message for unsuccessfull insertion
echo "Something went wrong. Please try again";
echo "<script>window.location.href='adminReg.php'</script>";
}
} else {
    echo "<script>alert('Invalid password. Please try again');</script>";;
}
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sign Up</title>
<link rel = "stylesheet" href = "style.css">
</head>
<header>
    <h1 align="center"> <img src="Title.png" alt="HCSC"  width="50%" height="50%"  ></h1> 
    
</header>
<body>
    
    <div class="mainSignUp">

    <form action="" method="POST">
    <h1 class="sign" align="center">Sign Up</h1>
   
    <h4 align="center">Username</h4><br>
    <input class="un" type="text" placeholder="Enter Username" name="username" required /><br>
    
      <h4 align="center">Email</h4><br>
      <input class="un" type="email" placeholder="Enter Email" name="email" required><br>
    
    <h4 align="center">Password</h4><br>
    <input class="pass" type="password" placeholder="Enter Password" name="password" required><br>

    <h4 align="center">Confirm Password</h4><br>
   <input class="pass" type="password" placeholder="Confirm Password" name="confPass" required><br>

   <button type="submit" class="submit" name="submit">Sign Up</button>
   <button type="reset" class="reset" name="reset">Reset</button><br>
 

</form>
    
      <br>
      <br>
    <p class="link" align="center">Already registered <a href="adminLogin.php">Sign in</a></p>
 </div>
</body>
</html>
