 <?php
   session_start();
   $message = ""; //error message for conflicting times.
   $allReserves = ""; //to display reserved days.
   $fullName = ""; //the name if the person is logged in (or not)
   include_once("../Filebase/Filebase/BistroOttoDatabase.php");
   if (isset($_SESSION["isLoggedIn"]) and isset($_SESSION["username"])) 
   {
         $username = $_SESSION["username"];
         $fullName = $database->get($username)->name;
         if($database->has($username) and $database->get($username)->nbrReserves >=1)
         {
            $msg = displayReservations($database, $username);
            $allReserves = $msg;
         }
   }
   else
   {
      //Nothing changes.
     $allReserves = "";
   } 

if(isset($_POST["submit"]))
{
   $_SESSION["name"] = $_POST["Name"];
   $_SESSION["nbrPPL"] = $_POST["peopleCount"];
   $_SESSION["email"] = $_POST["email"];
   $_SESSION["place"] = $_POST["location"];
   $_SESSION["date"] = $_POST["date"];
   $_SESSION["time"] = $_POST["time"];
   $_SESSION["comments"] = $_POST["extraInfo"];
   //DATABASE HANDLING


//DETAILED INFO ABOUT FILEBASE IS AVAILABLE AT
https://github.com/tmarois/Filebase

function validateTimeSlot()
{
   $reservationFile = fopen("reserveFiles.txt", "a+");
   if(file_exists("reserveFiles.txt") and is_readable("reserveFiles.txt"))
   {
      while(!feof($reservationFile))
       {
         //keep all reservations in the past because restaurant might want to track them (aka don't remove any)
         $line = fgets($reservationFile);
         $userInf = explode( "\t", $line);
         if($userInf[0] == $_SESSION["date"] and $userInf[1] == $_SESSION["time"])
         {
            return false;
         }
       }
       fwrite($reservationFile, $_SESSION["date"] . "\t" . $_SESSION["time"] . "\t" . $_SESSION["name"] .  "\n");
       return true;
   }
}

//add the reservation info to user who already has
   if(validateTimeSlot())
   {
      if (isset($_SESSION["isLoggedIn"]) and isset($_SESSION["username"])) 
      {
         $user = $database->get($_SESSION["username"]);
         if($database->get($username)->nbrReserves >=1)
         {
            $user->nbrReserves++;
         }
         else
         {
            $user->nbrReserves = 1;
         }
         $user->date[] = $_SESSION["date"];
         $user->time[] = $_SESSION["time"];
         $user->place[] = $_SESSION["place"];
         $user->ppl[] = $_SESSION["nbrPPL"];
         $user->save();
      }
      header("Location: Success.php");
      exit();
   }
   else
   {
      $message = "Error: Time " . substr($_SESSION["time"], 0, 2) . ":" . substr($_SESSION["time"], 2) . " on " . $_SESSION["date"] . " fully booked. Please try another one.";
   }
   
}
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Reservations - Bistro Otto</title>
      <meta charset = "utf-8" />
      <link rel = "stylesheet" type = "text/css" href = "../CommonStyling/BistroOttoCommon.css"/>
      <link rel="stylesheet" type="text/css" href="Reservation.css">
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
      <!--------Navigation Bar------->
      <?php include("../HeaderFooter/header.php"); ?>
      <!--  -->
      <div class = "background">
         <div class = "pageTitle">
            <header class = "pageHeader"> Reservation </header>
         </div>

         <!--  -->
         <form class="reserve" action="" method="POST">
            <div id="alertMsg"><?php echo $message;?></div>
            <div id="alertReserve"><?php echo $allReserves;?></div>
            <table id = "Info">
               <tr>
                  <td>
                     <label>Name*
                     <br>
                     <input name = "Name" type = "text" placeholder="John" class = "inputBox"
                     <?php
                     $boxValue = "value=\"" . $fullName . "\" ";
                     if($fullName != "")
                     {
                        $boxValue .= "readonly";
                        echo $boxValue;
                     }
                     else
                     {
                        echo "value=\"\"";
                     }

                     ?>
                     >
                     </label>
                  </td>
                  <td>
                     <label>People (1-8)
                        <img src="https://cdn0.iconfinder.com/data/icons/entypo/92/i9-512.png" id="iIcon" title="Max of 8 due to covid-19 restrictions.">
                        <br>
                     <input name = "peopleCount" type = "number" class="inputBox" min="1" max="8" value="1" title="Max of 8 due to covid-19 restrictions.">
                     <!-- <span id="warning-block">Due to covid-19,<br>only a maximum of 8 people<br>are allowed for each reservation.</span> -->
                     </label>
                  </td>
               </tr>
               <tr>
                  <td>
                     <label class="input-block">
                        Email*
                        <br>
                        <input class = "inputBox" type = "text" name = "email" placeholder="mail@email.com" required>

                     </label>
                  </td>
                  <td>
                     <label>
                        Location*
                        <br>
                        <select name="location" id = "inputLocalBox">
                           <option value="options" disabled>Please select from below.</option>
                           <option value = "montreal">Montreal</option>
                           <option value = "vancouver">Vancouver</option>
                           <option value = "toronto">Toronto</option>
                        </select>
                     </label>
                  </td>
               </tr>
               <tr>
                  <td name="calendarSlot">
                     <table id="calendar">
                        <tr name = "headerMenu">
                           <th id="prevmonth"> ◀ </th>
                           <th colspan="5" id="monthLabel"></th>
                           <th id="nextmonth"> ▶ </th>
                        </tr>
                        <tr>
                           <th>Sun</th>
                           <th>Mon</th>
                           <th>Tue</th>
                           <th>Wed</th>
                           <th>Thu</th>
                           <th>Fri</th>
                           <th>Sat</th>
                        </tr>
                        <tr id="row1"></tr>
                        <tr id = "row2"></tr>
                        <tr id = "row3"></tr>
                        <tr id = "row4"></tr>
                        <tr id = "row5"></tr>
                        <tr id = "row6"></tr>
                     </table>
                  </td>
                  <td>
                     <label>Date & Time*
                     <br><br>
                     <input type="text" name = "date" class = "inputBox" value="" readonly placeholder="DD/MM/YY" required>
                     </label>
                     <br><br><br>
                     <select name="time" class = "inputBox" onmouseover="removeTime()">
                        <option value="option" selected disabled>Time</option>
                     </select>
                  </td>
               </tr>
               <tr>
                  <td colspan="2">
                     <label for="textarea">Additional Comments
                     <br>
                     </label>
                     <textarea name="extraInfo" placeholder="Maximum 200 characters." maxlength="200" class = "inputBox"></textarea>
                     <p>
                        <input type="submit" id="button" value="Book" onclick="return validate()" name="submit">
                     </p>
                  </td>
               </tr>
            </table>
         </form>
      </div>
      <script type="text/javascript" src="Reservation.js"></script>
      
   </body>
   <!----Footer of the page---->
   <?php include("../HeaderFooter/footer.php"); ?>
</html>