<?php session_start(); ?>
<?php 
    include_once("../Filebase/Filebase/BistroOttoDatabase.php");

    // When the user clicks the login button
    if(isset($_POST["login"]))
    {
        $email = $_POST["email"];
        $psw = $_POST["psw"];
        $invalid = "";
        
        // Their information is checked in the database. If they are a valid user they are redirected to the homepage
        if(checkUser($database, $email, $psw))
        {
           session_start();
           $_SESSION["isLoggedIn"] = true;
           $username = strstr($email, '@', true);
           $_SESSION["username"] = $username;
           header("Location:../HomePage/Homepage.php");
           exit();
        }
        else //If their information can not be found in the database, a message is displayed
        {
            $invalid = "Invalid Log In Information.";
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
    <link rel = "stylesheet" type = "text/css" href = "LoginPage.css"/>
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
    <?php include("../HeaderFooter/header.php"); ?>

    <div class = "background">

        <?php   if (isset($_SESSION["isLoggedIn"])) 
                { ?>
        <!-- Form for the logout action -->
        <form style="border-style:none; background-color:transparent;" action="logout.php">
                        <input type="submit" id = "button" value="Log out">
        </form>
                    
        <?php    }
            else
                { ?>
        <!-- Form for the the user to log in with their email and password -->
        <form action="" method="POST">
            <div class="loginheader">
                <header class = "logintitle"> Account Login </header>
            </div>
            
            <div class="container">
                <label class="user"><b>Email</b></label>
                <input type="text" placeholder="Email" name="email" required>
            
                <label class="user"><b>Password</b></label>
                <input type="password" placeholder="Password" name="psw" required>

                <button id="signupbutton" type="button"><a id="signup" href="../SignupPage/SignupPage.php">Signup</a></button>
                <input class="loginbutton" type="submit" name="login" value= "Log In"></input> </br>
                <span id="invalid"><?php echo isset($_POST["login"]) ? $invalid : "" ?></span>
                </br>
            </div>
            <div class="loginfooter" id="grad"></div>
        </form>            
        <?php    }  ?>  
    </div> 
</body>
<!----Footer of the page---->
<?php include("../HeaderFooter/footer.php"); ?>
</html>