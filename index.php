<?php
    if(isset($_POST['book'])){
      header("Location: appointment.php");
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
    <h1 class="sign">Covid-19 Testing</h1>
   

    <form class="" action="" method="post">
      <h2  class="heads" align="center">Do you show one or more of the symptoms shown below:</h2>
      
      <br>     
      <h3 style="padding-left: 10px;">Most common symptoms:</h3>
      <ul style="list-style-type:square;">
          <li>Fever</li>
          <li>Dry cough</li>
          <li>Tiredness</li>
      </ul>
      
      <h3 style="padding-left: 10px;">Less common symptoms:</h3>
      <ul style="list-style-type:square;">
          <li>Aches and pains</li>
          <li>Sore throat</li>
          <li>Diarrhoea</li>
          <li>Conjunctivitis</li>
          <li>Headache</li>
          <li>Loss of taste or smell</li>
          <li>A rash on skin, or discolouration of fingers or toes</li>
      </ul>
      
     <h3 style="padding-left: 10px;">Serious symptoms:</h3>
      <ul style="list-style-type:square;">
          <li>Difficulty breathing or shortness of breath</li>
          <li>Chest pain or pressure</li>
          <li>Loss of speech or movement</li>
          <li>Conjunctivitis</li>
      </ul>

     <p style="padding-left: 10px;">Seek immediate medical attention if you have serious symptoms. Book an appointment to get tested for Covid-19 so that
         <br>you can get the medical help you need.
        <br><br>People with mild symptoms who are otherwise healthy should manage their symptoms at home.</p>
     <br>
     <p style="padding-left: 10px;">Click on the button below to book an appointment...</p>
     <br>
     <button class="submit" type="submit" class="registerbtn" name="book" >Book Appointment</button><br><br>
       
    </form>
    </div>
      <br>
  </body>
  <footer>
      <p align="center" >For more infomation contact the Health Care Service Centre at <br><br>Tel: 012 494 4410 <br><br>You Can WhatsApp Us At: +27 79 802 5585 <br><br>Or Email: healthCareServiceCentre@care.org </p>
    <h4 align="right" style="padding-right: 20px; font-size: 10px;"><i>Created by Loy Netshiozwi</i></h4>
</footer>
</html>
