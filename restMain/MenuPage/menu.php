<!--Group 7-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Menu - Bistro Otto </title>
    <link rel="stylesheet" type="text/css" href="../CommonStyling/BistroOttoCommon.css" />
    <link rel="stylesheet" type="text/css" href="../MenuPage/menu.css" />
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
    <link rel="stylesheet" type="text/css" href="../MenuPage/menu.css">
</head>

<body>
    <!-------- Navigation Bar & Social Media Icon Side Bar ------->
    <?php include("../HeaderFooter/header.php"); ?>

    <div class="background">
        <div class="pageTitle">
            <header class="pageHeader"> Menu</header>
        </div>
        <table id = "menulist">
            <tr>
                <td colspan="4"><h1 class="menutitle">Appetizers</h1> </br></td>
            </tr>
            <tr>
                <td class="menuitemtd">
                    <img class="menuitem" src = "Menu Items/Miso Soup.jpg" alt="Miso Soup">
                    <p> Miso Soup </br> $5.00 </p>
                </td>
                <td class="menuitemtd">
                    <img class="menuitem" src = "Menu Items/Edamame.jpg" alt="Edamame">
                    <p> Edamame  </br> $4.00 </p>
                </td>
                <td class="menuitemtd">
                    <img class="menuitem" src = "Menu Items/Salad of the Day.jpg" alt="Salad of the Day">
                    <p> Salad of the Day  </br> $12.00 </p>
                </td>
                <td class="menuitemtd">
                    <img class="menuitem" src = "Menu Items/Brussels Sprouts.jpg" alt="Brussels Sprouts">
                    <div class="middle">
                        <div class="text">Mixed nuts, ghee, balsamic soya</div>
                    </div>
                    <p> Brussels Sprouts  </br> $7.00 </p>
                </td>
            </tr>
            <tr>
                <td class="menuitemtd">
                    <h3>Homemade Tofu</h3>
                    <ul class="nobullet">
                        <li>Regular ..... $5.00</li>
                        <li>Spicy ..... $5.00</li>
                        <li>Ikura ..... $8.00</li>
                        <li>Syrup ..... $5.50</li>
                    </ul>
                </td>
                <td class="menuitemtd">
                    <img class="menuitem" src = "Menu Items/Homemade Tofu.jpg" alt="Homemade Tofu">
                </td>
                <td class="menuitemtd">
                    <img class="menuitem" src = "Menu Items/Homemade Orgnanic Natto.jpg" alt="Homemade Orgnanic Natto">
                    <div class="middle">
                        <div class="text">Fermented soy beans</div>
                    </div>
                    <p> Homemade Orgnanic Natto  </br> $7.00 </p>
                </td>
                <td class="menuitemtd">
                    <img class="menuitem" src = "Menu Items/Japanese Premium Rice.jpg" alt="Japanese Premium Rice">
                    <p> Japanese Premium Rice  </br> $3.00 </p>
                </td>
            </tr>
            <tr>
                <td colspan="4"><h1 class="menutitle">Mains</h1> </br></td>
            </tr>
            <tr>
                <td class="menuitemtd">
                    <img class="menuitem" src = "Menu Items/Chirashi.jpg" alt="Chirashi">
                    <div class="middle">
                        <div class="text">Assorted sashimi over sushi rice</div>
                    </div>
                    <p> Chirashi(+Japanese Uni 30$) </br> $36.00 </p>
                </td>
                <td class="menuitemtd">
                    <img class="menuitem" src = "Menu Items/Maguro Don.jpg" alt="Maguro Don">
                    <div class="middle">
                        <div class="text">Bluefin tuna, chopped shiso, myoga ginger, chives, wasabi over sushi rice</div>
                    </div>
                    <p> Maguro Don </br> $34.00 </p>
                </td>
                <td class="menuitemtd">
                    <img class="menuitem" src = "Menu Items/Otto Ramen.jpg" alt="Otto Ramen">
                    <div class="middle">
                        <div class="text">Ramen noodles, chicken & duck broth, roasted duck breast, marinated egg, green onions, onions, nori</div>
                    </div>
                    <p> Otto Ramen </br> $16.00 </p>
                </td>
                <td class="menuitemtd">
                    <img class="menuitem" src = "Menu Items/Mushroom Mazemen.jpg" alt="Mushroom Mazemen">
                    <div class="middle">
                        <div class="text">(Vegan option available)Ghee, parmigianno, shallots, smoked paprika, black pepper, chives and organic egg yolk</div>
                    </div>
                    <p> Mushroom Mazemen </br> $18.00 </p>
                </td>
            </tr>
            <tr>
                <td class="menuitemtd">
                    <img class="menuitem" src = "Menu Items/Duck Mazemen.jpg" alt="Duck Mazemen">
                    <div class="middle">
                        <div class="text">Poached egg, chopped onions scallions, truffle oil, nori, black pepper</div>
                    </div>
                    <p> Duck Mazemen </br> $24.00 </p>
                </td>
                <td class="menuitemtd">
                    <img class="menuitem" src = "Menu Items/Uni Mazemen.jpg" alt="Uni Mazemen">
                    <div class="middle">
                        <div class="text">Sea urchins, roasted bone marrow chives, scallions, shallots</div>
                    </div>
                    <p> Uni Mazemen </br> $24.00 </p>
                </td>
                <td class="menuitemtd">
                    <img class="menuitem" src = "Menu Items/Spicy Ikura Mazemen.jpg" alt="Spicy Ikura Mazemen">
                    <div class="middle">
                        <div class="text">Home marinated salmon roe, chili oil, cucumber, coriander, chives, shallots</div>
                    </div>
                    <p> Spicy Ikura Mazemen </br> $22.00 </p>
                </td>
                <td class="menuitemtd">
                    <img class="menuitem" src = "Menu Items/Karaage.jpg" alt="Karaage">
                    <div class="middle">
                        <div class="text">Fried chicken, kale, yuzu, mayo (truffled + 2$, spicy +1$)</div>
                    </div>
                    <p> Karaage </br> $12.00 </p>
                </td>
            </tr>
            <tr>
                <td style="text-align: center;" colspan="4">
                    <h2 id="grocery">Grocery</h2>
                    <p> Ketchup ..... $7.50 </p>
                    <p> Yuzu Mayo ..... $9.00 </p>
                    <p> Sesame Dressing ..... $8.50 </p>
                    <p> Otto Aragoshi Ponzu ..... $8.00 </p>
                    <p> Soya Sauce ..... $6.50 </p>
                    <p> Yuzukoshu 100g (Spicy Yuzu Paste) ..... $16.00 </p>
                </td>
            </tr>
        </table>

        <form action="menu-order.php">
            <label>Would you like to order?</label>
            <input type="submit" id = "button" value="Order">
        </form>
    </div>
</body>
<!----Footer of the page---->
<?php include("../HeaderFooter/footer.php"); ?>
</html>