<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> About - Bistro Otto </title>
    <link rel="stylesheet" type="text/css" href="../CommonStyling/BistroOttoCommon.css" />
    <link rel="stylesheet" type="text/css" href="about.css" />
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

    <div class="background">
        <div class="pageTitle">
            <header class="pageHeader"> About </header>
        </div>
        <div id="div-1">
            <table>
                <tr style="width: fit-content;">
                    <td>
                        <img src="picture10.jpg" style="object-fit: cover; width: 500px;
                        height: 400px;" ;>
                    </td>
                    <td>
                        <h1 id="h1-1">A wish to share an authentic Japanese taste</h1>
                        <p id="p-1">Bistro Otto is a small, family-owned restaurant that established itself on the
                            Plateau Mont-Royal in 2012. For 8 years now, our family has strived to offer authentic
                            japanese dishes to our community. </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="picture8.jpg" style="object-fit: cover; width: 500px;
                        height: 400px;" ;> 
                        <img src="picture9.jpg" style="object-fit: cover; width: 500px;
                        height: 400px;" ;> 
                    </td>
                    <td>
                        <h1 id="h1-2">FAQ</h1>
                        <p id="p-2">
                            Are you open during the pandemic?</br>
                            &nbsp;&nbsp;&nbsp;&nbsp;We currenlty only offer take-out services.</br></br>
                            Do you take reservations? </br>
                            &nbsp;&nbsp;&nbsp;&nbsp;Yes, we do! To make a reservation, you can call us at (438) 383-4700
                            &nbsp;&nbsp;&nbsp;&nbsp or book a slot on our website.</br></br>
                            Do you have vegetarian, vegan, gluten free options? </br>
                            &nbsp;&nbsp;&nbsp;&nbsp;We offer vegan and vegetarian options, but unfortunately no
                            gluten-free &nbsp;&nbsp;&nbsp;&nbsp option at the moment.</br></br>
                            Can you accommodate groups of ____ (15, 20, 30 people)? Do you have a private room?</br>
                            &nbsp;&nbsp;&nbsp;&nbsp;Since our restaurant is on the smaller side, a reservation should be
                            made &nbsp;&nbsp;&nbsp;&nbsp for larger groups.</br></br>
                            I just got take out from here and there’s a mistake in my order. Can you fix it?</br>
                            &nbsp;&nbsp;&nbsp;&nbsp;Absolutely. Call in at the restaurant and one of our employee will
                            work  &nbsp;&nbsp;&nbsp;&nbsp with you to solve the problem.</br></br>
                            How late are you open today? How early do you open tomorrow?</br>
                            &nbsp;&nbsp;&nbsp;&nbsp;Our weekly hours are: 12:00 PM to 2:00PM and 5:00PM to 8:00PM.</br></br>
                            How much advance notice to you need for take-out.</br>
                            &nbsp;&nbsp;&nbsp;&nbsp;Tak-out orders will usually be prepared in 30 minutes.</br></br>
                            Is there parking nearby?</br>
                            &nbsp;&nbsp;&nbsp;&nbsp;We offer a few parking spaces in front of the restaurant. Many
                            places are  &nbsp;&nbsp;&nbsp;&nbsp usually available on near-by streets.</br></br>
                            Can we bring our own wine?</br>
                            &nbsp;&nbsp;&nbsp;&nbsp;Yes! You can bring a bottle of wine to our restaurant with no added
                            fee.</br></br>
                        </p>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

<?php include("../HeaderFooter/footer.php"); ?>

</html>