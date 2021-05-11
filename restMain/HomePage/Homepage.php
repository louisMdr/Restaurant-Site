<!--Group 7-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Homepage - Bistro Otto </title>
    <link rel="stylesheet" type="text/css" href="../CommonStyling/BistroOttoCommon.css" />
    <link rel="stylesheet" type="text/css" href="Homepage.css" />
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
    <script type="text/javascript" src="Homepage.js"></script>
    <!--Navigation bar-->
    <?php include("../HeaderFooter/header.php"); ?>

    <div class="background">
        <div class="pageTitle">
            <header class="pageHeader"> Bistro Otto </header>
            <p id="p-1">Japanese Cuisine</p>
            <table id="buttonTable">
                <tr>
                    <td>
                        <a href="../MenuPage/menu.php"><input type="button" class="button-1" value="Menu"></button></a>
                    </td>
                    <td>
                        <a href="../DeliveryPage/delivery.php"><input type="button" class="button-1" value="Order"></button></a>
                    </td>
                    <td>
                        <a href="../ReservationsPage/reservation.php"><input type="button" class="button-1" value="Reserve"></button></a>
                    </td>
                </tr>
            </table>

        </div>

        <div class="container">
            <div class="theseSlides fade">
                <img src="picture1.jpg">
            </div>
            <div class="theseSlides fade">
                <img src="picture2.jpg">
            </div>
            <div class="theseSlides fade">
                <img src="picture3.jpg">
            </div>
            <div class="theseSlides fade">
                <img src="picture4.jpg">
            </div>
            <div class="theseSlides fade">
                <img src="picture5.jpg">
            </div>
            <div class="theseSlides fade">
                <img src="picture6.jpg">
            </div>
            <div class="theseSlides fade">
                <img src="picture7.jpg">
            </div>
            <div class="theseSlides fade">
                <img src="picture8.jpg">
            </div>
            <div class="theseSlides fade">
                <img src="picture9.jpg">
            </div>
            <div class="theseSlides fade">
                <img src="picture10.jpg">
            </div>
        </div>

        <br>

        <!-- The dots/circles -->
        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
            <span class="dot" onclick="currentSlide(4)"></span>
            <span class="dot" onclick="currentSlide(5)"></span>
            <span class="dot" onclick="currentSlide(6)"></span>
            <span class="dot" onclick="currentSlide(7)"></span>
            <span class="dot" onclick="currentSlide(8)"></span>
            <span class="dot" onclick="currentSlide(9)"></span>
            <span class="dot" onclick="currentSlide(10)"></span>
        </div>
        <div align="center">
            <table id="map-table">
                <tr>
                    <td>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2795.585236630147!2d-73.59033844805377!3d45.518427378999114!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cc91a2ccaa7a09f%3A0x1dd44b85cb5995d6!2s143%20Mont-Royal%20Ave%20E%2C%20Montreal%2C%20QC%20H2T%202Y6!5e0!3m2!1sen!2sca!4v1604511848109!5m2!1sen!2sca"
                            width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""
                            aria-hidden="false" tabindex="0">
                        </iframe>
                    </td>
                    <td id="addresscenter">
                        <h2> Address </h2>
                        <p class="mapaddress">143 Mont-Royal Est </p>
                        <p class="mapaddress">Montreal, QC, Canada H2T 1N9</p>
                        </br>
                        <a href="https://www.google.ca/maps/place/143+Mont-Royal+Ave+E,+Montreal,+QC+H2T+1N9/@45.5216187,-73.5873955,17z/data=!3m1!4b1!4m5!3m4!1s0x4cc91a2ccaa68629:0x21bd1433837bfd9d!8m2!3d45.5216187!4d-73.5852068"
                            target="_blank" class="button">
                            Directions</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <!--Slide show functionality-->
    <script>

        var index = 0;
        slideShow();

        function currentSlide(n) {
        slideShow(index = n);
        }

        function slideShow() {
            var i;
            var slides = document.getElementsByClassName("theseSlides");
            var dots = document.getElementsByClassName("dot");

            for (i = 0; i < slides.length; i++) { //Displays the slide
                slides[i].style.display = "none";
            }

            index++;

            if (index > slides.length) { //Resets the slides 
                index = 1
            }

            for (i = 0; i < dots.length; i++) { //Transitions through the 3 dots below the images
                dots[i].className = dots[i].className.replace(" active-1", "");
            }
            slides[index - 1].style.display = "block";
            dots[index - 1].className += " active-1";
            setTimeout(slideShow, 5000); //Sets a time interval of 5 seconds between image transitions
        }
    </script>

</body>

<?php include("../HeaderFooter/footer.php"); ?>

</html>