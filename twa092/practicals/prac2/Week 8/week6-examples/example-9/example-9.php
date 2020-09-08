<!DOCTYPE html>
<html lang="en">
  <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="styles.css" type="text/css">
     <title>Postback - Example 9</title>
     <!--
     This is a reworking of Example 5 to use postback so that the form and the processing is achieved in the same php page.
     -->
  </head>
  <body>
    <form id="eg9" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
      <div class="form-element">
        <label for="number">What do you want me to count up to?</label>
        <input type="text" name="number" id="number">
      </div>
      <div class="form-element">
        <input type="submit" name="submit-button" value="Submit">
      </div>
    </form>

     <!--
     the following section of the page will only run if the form has been submitted
     -->
     <?php
       if (isset($_POST["submit-button"])) {
     ?>
         <h1>Lets Count</h1>
         <p>
         <?php
            $num = $_POST['number'];
            if ($num <= 1000) {
                echo "I can count to $num:<br>";
                for($i = 1; $i <= $num; $i++) {
                   echo "$i<br>";
                }
            } else {
              echo "I can't count <em>that</em> high<br>";
            }
         ?>
         </p>
        <?php
       }
     ?>
  </body>
</html>
