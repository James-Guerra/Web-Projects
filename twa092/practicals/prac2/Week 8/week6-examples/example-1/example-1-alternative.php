<?php $MAX_COUNT = 10; ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>PHP Example 1</title>
   </head>
   <body>
      <h1>Lets Count</h1>
      <p>
         I can count to <?php echo $MAX_COUNT; ?><br>
         <?php for($i = 1; $i <= $MAX_COUNT; $i++): ?>
            <?php echo $i;?><br>
         <?php endfor;?>
      </p>
   </body>
</html>
