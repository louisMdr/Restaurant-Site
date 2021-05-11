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

    <script>
        function calculate_menu() {
            var array_menu = 
            {
                "Miso Soup": 5.00, "Edamame": 4.00, "Salad of the Day": 12.00, "Brussel Sprouts": 7.00,
                "Regular Tofu": 5.00, "Spicy Tofu": 5.00, "Ikura Tofu": 8.00, "Syrup Tofu": 5.50,
                "Homemade Organic Natto": 7.00, "Japanese Premium Rice": 3.00,
                "Chirashi (+ Japanese Uni)": 36.00, "Maguro Don": 34.00, "Otto Ramen": 16.00, "Mushroom Mazemen": 18.00,
                "Duck Mazemen": 24.00, "Uni Mazemen": 24.00, "Spicy Ikura Mazemen": 22.00, "Karaage": 12.00,
                "Ketchup": 7.50, "Yuzu Mayo": 9.00, "Sesame Dressing": 8.50, "Otto Aragoshi Ponzu": 8.00,
                "Soya Sauce for Sashimi": 6.50, "Yuzukoshu 100G (Spicy Yuzu Paste)": 16.00
            };

            var result = 0;
            var menu = document.getElementById("menu");

            var values = [];
            var fields = document.getElementsByName("menu_item[]");
            for (var i = 0; i < fields.length; i++) 
            {
                if (fields[i].checked) {

                    result += parseFloat(array_menu[fields[i].value]);
                }
            }

            result = result.toFixed(2);
            document.getElementById("menu-result").value = result;
            document.getElementById("bill").value = result;
        }
    </script>
    <script>
        function calculate() {
            var num1 = document.getElementById("bill").value;
            var num2 = document.getElementById("serviceQuality").value;
            var num3 = document.getElementById("people").value;
            var result = num1 * num2 / num3;
            result = result.toFixed(2);
            document.getElementById("result").innerHTML = result;
        }
    </script>
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
                <header class="pageHeader"> Place Your Order </header>
            </div>
            <table id="table" align="center" border="0">
                <tr>
                    <td>
                        <form id="menu" method="post" action="order-history.php">

                            <h2 class="menu-header">Appetizers</h2>

                            <label>Miso Soup - 5.00$</label>
                            <input type="checkbox" name="menu_item[]" value="Miso Soup"><br>

                            <label>Edamame - 4.00$</label>
                            <input type="checkbox" name="menu_item[]" value="Edamame"><br>

                            <label>Salad of the Day - 12.00$</label>
                            <input type="checkbox" name="menu_item[]" value="Salad of the Day"><br>

                            <label>Brussel Sprouts - 7.00$</label>
                            <input type="checkbox" name="menu_item[]" value="Brussel Sprouts"><br>

                            <h5 class="menu-header">Homemade Tofu</h5>

                            <label>Regular - 5.00$</label>
                            <input type="checkbox" name="menu_item[]" value="Regular Tofu"><br>

                            <label>Spicy - 5.00$</label>
                            <input type="checkbox" name="menu_item[]" value="Spicy Tofu"><br>

                            <label>Ikura - 8.00$</label>
                            <input type="checkbox" name="menu_item[]" value="Ikura Tofu"><br>

                            <label>Syrup - 5.50$</label>
                            <input type="checkbox" name="menu_item[]" value="Syrup Tofu"><br>
                            <br><br>

                            <label>Homemade Organic Natto - 7.00$</label>
                            <input type="checkbox" name="menu_item[]" value="Homemade Organic Natto"><br>

                            <label>Japanese Premium Rice - 3.00$</label>
                            <input type="checkbox" name="menu_item[]" value="Japanese Premium Rice"><br>

                            <h2 class="menu-header">Mains</h2>

                            <label>Chirashi (+ Japanese Uni) - 36.00$</label>
                            <input type="checkbox" name="menu_item[]" value="Chirashi (+ Japanese Uni)"><br>

                            <label>Maguro Don - 34.00$</label>
                            <input type="checkbox" name="menu_item[]" value="Maguro Don"><br>

                            <label>Otto Ramen - 16.00$</label>
                            <input type="checkbox" name="menu_item[]" value="Otto Ramen"><br>

                            <label>Mushroom Mazemen - 18.00$</label>
                            <input type="checkbox" name="menu_item[]" value="Mushroom Mazemen"><br>

                            <label>Duck Mazemen - 24.00$</label>
                            <input type="checkbox" name="menu_item[]" value="Duck Mazemen"><br>

                            <label>Uni Mazemen - 24.00$</label>
                            <input type="checkbox" name="menu_item[]" value="Uni Mazemen"><br>

                            <label>Spicy Ikura Mazemen - 22.00$</label>
                            <input type="checkbox" name="menu_item[]" value="Spicy Ikura Mazemen"><br>

                            <label>Karaage - 12.00$</label>
                            <input type="checkbox" name="menu_item[]" value="Karaage"><br>

                            <h2 class="menu-header">Grocery</h2>

                            <label>Ketchup - 7.50$</label>
                            <input type="checkbox" name="menu_item[]" value="Ketchup"><br>

                            <label>Yuzu Mayo - 9.00$</label>
                            <input type="checkbox" name="menu_item[]" value="Yuzu Mayo"><br>

                            <label>Sesame Dressing - 8.50$</label>
                            <input type="checkbox" name="menu_item[]" value="Sesame Dressing"><br>

                            <label>Otto Aragoshi Ponzu - 8.00$</label>
                            <input type="checkbox" name="menu_item[]" value="Otto Aragoshi Ponzu"><br>

                            <label>Soya Sauce for Sashimi - 6.50$</label>
                            <input type="checkbox" name="menu_item[]" value="Soya Sauce for Sashimi"><br>

                            <label>Yuzukoshu 100G (Spicy Yuzu Paste) - 16.00$</label>
                            <input type="checkbox" name="menu_item[]" value="Yuzukoshu 100G (Spicy Yuzu Paste)"><br>

                            <br><br>

                            <input id="button" type="button" onClick="calculate_menu()" Value="CALCULATE" />

                            <br>
                            <p>Total:&nbsp;$<input type="text" name="menu-result" id="menu-result"></input></p>

                            <p>Ready to order? Click here:</p>

                            <input id="button" name="ordernow" type="submit" value="Order Now">
                        </form>
                    </td>

                    <td>
                        <div id="big-div">
                            <h2 align="center">Was Our Service Good?</h2>
                            <div id="form-div">
                                <form id="tip">
                                    <label>How much was your bill?</label><br><br>
                                    $ <input type="text" id="bill" /><br><br>
                                    <label style="font-weight: bold;">How was your service?</label><br><br>
                                    <select name="serviceQuality" id="serviceQuality">
                                        <option value=".20">20% - Good</option>
                                        <option value=".15">15% - Average</option>
                                        <option value=".10">10% - Bad</option>
                                        <option value=".05">5% - Terrible</option>
                                    </select>
                                    <br><br><label>How many people are sharing the bill?</label><br><br>
                                    <input type="text" id="people" /> people<br>
                                    <div align="center"><br><input id="calculate-button" type="button" onClick="calculate()" Value="CALCULATE!" />
                                        <p id="tip-amount">TIP AMOUNT <br>
                                            <sup>$</sup><span id="result"></span>
                                            <br>each
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
<!----Footer of the page---->
<?php include("../HeaderFooter/footer.php"); ?>
</html>