<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Require Example</title>
        <style>
          body {
            background-color: orange;
          }
        </style>
    </head>
    <body>
        <?php

            echo "<p>A $color $fruit<br/>"; // A

            require 'vars.php';

            echo "<p>A $color $fruit</p>"; // A green apple

        ?>
    </body>
</html>
