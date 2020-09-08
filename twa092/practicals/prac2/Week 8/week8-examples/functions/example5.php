<?php
// Declare functions at the top of the page
// or in a separate file and then include it
function isBigger ($num1, $num2){
  if($num1 > $num2) {
    return true;
  } else {
    return false;
  }
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Example 5</title>
    </head>
    <body>
    <p>Lets call the function </p>
    <?php
      $num1 = 20;
      $num2 = 120;
      if (isBigger($num1, $num2))
        echo "<p>The first number is larger than the second.</p>";
      else
        echo "<p>The first number is smaller or equal to the second.</p>";
    ?>
    </body>
</html>
