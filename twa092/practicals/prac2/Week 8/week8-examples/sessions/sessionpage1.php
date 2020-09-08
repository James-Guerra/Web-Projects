<?php
session_start();
$user = $_POST["name"];
$_SESSION["who"] = $user;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Session Example</title>
        <style>
          body {
            background-color: yellow;
          }
          span {
            background-color: white;
            font-size: 150%;
          }
        </style>
    </head>
    <body>
    <?php echo "<p><strong>" . session_id() . "</strong></p>"; ?>
        <?php
          echo "<p>Thanks for visiting our site <span>" . $_SESSION["who"] . "</span></p>";
        ?>
        <p><a href="sessionpage2.php">Please visit our other exciting second page.</a></p>
    </body>
</html>
