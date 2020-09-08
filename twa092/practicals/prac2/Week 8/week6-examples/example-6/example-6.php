<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>Example 6</title>
   </head>
   <body>
     <?php
     echo "<h2>Your Favourite Sports</h2>";
        if (empty($_GET["sport"])) {
          echo "you didn't answer the question";
        } else {
          echo "<p>You selected " . count($_GET["sport"]) . " sports that you like: </p>";
          foreach($_GET["sport"] as $thisSport) {
             echo "<p>You chose $thisSport </p>";
          }
        }
      ?>
    </body>
</html>
