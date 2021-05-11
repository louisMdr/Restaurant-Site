<?php session_start(); ?>
<?php

include_once("../Filebase/Filebase/BistroOttoDatabase.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require '../PhpMailer/vendor/phpmailer/phpmailer/src/Exception.php';
require '../PhpMailer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../PhpMailer/vendor/phpmailer/phpmailer/src/SMTP.php';

//SMTP needs accurate times, and the PHP time zone MUST be set
date_default_timezone_set('Etc/UTC');

require '../PhpMailer/vendor/autoload.php';

$errorEmail = "";
 
    if (isset($_POST["signup"]))
    {
        $email=$_POST['email'];
        $password=$_POST['password'];
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];

        if(preg_match("/^[a-zA-Z0-9\.!#$%&'*+\-\/=?^_`{|}~]+@[a-z]+\.[a-z]+/", $email) == 0)
        {
            $errorEmail = "Email in the wrong format!";
        }
        else if(!freshEmail($database, $email))
        {
            $errorEmail = "Email is already taken.";
        }
        else
        {
        $_SESSION["email"]= $_POST['email'];
        $_SESSION["password"]= $_POST['password'];
        $_SESSION["firstname"] = $_POST["firstname"];
        $_SESSION["lastname"] = $_POST["lastname"];



        //Create a new PHPMailer instance
        $mail = new PHPMailer(true);
    try{
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
        //Set who is receiving the email
        $mail->addAddress('bistro.otto287@gmail.com', $firstname." ".$lastname);

        $mail->isHTML(true);

        //Set the subject line
        $mail->Subject = 'Bistro Otto Signup';
    
        $mail->Body = "Dear $firstname $lastname,"."<br/><br/>"."
        An account has been successfully created for you with the email " . "$email
        "."<br/><br/>"."Best regards,
        "."<br/>"."Bistro Otto";
    
        $mail->send();
        
        }catch (Exception $e){
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }

        createUser($database, $email, $password, $firstname, $lastname);
        $_SESSION["isLoggedIn"] = true;
        $username = strstr($email, '@', true);
        $_SESSION["username"] = $username;
        session_unset("");
        header("Location:../HomePage/Homepage.php");
        exit();
        }
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Login - Bistro Otto </title>
    <link rel = "stylesheet" type = "text/css" href = "../CommonStyling/BistroOttoCommon.css"/>
    <link rel = "stylesheet" type = "text/css" href = "SignupPage.css"/>
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
    <!-------- Navigation Bar & Social Media Side Bar ------->
    <?php include("../HeaderFooter/header.php"); ?>

    <div class = "background">
        <form action="" method="POST" onsubmit="return validateInput()">
            <div class="signupheader">
              <header class = "signuptitle"> Account Signup </header>
            </div>
          
            <div class="container">
                <label class="user"><b>First Name</b></label>
                <input type="text" placeholder="First Name" id="email" name="firstname" required>
                    
                <label class="user"><b>Last Name</b></label>
                <input type="text" placeholder="Last Name" id="email" name="lastname" required>

                <label class="user"><b>Email</b></label>
                <input type="text" placeholder="Email" id="email" name="email" required>
          
                <label class="user"><b>Password</b></label>
                <input type="password" placeholder="Password" id="password" name="password" required>

                <label class="user"><b>Confirm Password</b></label>
                <input type="password" placeholder="Confirm Password" id="confirm" name="confirm" required>
                <b><p style="color: red" id="error"><?php echo $errorEmail;?></p></b>
                <input id="signupbutton" type="submit" name="signup" value="Sign Up">
                </br>
            </div>
            <div class="signupfooter" id="grad">
            </div>
          </form>          
    </div> 
</body>
<!----Footer of the page---->
<?php include("../HeaderFooter/footer.php"); ?>
<script src="SignupPage.js"></script>
</html>