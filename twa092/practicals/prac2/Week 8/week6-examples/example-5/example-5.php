<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <title>Example 5 PHP</title>
</head>
<body>
   <h1>Lets Count</h1>
   <p>
   <?php
      $num = $_POST['number'];
      echo "I can count to $num:<br>";
      for($i = 1; $i <= $num; $i++) {
         echo "$i<br>";
      }
   ?>
   </p>
</body>
</html>
