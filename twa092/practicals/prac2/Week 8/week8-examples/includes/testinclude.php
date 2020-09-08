<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Include Example</title>
        <style>
          body {
            background-color: yellow;
          }
        </style>
    </head>
    <body>
        <?php

        echo "<p>A $color $fruit<br/>"; // A

        include 'vars.php';

        echo "<p>A $color $fruit</p>"; // A green apple

        ?>
    </body>
</html>
