<!DOCTYPE html>
<html lang="en">
  <head>
     <meta charset="utf-8">
     <title>Example 7 PHP</title>
  </head>
  <body>
    <h2>Your Pizza Order</h2>
     <?php
        if (empty($_POST["pizza"])) {
           echo "<p>No Pizzas. Not hungry today?</p>";
           exit;
        }
        if (count($_POST["pizza"])>3) {
           echo "<p> " .count($_POST["pizza"]) . " pizzas. Are you really that hungry?</p>";
        }

        $total = 0;
        echo "<p>Pizza Total = $";
        foreach ($_POST["pizza"] as $val) {
           $total = $total + $val;
        }
        echo $total . "</p>";
     ?>

  </body>
</html>
