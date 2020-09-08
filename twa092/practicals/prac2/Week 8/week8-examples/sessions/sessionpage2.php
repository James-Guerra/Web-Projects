<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Session Example Page 2</title>
        <style>
          body {
            background-color: orange;
          }
          span {
            background-color: white;
            font-size: 150%;
          }
        </style>
    </head>
    <body>
    <?php
        if (!$_SESSION["who"])
          echo "<p>could not get the session variable WHO so I don't know who you are.</p>";

        $yourName = $_SESSION["who"];

        echo "<p><strong>" . session_id() . "</strong></p>";

        echo "<p>Now in the second page. Lets get that session variable back to see who our visitor is:<br>";
        echo "Hello there <span>$yourName</span></p>";
    ?>
    </body>
</html>
