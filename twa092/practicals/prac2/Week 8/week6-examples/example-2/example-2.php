<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <title>PHP Example 2</title>
</head>
<body>
  <h1>Lets count</h1>
  <?php
    $num = $_GET["number"];
    echo "<p>I can count to $num :<br>";
      for ($i = 1; $i <= $num; $i++)
         echo "$i<br>";
  ?>
  </p>
</body>
</html>
