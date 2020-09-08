<!DOCTYPE html>
<html lang="en">
  <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="styles.css" type="text/css">
     <title>Postback - Example 8</title>
  </head>
  <body>
     <form id="eg8" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="get">
        <div class="form-element">
          <label for="fname">First Name</label>
          <input type="text" name="fname" id="fname">
        </div>
        <div class="form-element">
          <label for="lname">Last Name</label>
          <input type="text" name="lname" id="lname">
        </div>
        <div class="form-element">
          <input type="submit" name="submit-button" value="Submit">
        </div>
     </form>

     <!--
     the following section of the page will only run if the form has been submitted
     -->
     <?php
        if (isset($_REQUEST["submit-button"])) {

           if (isset($_POST["submit-button"])) {
              echo "<h1>POST METHOD</h1>";
              $firstName = $_POST["fname"];
              $lastName = $_POST["lname"];
              echo "Your first name = $firstName <br>";
              echo "Your last name = $lastName <br>";
           }

           if (isset($_GET["submit-button"])) {
              echo "<h1>GET METHOD</h1>";
              $firstName = $_GET["fname"];
              $lastName = $_GET["lname"];
              echo "Your first name = $firstName <br>";
              echo "Your last name = $lastName <br>";
           }

           echo "<h1>REQUEST</h1>";
           $firstName = $_REQUEST["fname"];
           $lastName = $_REQUEST["lname"];
           echo "Your first name = $firstName <br>";
           echo "Your last name = $lastName <br>";

        }
     ?>
  </body>
</html>
