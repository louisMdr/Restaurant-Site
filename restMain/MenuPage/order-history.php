<?php session_start(); ?>
<?php
    include_once("../Filebase/Filebase/BistroOttoDatabase.php");

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
            
    require '../Phpmailer/vendor/phpmailer/phpmailer/src/Exception.php';
    require '../Phpmailer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require '../Phpmailer/vendor/phpmailer/phpmailer/src/SMTP.php';

    //SMTP needs accurate times, and the PHP time zone MUST be set
    date_default_timezone_set('Etc/UTC');
            
    require '../Phpmailer/vendor/autoload.php';

    if(isset($_POST["ordernow"]))
    {
        $orders = $_POST['menu_item'];
        if(isset($_SESSION["username"]))
        {
            $username = $_SESSION["username"];
        }
        
        if(isset($_SESSION["isLoggedIn"]))
        {
            makeOrder($database, $orders, $username);

            $total = $_POST["menu-result"];
            $_SESSION["bill"] = $_POST["menu-result"];
            $total = floatval($total);
            
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
            $name = getName($database, $username);
            $mail->setFrom('bistro.otto287@gmail.com', 'Bistro Otto');
            // Set who receives the email
            $mail->addAddress('bistro.otto287@gmail.com', $name);
            
            $mail->isHTML(true);

            $discount = "";
            $discountmain = "";
            $spending = "";
            $sendEmail = false;
            $discountTotal = false;
            
            //Assigns coupon to discount variable depending on the total bill
            if ($total >= 50 && $total < 100) 
            {
                $discount = "../Coupons/10_Total.png";
                $spending = "Here is a discount coupon for 10% off of your next order!";
                $sendEmail = true;
                $discountTotal = true;
            } 
            else if ($total >= 100 && $total < 200) 
            {
                $discount = "../Coupons/20_Total.png";
                $spending = "Here is a discount coupon for 20% off of your next order!";
                $sendEmail = true;
                $discountTotal = true;
            } 
            else if ($total  >= 200) 
            {
                $discount = "../Coupons/30_Total.png";
                $spending = "Here is a discount coupon for 30% off of your next order!";
                $sendEmail = true;
                $discountTotal = true;
            } 
            else {

                $discount = "";
                $spending = "";

            }

            $userHistory = getOrderHistory($database, $username);
            $chirashi = 0;
            $maguro_don = 0;
            $otto_ramen = 0;
            $mushroom_mazemen = 0;
            $duck_mazemen = 0;
            $uni_mazemen = 0;
            $spicy_ikura_mazemen = 0;
            $karaage = 0;
            $discountMeal = false;

            //Counts the amount of times a main dish is ordered
            for ($i=0; $i < sizeof($userHistory); $i++) 
            { 
                if($userHistory[$i] === "Chirashi (+ Japanese Uni)")
                {
                    $chirashi++;

                } else if ($userHistory[$i] === "Maguro Don") {

                    $maguro_don++;

                } else if ($userHistory[$i] === "Otto Ramen") {

                    $otto_ramen++;

                } else if ($userHistory[$i] === "Mushroom Mazemen") {

                    $mushroom_mazemen++;

                } else if ($userHistory[$i] === "Duck Mazemen") {

                    $duck_mazemen++;

                } else if ($userHistory[$i] === "Uni Mazemen") {

                    $uni_mazemen++;

                } else if ($userHistory[$i] === "Spicy Ikura Mazemen") {

                    $spicy_ikura_mazemen++;

                } else if ($userHistory[$i] === "Karaage") {
                    
                    $karaage++;

                }
            }
            //Assigns coupon to discountmain variable depending on if they've ordered a main dish more then 3 times
            $spendingMain = "";
            if ($chirashi >= 3) {

                $discountmain = "../Coupons/20_Chirashi.png";
                $spendingMain = "here is a discount coupon for 20% off of your most favorite meal!";
                $sendEmail = true;
                $discountMeal = true;

            } else if ($maguro_don >= 3) {
                
                $discountmain = "../Coupons/20_MaguroDon.png";
                $spendingMain = "here is a discount coupon for 20% off of your most favorite meal!";
                $sendEmail = true;
                $discountMeal = true;

            } else if ($otto_ramen >= 3) {

                $discountmain = "../Coupons/20_OttoRamen.png";
                $spendingMain = "here is a discount coupon for 20% off of your most favorite meal!";
                $sendEmail = true;
                $discountMeal = true;

            } else if ($mushroom_mazemen >= 3) {

                $discountmain = "../Coupons/20_MushroomMazemen.png";
                $spendingMain = "here is a discount coupon for 20% off of your most favorite meal!";
                $sendEmail = true;
                $discountMeal = true;
            } else if ($duck_mazemen >= 3) {

                $discountmain = "../Coupons/20_DuckMazemen.png";
                $spendingMain = "here is a discount coupon for 20% off of your most favorite meal!";
                $sendEmail = true;
                $discountMeal = true;
            } else if ($uni_mazemen >= 3) {

                $discountmain = "../Coupons/20_UniMazemen.png";
                $spendingMain = "here is a discount coupon for 20% off of your most favorite meal!";
                $sendEmail = true;
                $discountMeal = true;
            } else if ($spicy_ikura_mazemen >= 3) {

                $discountmain = "../Coupons/20_SpicyIkuraMazemen.png";
                $spendingMain = "here is a discount coupon for 20% off of your most favorite meal!";
                $sendEmail = true;
                $discountMeal = true;
            } else if ($karaage >= 3) {
                
                $discountmain = "../Coupons/20_Karaage.png";
                $spendingMain = "here is a discount coupon for 20% off of your most favorite meal!";
                $sendEmail = true;
                $discountMeal = true;
            } else {

                $discountmain = "";
                $spendingMain = "";

            }
            
            //If the sendEmail is true, it sends an email
            if ($sendEmail)
            {
                //Set the subject line
                $mail->Subject = 'Thank you for ordering at Bistro Otto!';
                
                //Sends email depending on what was ordered  
                $name = getName($database, $username);
                if ($discountTotal && !$discountMeal){
                    $mail->addAttachment($discount , "Discount.png");  
                    $mail->Body = "Dear $name,"."<br/><br/>"."
                    Thank you for your order at Bistro Otto! $spending"
                    ."<br/><br/>"."Best regards,
                    "."<br/>"."Bistro Otto";
                }

                else if ($discountMeal && !$discountTotal){
                    $mail->addAttachment($discountmain, "DiscountMain.png");      
                    $mail->Body = "Dear $name,"."<br/><br/>"."
                    Thank you for your order at Bistro Otto! Also, $spendingMain"
                    ."<br/><br/>"."Best regards,
                    "."<br/>"."Bistro Otto";
                }

                else if ($discountTotal && $discountMeal){
                $mail->addAttachment($discount , "Discount.png"); 
                $mail->addAttachment($discountmain, "DiscountMain.png");   
                $mail->Body = "Dear $name,"."<br/><br/>"."
                Thank you for your order at Bistro Otto! $spending" . " Also, $spendingMain"
                ."<br/><br/>"."Best regards,
                "."<br/>"."Bistro Otto";
                }

                //send the message, check for errors
                $mail->send();
                $sendEmail = false;
            }
           
            } catch (Exception $e) {
            }
        
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Menu Order - Bistro Otto </title>
    <link rel="stylesheet" type="text/css" href="../CommonStyling/BistroOttoCommon.css" />
    <link rel="stylesheet" type="text/css" href="menu.css" />

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

    <div>
        <div class="background">
            <div class="pageTitle">
                <header class="pageHeader"> Thank you! </header>
            </div>
            <p align="center" class="finishedorder"> Your order has been successfully placed! </p>
            <p align="center" class="finishedorder"><a href="menu-order.php">Make another order?</a></p>
            
            <?php 

                $array_price = array(
                    "Miso Soup" => "5.00", "Edamame" => "4.00", "Salad of the day" => "12.00", "Brussel Sprouts" => "7.00", "Regular Tofu" => "5.00", "Spicy Tofu" => "5.00", 
                    "Ikura Tofu" => "8.00", "Syrup Tofu" => "5.50", "Homemade Organic Natto" => "7.00", "Japanese Premium Rice" => "3.00", 
                    "Chirashi (+ Japanese Uni)" => "36.00", "Maguro Don" => "34.00", "Otto Ramen" => "16.00", "Mushroom Mazemen" => "18.00",
                    "Duck Mazemen" => "24.00", "Uni Mazemen" => "24.00", "Spicy Ikura Mazemen" => "22.00", "Karaage" => "12.00","Ketchup" => "7.50", 
                    "Yuzu Mayo" => "9.00", "Sesame Dressing" => "8.50", "Otto Aragoshi Ponzu" => "8.00", "Soya Sauce for Sashimi" => "6.50", 
                    "Yuzukoshu 100G (Spicy Yuzu Paste)" => "16.00"
                );

                $sum = 0;
                echo "<p align=center class=\"finishedorder\">You ordered: </p>";
                foreach ($_POST['menu_item'] as $value) 
                {
                    echo "<p align=center class=\"finishedorder\">$value for $$array_price[$value]</p>";
                    $sum += $array_price[$value];
                }
                echo "<p align=center class=\"finishedorder\"><br>Your total is " . number_format($sum, 2) . " dollars.</p>";
            ?>
            <div class="pageTitle">
                <h1 class="menutitle"><?php if(isset($_SESSION["isLoggedIn"])) {echo "Order History";}?></h1>
            </div>
            <?php 
                if(isset($_SESSION["isLoggedIn"]))
                {
                    if(isset($_SESSION["username"]))
                    {
                        $username = $_SESSION["username"];
                    }
                    displayOrderHistory($database, $username);
                }
            ?>
        </div>
    </div>
</body>

<!----Footer of the page---->
<?php include("../HeaderFooter/footer.php"); ?>

</html>