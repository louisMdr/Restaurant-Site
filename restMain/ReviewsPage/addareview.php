<?php 

session_start();

//$username = $_POST["username"];
//$password = $_POST["password"];

/*require '../Filebase/vendor/autoload.php';

$database = new \Filebase\Database([
    'dir' => 'Database/users',
	'backupLocation' => 'Database/Backup'
]);

if($database->has($username))
{
	$user = $database->get($username);
    if($user->password == $password)
    {
    $signedIN = TRUE;
    }
    else
    { 
    $error = TRUE;
    $signedIn = FALSE;
    }
}

$signedIn=$_SESSION["signedIn"];*/

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Add a Review - Bistro Otto </title>
    <link rel="stylesheet" type="text/css" href="../CommonStyling/BistroOttoCommon.css" />
    <link rel="stylesheet" type="text/css" href="review.css" />
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

     <!--Start of Code for Review Page-->

    <div class="background">
        <div class="pageTitle">
            <header class="pageHeader"> Add a Review - Bistro Otto </header>
        </div>
<!--
   <?php if ( isset($error) ) {?>
     <p>Sorry, the sign in was incorrect.</p>
     <p>Please go back and fill out all the required entries correctly. Thank you.</p>
   <?php } else { ?> -->

        <div class="main1">
            <div id="left" class="box" style="background-color:grey">
                <p id="rev" style="background-color:white">Add a review! </br> Please fill in the form.</p>
                <form action="" style="background-color:white" method="post">
                    <input type="text" size=49 id="name" name="name" placeholder="What's your name? (ex: John S.)"> </br>
                    <input type="text" size=50 id="dish" name="dish" placeholder="You ordered..."></br>
                    <input type="text" size=49 id="comment" name="comment" placeholder="What did you think of Bistro Otto?"> </br>
                    <p style="color:grey; padding:0px; margin:auto;">How many stars do you give Bistro Otto?</p><input type="number" size=49 id="stars" name="stars" min="0" max="5"> </br>
                    </br><input type="submit" name="submit" id="button" value="Done">
                </form>
            </div>
            </br>

        </div>

        <?php
  if (isset($_POST['submit'])) {
     //read data from form
 $stars = $_POST["stars"];
 $name = $_POST["name"];
 $comment = $_POST["comment"];
 $dish = $_POST["dish"];

 date_default_timezone_set('America/New_York');
 
 //review information
 $username = "usernametest";
 $info = "\n" . $stars . " @" . $username . " @" . $name . " @" . $comment . " @" . $dish . " @" . date("F jS Y");
 //open file for output
 $fp = fopen("reviews.txt", "a");
 //write to the file
 fwrite($fp, $info);
 fclose($fp);
  }
?>

        <form action="reviews.php" style="background-color:white" method="post">
            <input type="submit" id="button" value="See your review!">
        </form>
     <!--   <?php } ?> -->
    </div>

     <!--End of Code for Review Page-->

</body>

<?php include("../HeaderFooter/footer.php"); ?>

</html>