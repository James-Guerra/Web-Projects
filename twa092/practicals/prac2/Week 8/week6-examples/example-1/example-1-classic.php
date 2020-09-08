<?php
  echo '<!DOCTYPE html>';
  echo '<html lang="en">';
  echo '<head>';
  echo '<meta charset="utf-8">';
  echo '<meta http-equiv="X-UA-Compatible" content="IE=edge">';
  echo '<title>PHP Example 1</title>';
  echo '</head>';
  echo '<body>';
  echo "<h1>Let's Count</h1>";
  echo '<p>';
  $MAX_COUNT = 10;
  echo "I can count to $MAX_COUNT:<br>";
  for($i = 1; $i<=$MAX_COUNT; $i++) {
      echo "$i<br>";
  }
  echo '</p>';
  echo '</body>';
  echo '</html>';
?>
