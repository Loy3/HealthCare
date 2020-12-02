<?php
session_start();

require_once "config.php";
if(isset($_POST['submit'])){
    //validate id number
    $idNum = mysqli_real_escape_string($link, $_REQUEST['idNum']);
    
    function Validate($idNum) {
		$correct = true;
		if (strlen($idNum) !== 13 || !is_numeric($idNum) ) {
			$correct = false; die();
		}

        //date of birth
		$year = substr($idNum, 0,2);
		$currentYear = date("Y") % 100;
		$prefix = "19";
		if ($year < $currentYear)
		    $prefix = "20";
	    $id_year = $prefix.$year;

        $id_month = substr($idNum, 2,2);
        $id_date = substr($idNum, 4,2);

		$fullDate = $id_date. "-" . $id_month. "-" . $id_year;
		
		if (!$id_year == substr($idNum, 0,2) && $id_month == substr($idNum, 2,2) && $id_date == substr($idNum, 4,2)) {
			
			$correct = false;
		}
		$genderCode = substr($idNum, 6,4);
        $gender = (int)$genderCode < 5000 ? "Female" : "Male";

       $citzenship = (int)substr($idNum, 10,1)  === 0 ? "citizen" : "resident";//0 for South African citizen, 1 for a permanent resident

        $total = 0;
        $count = 0;

	    for ($i = 0;$i < strlen($idNum);++$i)
	    {
		    $multiplier = $count % 2 + 1;
		    $count ++;
		    $temp = $multiplier * (int)$idNum[$i];
		    $temp = floor($temp / 10) + ($temp % 10);
		    $total += $temp;
	    }
	    $total = ($total * 9) % 10;

	    if ($total % 10 != 0) {

		    $correct = false;
	    }

        if ($correct == true && $citzenship == 0){
            $idNum = mysqli_real_escape_string($link, $_REQUEST['idNum']);
        }
	}



    
    $firstname = mysqli_real_escape_string($link, $_REQUEST['firstname']);
    $lastname = mysqli_real_escape_string($link, $_REQUEST['lastname']);
    $timeS = mysqli_real_escape_string($link, $_REQUEST['timeS']);
    $pNum = mysqli_real_escape_string($link, $_REQUEST['pNum']);
    $email = mysqli_real_escape_string($link, $_REQUEST['email']);
    
    $sql = "INSERT INTO appointments (firstName, lastName, timeSlot, idNum, phoneNum, email) VALUES('$firstname', '$lastname', '$timeS', '$idNum', '$pNum', '$email')";
    

    if(mysqli_query($link, $sql)){
        echo "<script>alert('Records added successfully, now you can sign out below.');</script>";
        header("Location:consider.php");
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
    
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Book an appointment</title>
<link rel = "stylesheet" href = "style.css">
</head>
<header>
    <h1 align="center"> <img src="Title.png" alt="HCSC"  width="50%" height="50%"  ></h1> 
    
</header>
<body>
    <div class="mainApp">
    <form action="" method="POST">
  
    <h1 class="sign" align="center">Book an appointment</h1>
    <h4 align="center">Please fill in this form to book an appointment.</h4>
 
    <h4 align="center">First Name:</h4><br>
    <input class="un" type="text" placeholder="Enter First Name" name="firstname" required><br>

    <h4 align="center">Last Name:</h4><br>
    <input class="un" type="text" placeholder="Enter Last Name" name="lastname" required><br>
    
    <h4 align="center">Time Slot:</h4><br>
     <select class="un" name="timeS">
     <option>Selecet a Time Slote</option>
     <option value="08:00-09:00">08:00 - 09:00</option>
     <option value="09:00-10:00">09:00 - 10:00</option>
     <option value="10:00-11:00">10:00 - 11:00</option>
     <option value="11:00-12:00">11:00 - 12:00</option>
     <option value="12:00-13:00">12:00 - 13:00</option>
     <option value="13:00-14:00">13:00 - 14:00</option>
     <option value="14:00-15:00">14:00 - 15:00</option>
     <option value="15:00-16:00">15:00 - 16:00</option>
     <option value="16:00-17:00">16:00 - 17:00</option>
     </select><br>    
    
    <h4 align="center">ID Number:</h4><br>
    <input class="un" type="text" placeholder="Enter ID Number" name="idNum" required><br>
    
    <h4 align="center">Phone Number:</h4><br>
    <input class="un" type="text" placeholder="Enter Phone Number" name="pNum" required><br>
    
      <h4 align="center">Email:</h4><br>
      <input class="un" type="email" placeholder="Enter Email" name="email" required><br>

      <button class="submit" type="submit" name="submit">Book</button>
      <button type="reset" class="reset" name="reset">Reset</button><br><br>
      
      

  
        <h4>
        <?php   if(isset($_POST['submit']))
             {           
             echo (!empty($correct)) ? 'has-error' : '';
        }?></h4>
            
 
      
  
        </form>
        <p class="link" align="center"><a href="consider.php">Sign out</a>.</p>
        
        </div>
        <br>
    
</body>
<footer>
    <p align="center" >For more infomation or if you wish to cancel an appointment contact the Health Care Service Centre at <br><br>Tel: 012 494 4410 <br><br>You Can WhatsApp Us At: +27 79 802 5585 <br><br>Or Email: healthCareServiceCentre@care.org </p>
    <h4 align="right" style="padding-right: 20px; font-size: 10px;"><i>Created by Loy Netshiozwi</i></h4>
</footer>
</html>
