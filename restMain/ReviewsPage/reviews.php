<?php

//The file reviews.txt is opened.
$myfile = fopen("reviews.txt", "r") or die("Unable to open the file.");
//The content of the file is read and stored in an array.
if(file_exists('reviews.txt'))
{
    $reviewArr = explode("\n", fread($myfile, filesize("reviews.txt")));
}

$sum = 0;

for ($i = 0; $i < count($reviewArr); $i++) {

    $review = preg_split ("/\s/", $reviewArr[$i]); 
    $sum += $review[0];

}

$numberofreviews = count($reviewArr);
$averageNonRounded = $sum / $numberofreviews;
$average = number_format($averageNonRounded, 1);

fclose($myfile);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Reviews - Bistro Otto </title>
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
            <header class="pageHeader"> Customer Reviews </header>
        </div>
        <div class="main1">
            <form action="addareview.php">
                <input type="submit" id = "button" value="Add a Review!">
            </form> 

            <!--Users Reviews-->

            <div id="right" class="box" style="margin:auto; background-color:#ccc; padding:5px; width:350px;">
    </p>Our customers gave us an average of </p>
                    <label><?php echo $average ?></label>
                    
                    <?php

if($average >= 1 && $average < 2){
    ?>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
    <?php
} else if($average >= 2 && $average < 3) {
    ?>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
    <?php
} else if($average >= 3 && $average < 4) {
    ?>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
    <?php
} else if($average >= 4 && $average < 5) {
        ?>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
    <?php
} else {
            ?>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
    <?php
}
?> </br></br>

                </div>

</br>

            <?php

for ($i = count($reviewArr) - 1; $i >= 0; $i--) {

    $review = preg_split ("/@/", $reviewArr[$i]); 

?>

    <div style="background-color:white">
                        <p style="display:inline; text-align:left"><?php echo $review[2]; ?></p>
                        <p style="color:grey; display:inline; font-size:small;"><?php echo $review[5] ?></p> </br></br>
                        <?php

switch ($review[0]) {
  case 1:
    ?>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
    <?php
    break;
  case 2:
    ?>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
    <?php
    break;
  case 3:
    ?>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
    <?php
    break;
    case 4:
        ?>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
    <?php
        break;
        case 5:
            ?>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
    <?php
            break;
}
?>
                        <p style="color:red;text-align:left"><?php echo $review[3] ?></p>
                        <p style="color:grey; text-align:left">I ordered... <?php echo $review[4] ?></p>
                    </div>

                    <?php } ?>
        </div>
    </div>

     <!--End of Code for Review Page-->

</body>

<?php include("../HeaderFooter/footer.php"); ?>
</html>