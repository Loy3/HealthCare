<?php
if(isset($_POST['yes'])){
  header("Location: appointment.php");
}
if(isset($_POST['no'])){
  header("Location: negativeResults.php");
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Covid-19 Test</title>
<link rel = "stylesheet" href = "style.css">
  </head>
  <header>
    <h1 align="center"> <img src="Title.png" alt="HCSC"  width="50%" height="50%"  ></h1> 
    
</header>
  <body>
      <div id="wrapper">
    <h1 class="sign">Screening Test</h1>
   

    <form class="" action="" method="post">
      <h2  class="heads" align="center">Do you show any of the symptoms below:</h2>
 
      <ul style="list-style-type:square;">
        <li>Fever</li>
        <li>Dry Cough</li>
        <li>Tiredness</li>
        <li>Difficulty breathing or shortness of breath</li>
        <li>Chest pain or pressure</li>
        <li>Loss of speech or movement</li>
      </ul>
       <button class="submit" type="submit" class="registerbtn" name="yes" >Yes</button>
       <button class="reset" type="submit" class="registerbtn" name="no" >No</button>
    </form>
    </div>
      <br>
  </body>
  <footer>
    <p align="center" >For more infomation contact the Health Care Service Centre at <br><br>Tel: 012 494 4410 <br><br>You Can WhatsApp Us At: +2779 802 5585 <br><br>Or Email: healthCareServiceCentre@care.org </p>
</footer>
</html>
