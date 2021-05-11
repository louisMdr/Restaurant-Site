 <?php
   include("../HeaderFooter/header.php");
   if(!isset($_SESSION["confirmed"]))
   {
   	$_SESSION["confirmed"] = "";
   }
   $fullName = "";
   $fullEmail = "";
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\SMTP;
   if (isset($_SESSION["isLoggedIn"]) and isset($_SESSION["username"])) 
   {
         $username = $_SESSION["username"];
         $fullName = $database->get($username)->name;
         $fullEmail = $database->get($username)->email;
   }
     //unset($_SESSION["username"]);

   if(isset($_POST["submit"]))
{
   $_SESSION["name"] = $_POST["name"];
   $_SESSION["email"] = $_POST["email"];
   $_SESSION["phone"] = $_POST["phone"];
   if($_POST["location"] == "other")
   {
   	 $_SESSION["branch"] = $_POST["theOther"];
   }
   else
   {
   	 $_SESSION["branch"] = $_POST["location"];
   }
   $_SESSION["comments"] = $_POST["comments"];

		/**
		 * PHP Template for using PHPMailer to send emails.
		 * Before sending emails using the Gmail's SMTP Server, you must make some of the security and permission level     
		 * settings under your Google Account Security Settings. Please create a dummy account as you will have to put in 
		 * username and password
		 * Make sure that 2-Step-Verification is disabled. Follow the link https://myaccount.google.com/security
		 * Turn ON the "Less Secure App" access at https://myaccount.google.com/u/0/lesssecureapps 
		 */

		//Import the PHPMailer class into the global namespace
		//You don't have to modify these lines. 
		

		//SMTP needs accurate times, and the PHP time zone MUST be set
		//This should be done in your php.ini, but this is how to do it if you don't have access to that
		date_default_timezone_set('Etc/UTC');

		require '../PhpMailer/vendor/autoload.php';

		//to check if at least one of the vars is there. if not then its busted.
		if(!isset($_SESSION["name"]))
         {
			$_SESSION["confirmed"] = "Already sent message!";
         }
         else{
		//Create a new PHPMailer instance
		$mail = new PHPMailer;
		//Tell PHPMailer to use SMTP
		$mail->isSMTP();
		//Enable SMTP debugging
		// SMTP::DEBUG_OFF = off (for production use)
		// SMTP::DEBUG_CLIENT = client messages
		// SMTP::DEBUG_SERVER = client and server messages
		//$mail->SMTPDebug = SMTP::DEBUG_SERVER;
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
        //Set who is receiving the email
        $mail->addAddress('bistro.otto287@gmail.com', $_SESSION["name"]);
		//Name is optional
		//$mail->addAddress('recepientid@domain.com');

		//You may add CC and BCC
		//$mail->addCC("recepient2id@domain.com");
		//$mail->addBCC("recepient3id@domain.com");

		$mail->isHTML(true);

		//You can add attachments. Provide file path and name of the attachments
		// $mail->addAttachment("file.txt", "File.txt");        
		//Filename is optional
		//$mail->addAttachment("images/profile.png"); 



		//Set the subject line
		$mail->Subject = 'Contact form from: ' . $_SESSION["name"] . ' - Bistro Otto';
		$mail->Body = "Username: " . $_SESSION['username'] . "<br>Full name: " . $_SESSION['name'] . "<br>Email: " . $_SESSION["email"] . "<br>Phone number: " . $_SESSION["phone"] . "<br>Branch: " . ucfirst($_SESSION["branch"]) . "<br>Content: " . $_SESSION["comments"];


		//You may add plain text version using AltBody
		//$mail->AltBody = "This is the plain text version of the email content";
		//send the message, check for errors
		if (!$mail->send()) {
		    echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
		    $_SESSION["confirmed"] = "Contact form sent successfully. Thank you for your feedback/comments.";
		}
		//To prevent refreshing by erasing all used variables (except login and username)
		foreach ($_SESSION as $key => $value)
		{
			if($key == "username" || $key == "isLoggedIn" || $key == "confirmed")
			{
				continue;
			}
			else
			{
				unset($_SESSION[$key]);
			}
		}
		// session_destroy();
		}
}
 ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Contact - Bistro Otto</title>
		<meta charset = "utf-8" />
		<link rel = "stylesheet" type = "text/css" href = "../CommonStyling/BistroOttoCommon.css"/>
		<link rel="stylesheet" type="text/css" href="Contact.css">
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
     <div class = "background">
     	<div class = "pageTitle">
            <header class = "pageHeader"> Contact </header>
        </div>
		<table id = "core">
			<tr><td id = "left">
		<h1>
			<img src="https://www.flaticon.com/svg/static/icons/svg/64/64113.svg" width="24" height="24" alt="Drop pin" title="Local">Location
		</h1>
		<p>143 Mont-Royal Est,</p>
		<p>Montreal, QC. H2T 1N9</p>
		<p>Canada</p>
		<p>
			<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0a/Montreal_Metro.svg/768px-Montreal_Metro.svg.png" width="24" height="24" alt="Mont Royal Metro" title="Metro" id="metroPic"> Mont-Royal
		</p>
		<p>&nbsp;</p>
		<h1>
			<img src="https://www.flaticon.com/svg/static/icons/svg/44/44059.svg" width="24" height="24" alt="Clock" title="Time">
		Hours</h1>
		<table>
			<tr>
				<th>Mon</th>
				<td>Closed</td>
			</tr>
			<tr>
				<th>Tue - Sun</th>
				<td>12:00 PM - 2:00 PM<br>5:00 PM - 8:00 PM</td>
			</tr>
		</table>

		<p>&nbsp;</p>
		<h1>
			<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/Bimetrical_icon_clipboard_black.svg/1200px-Bimetrical_icon_clipboard_black.svg.png" width="24" height="24" alt="clipboard" title="Form"> Contact
		</h1>
		<p class="Contact">
			<p>
			<a href="tel:4383834700">(438)383-4700</a>
			</p>
			<p>
			<a href="mailto:ottobistro143@gmail.com">ottobistro143@gmail.com</a>
			</p>
			</p>
		</td>

		<td id="right">
			<form action="" method="POST">
			<p><h2 id="surveyBio">For messages or comments, please fill out this form</h2></p>
			<p>
			<label>Your name*<br><input name = "name" type = "text" placeholder="First & Last Name" class = "inputBox"
				<?php
                     $boxValue = "value=\"" . $fullName . "\" ";
                     if($fullName != "")
                     {
                        $boxValue .= "readonly";
                        echo $boxValue;
                     }
                     else
                     {
                        echo "value=\"\"";
                     }

                     ?>
                     >
			</label>
			</p>
			<p>
			<label>Phone number<br><input name = "phone" type = "text" placeholder="(123)456-7890 or 1928374650" class = "inputBox">
			</label>

			</p>
			<p>
			<label>Email*<br><input class = "inputBox" type = "text" name = "email" placeholder="any@email.com" 
				<?php
                     $boxValue2 = "value=\"" . $fullEmail . "\" ";
                     if($fullEmail != "")
                     {
                        $boxValue2 .= "readonly";
                        echo $boxValue2;
                     }
                     else
                     {
                        echo "value=\"\"";
                     }

                     ?>
                     >
			</label>
			</p>
			<p>
			<label>Branch*<br>
				<select name="location" class = "inputBox"  onchange="otherCheck()">
					<option value="option" disabled>Place:</option>
					<option value = "montreal" selected>Montreal</option>
					<option value = "vancouver">Vancouver</option>
					<option value = "toronto">Toronto</option>
					<option value = "other">Other</option>
				</select>
				<span id = "boxOpt"></span>
			</label>
			<script>

				function otherCheck()
				{
				var others = document.getElementsByClassName("inputBox")[3].value;
				if(others == "other")
				{
					document.getElementsByClassName("inputBox")[3].options[4].textContent = "Info of branch:";
					var node = document.createElement("input");
					node.name = "theOther";
					node.type = "text";
					node.className = "inputBox";
					document.getElementById("boxOpt").appendChild(node);
					document.getElementById("boxOpt").removeAttribute("id");
				}

				}
			</script>
			</p>
			<p>
			<label for="textarea">Your Message<br></label>
			<textarea name="comments" placeholder="Maximum 200 characters." maxlength="200" class = "inputBox"></textarea>
			</p>

			<input type="submit" name="submit" id = "button" onclick="return validate()" value="Send message">
			<?php
		echo "<p>" . $_SESSION["confirmed"] . "</p>";
		if(isset($_SESSION["confirmed"]))
		{
			$_SESSION["confirmed"] = "";
		}
		?>
		</form>
		</td>

		</tr>
		</table>
		<script  src="Contact.js"></script>
	</div>
		</body>

		<!----Footer of the page---->
<?php include("../HeaderFooter/footer.php"); ?>

	</html>
	