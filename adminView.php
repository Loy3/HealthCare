<?php
session_start();

  if(!isset($_SESSION['fname']))
  {
      //User not logged in. Redirect back to login page
      header('Location: adminLogin.php');
      exit;
  }
if(strlen($_SESSION['uid'])=="")
{
  header('location:logout.php');
} else {

?>


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>View Appointments</title>
        <link rel = "stylesheet" href = "style.css">
    </head>
    <header>
    <h1 align="center"> <img src="Title.png" alt="HCSC"  width="50%" height="50%"  ></h1> 
    
</header>
    <body>
        <div id="wrapper">
        <h1 class="welcome" align="center">Welcome Back : <?php  echo  $_SESSION['fname'];?></h1>
      
        <h2  class="heads" align="center">Appointments Available:</h2>
      
        <table style="width:100%" align="center">
            <thead>
            <tr>
                <td>ID</td>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Time Slot</td>
                <td>ID Number</td>
                <td>Phone Number</td>
                <td>Email</td>
                
            </tr>
            </thead>
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "healthcare";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT id, firstname, lastname, timeSlot, idNum, phoneNum, email FROM appointments";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                  
                  ?>
            <tbody>
            <tr>
                <td><?php echo  $row["id"]; ?></td>
                <td><?php echo  $row["firstname"]; ?></td>
                <td><?php echo  $row["lastname"]; ?></td>
                <td><?php echo  $row["timeSlot"]; ?></td>
                <td><?php echo  $row["idNum"]; ?></td>
                <td><?php echo  $row["phoneNum"]; ?></td>
                <td><?php echo  $row["email"]; ?></td>
                
            </tr>
            </tbody>
                
              <?php
                }
            } else {
              echo "0 results";
            }
            $conn->close();
         ?>
           
         </table>
        
        
  
                <h4>
                     <?php   if(isset($_POST['submit']))
               {           
                      echo (!empty($correct)) ? 'has-error' : '';
               }?></h4>
        
        <form action="" method="POST">
            <input class="search" type="text" name="lastname" placeholder="Enter the last name" required="true" />
            <button class="submit" name="search">Search</button>
        </form>
        
        <table style="width:90%" align="center">
            
        <?php
        $conn = mysqli_connect("localhost", "root", "");
        $db = mysqli_select_db($conn, 'healthcare');
        
        if(isset($_POST['search'])){
            $lastname = $_POST['lastname'];
            
            $query = "SELECT * FROM appointments where lastname = '$lastname' ";
            $query_run = mysqli_query($conn, $query);
            
            while($row = mysqli_fetch_array($query_run)){
                ?>
            <thead>
             <tr>
                <td>ID</td>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Time Slot</td>
                <td>ID Number</td>
                <td>Phone Number</td>
                <td>Email</td>
            </tr>
            </thead>
            
            <tbody>
            <tr>
            <td><?php echo  $row["id"]; ?></td>
                <td><?php echo  $row["firstName"]; ?></td>
                <td><?php echo  $row["lastName"]; ?></td>
                <td><?php echo  $row["timeSlot"]; ?></td>
                <td><?php echo  $row["idNum"]; ?></td>
                <td><?php echo  $row["phoneNum"]; ?></td>
                <td><?php echo  $row["email"]; ?></td>
            </tr>
            </tbody>
             
             <?php
                
            }
        }
        
        if(isset($_POST['delete'])){
            $id = $_POST['idNum'];
            // sql to delete a record
    $sql = "DELETE FROM appointments WHERE lastname=$lastname";

      if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
        }
        ?>
        
        </table>
        
        <p class="link" align="center"><a href="adminLogin.php">Sign out</a>.</p>
           
           </div>  
    </body>
</html>
<?php } ?>