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
                <td>Date</td>
                
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

            $sql = "SELECT id, firstname, lastname, timeSlot, idNum, phoneNum, email, date FROM appointments";
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
                <td><?php echo  $row["date"]; ?></td>
                
            </tr>
            </tbody>
                
              <?php
                }
            } else {
              echo "<script>alert('No results found.');</script>";
              echo "<script>window.location.href='adminView.php'</script>";
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
            <input class="search" type="text" name="idNum" placeholder="Enter the ID number" required="true" />
            <button class="submit" name="search">Search</button>
        </form>
        
        <table style="width:90%" align="center">
            
        <?php
        $conn = mysqli_connect("localhost", "root", "");
        $db = mysqli_select_db($conn, 'healthcare');
        
        if(isset($_POST['search'])){
            $idNum = $_POST['idNum'];
            $_SESSION['idNum'] = $idNum;
            $query = "SELECT * FROM appointments where idNum = '$idNum' ";
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
                <td>Date</td>
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
                <td><?php echo  $row["date"]; ?></td>
            </tr>
            </tbody>
            <tfoot> 
                <tr>
                    <td colspan = 5> <form><button type="submit" class="delete" name="delete">Delete</button></form><br></td>
                </tr>
            </tfoot>
             
             <?php
                
            }
        }
        
        if(isset($_POST['delete'])){
            
            $idNum = $_SESSION['idNum'];
            
            // sql to delete a record
            $sql = "DELETE FROM appointments WHERE idNum=$idNum";

            if ($conn->query($sql) === TRUE) {
                echo "Record deleted successfully";
            } else {
               echo "Error deleting record: " . $conn->error;
            }
        }
            $conn->close();
        ?>
        
        </table>
       
        
        <p class="link" align="center"><a href="adminLogin.php">Sign out</a></p>
           
           </div> 
        <br>
    </body>
    <footer>
    <h4 align="right" style="padding-right: 20px; font-size: 10px;"><i>Created by Loy Netshiozwi</i></h4>
</footer>
</html>
<?php } ?>