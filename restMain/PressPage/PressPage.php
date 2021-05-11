<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Press - Bistro Otto </title>
    <link rel = "stylesheet" type = "text/css" href = "../CommonStyling/BistroOttoCommon.css"/>
    <link rel = "stylesheet" type = "text/css" href = "PressPage.css"/>
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
        <div class = "pageTitle">
            <header class = "pageHeader"> Press </header>
        </div>

        <table class = "presstable">
            <tr>
                <td class = "presstd"> <img class = "pressimg" src = "MTL Blog Logo.jpg" alt = "MTL Blog Logo"> </td>
                <td class = "presstd"> <img class = "pressimg" src = "Montreal Gazette Logo.png" alt = "Montreal Gazette Logo"></td>
            </tr>
            <tr> 
                <td class = "presstd"> 
                    <p class = "pressp"> MTL Blog </p>
                    <p class = "title"> Top 10 Japanese Restaurants to Try Out in Montreal </p>
                    <p class = "pressp"> <a href = "" class = "presslink"> Read More </a> </p>
                </td>
                <td class = "presstd">  
                    <p class = "pressp"> Montreal Gazette </p>
                    <p class = "title"> Restaurant Review: Bistro Otto's Perfect Atmosphere </p>
                    <p class = "pressp"> <a href = "" class = "presslink"> Read More </a> </p>
                </td>
            </tr>
            <tr>
                <td class = "presstd"> <img class = "pressimg" src = "La Presse Logo.png" alt = "La Presse Logo"> </td>
                <td class = "presstd"> <img class = "pressimg" src = "The Globe and Mail Logo.jpg" alt = "The Globe and Mail Logo"></td>
            </tr>
            <tr>
                <td class = "presstd"> 
                    <p class = "pressp"> La Presse </p>
                    <p class = "title"> Souper chez Bistro Otto </p>
                    <p class = "pressp"> <a href = "" class = "presslink"> Read More </a> </p>
                </td>
                <td class = "presstd"> 
                    <p class = "pressp"> The Globe and The Mail </p>
                    <p class = "title"> Where to eat in Montreal </p>
                    <p class = "pressp"> <a href = "" class = "presslink"> Read More </a> </p>
                </td>
            </tr>
            <tr>
                <td colspan = "2" class = "presstd"> <img src = "RestoMontreal Logo.jpg" alt = "RestoMontreal Logo" id = "restoMontreal"> </td>
            </tr>
            <tr>
                <td colspan = "2" class = "presstd"> 
                    <p class = "pressp"> restomontreal </p>
                    <p class = "title"> Best Japanese Restaurants in Montreal </p>
                    <p class = "pressp"> <a href = "" class = "presslink"> Read More </a> </p>
                </td>
            </tr>
        </table> 
    </div> 
</body>
<!----Footer of the page---->
<?php include("../HeaderFooter/footer.php"); ?>
</html>