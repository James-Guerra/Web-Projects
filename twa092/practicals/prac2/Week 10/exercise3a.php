<!--
  Name: James Guerra
  Student ID: 19045229
  Prac Class: Thursday 10am
-->
<?php
  session_start();
  if (!$_SESSION['name'] || !$_SESSION['hobby']){
    header("location: exercise3.html");
  }
  $name = $_SESSION['name'];
  $hobby = $_SESSION['hobby'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Week 10 Exercise 3a</title>
  </head>
  <body>
    <p><?php echo "Hello " . $name . ". Your hobby is " . $hobby?></p>
    <a href="exercise3.html">Go to the starting form</a>
  </body>
  <?php session_destroy();?>
</html>
