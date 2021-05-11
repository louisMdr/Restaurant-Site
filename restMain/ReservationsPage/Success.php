<?php
   session_start();
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Reservations - Bistro Otto</title>
      <meta charset = "utf-8" />
      <link rel = "stylesheet" type = "text/css" href = "../CommonStyling/BistroOttoCommon.css"/>
      <link rel="stylesheet" type="text/css" href="Reservation.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script>
         function myFunction() {
             var x = document.getElementById("myTopnav");
             if (x.className === "topnav") {
                 x.className += " responsive";
             } else {
                 x.className = "topnav";
             }
         }
      </script>
   </head>
   <body>
      <!--------Navigation Bar------->
      <?php include("../HeaderFooter/header.php"); ?>
      <!--  -->
      <div class = "background">
         <div class = "pageTitle">
            <header class = "pageHeader"> Reservation </header>
         </div>
         <!--  -->
         <br>
         <?php

		//Import the PHPMailer class into the global namespace
		//You don't have to modify these lines. 
		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\SMTP;

		//SMTP needs accurate times, and the PHP time zone MUST be set
		date_default_timezone_set('Etc/UTC');

		require '../Phpmailer/vendor/autoload.php';

		//to check if at least one of the vars is there. if not then its busted.
		if(!isset($_SESSION["name"]))
         {
			echo '<p>Successfully reserved time slot! Please view the email we sent you for all the details of your reservation!</p><br><br>';
         }
         else{
		//Create a new PHPMailer instance
		$mail = new PHPMailer;
		//Tell PHPMailer to use SMTP
		$mail->isSMTP();
	
		//Set the hostname of the mail server (We will be using GMAIL)
		$mail->Host = 'smtp.gmail.com';
		//Set the SMTP port number - likely to be 25, 465 or 587
		$mail->Port = 587;
		//Whether to use SMTP authentication
		$mail->SMTPAuth = true;

		//Username to use for SMTP authentication
		$mail->Username = 'bistro.otto287@gmail.com';
		//Password to use for SMTP authentication
		$mail->Password = 'soen287!';
		//Set who the message is to be sent from
		$mail->setFrom('bistro.otto287@gmail.com', 'Bistro Otto');
		
		//Set who the message is to be sent to email and name
		$mail->addAddress('bistro.otto287@gmail.com', 'Bistro Otto');
	
		$mail->isHTML(true);

		//Set the subject line
		$mail->Subject = 'Reservation for ' . $_SESSION["name"] . ' - Bistro Otto';
		
		$mail->Body = "Dear " . $_SESSION['name'] . ",<br><br>" . "Your reservation has been successfully created for you. The information regarding your reservation can be found below." . ".<br><br>Best regards,<br>Bistro Otto" . "<br><br>-----------------------------<br>Name: " . $_SESSION["name"] . "<br>Number of people: " . $_SESSION["nbrPPL"] . "<br>Email: " . $_SESSION["email"] . "<br>Branch: " . $_SESSION["place"] . "<br>Date: " . $_SESSION["date"] . "<br>Time: " . $_SESSION["time"] . "<br>Additional Information: \"" . $_SESSION["comments"] . "\"<br>-----------------------------";

		//send the message, check for errors
		if (!$mail->send()) {
		    echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
		    echo '<p>Successfully reserved time slot. Please view the email we sent you for all the details of your reservation!</p><br><br>';
		}
		
		}
		?>

         <input text-align="center" type="button" onclick="location.href='Reservation.php';" id = "button" value="Go Back">
      </div>
   </body>
   <!----Footer of the page---->
   <?php include("../HeaderFooter/footer.php"); ?>
</html>