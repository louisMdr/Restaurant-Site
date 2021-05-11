<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Take-Out - Bistro Otto </title>
    <link rel="stylesheet" type="text/css" href="../CommonStyling/BistroOttoCommon.css" />
    <link rel="stylesheet" type="text/css" href="delivery.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="map.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="crossorigin=""> var mymap = null;</script>
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
            <header class="pageHeader"> Take-Out </header>
        </div>
        <div class="main1">
            <h1 class="q">Want to order out? </h1>
            </br>

            <div class="main2" >
                <h1>Visit our ordering page...</h1>

                <input type="button" id="button" value="Order On Site"
                    onclick="document.location='../MenuPage/menu-order.php'"></button>

                </br>

                <h1>Or choose a delivery service!</h1>

                <table>
                    <th><a href="https://www.ubereats.com/ca/montreal/food-delivery/bistro-otto/PgUTBWqiQbOBSMS8-du11Q" target="blank">
                            <img class ="picture"; alt="UberEats"
                                src="https://upload.wikimedia.org/wikipedia/commons/2/23/Uber_eats_logo_2017_06_22.jpg"
                                width="200" height="200">
                        </a></th>
                    <th><a href="https://www.skipthedishes.com/bistro-otto" target="blank">
                            <img class ="picture" alt="Skip the Dishes"
                                src="https://pbs.twimg.com/profile_images/1287611203641061376/JnfLrXmi_400x400.png"
                                width="200" height="200">
                        </a></th>
                    <th><a href="https://www.doordash.com/store/bistro-otto-montreal-914739999/en-CA" target="blank">
                            <img class ="picture" alt="DoorDash"
                                src="https://cdn.doordash.com/static/img/doordash-square-red.jpg?dd-nonce=1" width="200"
                                height="200">
                        </a></th>

                </table>

                <p>Click on the logo of the delivery service of your choice!</p>
            </div>
        </div>
        <div class="main1" >
            <h1 class="q">Make sure we delivery to you!</h1>
            </br>
            <div class="main2">
                <table>
                    <tr>
                        <td>
                            <div id="mapid" style="width: 500px; height: 400px;"></div>
                        </td>
                        <td>
                            <p>Enter your address here</p>
                            <input class="text" type="text" id="address" name="address" placeholder="1234 Rue xyz"
                                required />
                            <br></br>
                            <span id="message"></span>
                        </td>
                        <td>
                            <input type="button" id="button" value="Check" onclick="latlong()"></button>
                        </td>
                    </tr>  
                </table>
            </div>
        </div>
    </div>


    <script type="text/javascript">

        //Initialize Map	
        var BistroOttoLat = 45.521741;
        var BistroOttoLong = -73.585184;

        mymap = L.map('mapid').setView([BistroOttoLat, BistroOttoLong], 14.5);
        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            maxZoom: 18,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1
        }).addTo(mymap);

        function latlong() {
            var addr = document.getElementById("address").value //This variable is the address entered by the user

            var xmlhttp = new XMLHttpRequest();
            var url = "https://nominatim.openstreetmap.org/search?format=json&limit=3&q=" + addr; //The address entered by the user is added to the given URL

            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var myArr = JSON.parse(this.responseText);

                    var latitude = myArr[0].lat;
                    var longitude = myArr[0].lon;

                    var latlng = L.latLng(BistroOttoLat, BistroOttoLong);
                    var latlng2 = L.latLng(latitude, longitude);

                    L.circleMarker(latlng, { color: "blue", radius: "100" }).addTo(mymap); //This is the circle marker at Bistro Otto
                    L.circleMarker(latlng, { color: "blue", radius: "20" }).addTo(mymap); //This is the circle marker at the address entered by the user
                    L.circleMarker(latlng2, { color: "red", radius: "20" }).addTo(mymap); //This is the smaller marker at the Bistro Otto address
                    
                    var distance = (latlng.distanceTo(latlng2)).toFixed(0) / 1000; //Calculates the distance between the latlng and latlng2

                    message.textContent = "Your distance from Bistro Otto is " + distance + "km"; //Displays distance to user

                    var latlngs = [[latitude, longitude], [BistroOttoLat, BistroOttoLong]]; //Array variable used to display the polyline
                    var polyline = L.polyline(latlngs, { color: 'red' }).addTo(mymap); //Polyline added to the map
                    mymap.fitBounds(polyline.getBounds());
                }
            };
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }
    </script>
</body>

<?php include("../HeaderFooter/footer.php"); ?>

</html>