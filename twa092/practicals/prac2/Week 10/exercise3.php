<!--
  Name: James Guerra
  Student ID: 19045229
  Prac Class: Thursday 10am
-->
<?php
  session_start();
  if(empty($_POST['personName']) || empty($_POST['hobby'])) {
  }
  else {
    $name = htmlspecialchars($_POST['personName']);
    $hobby = htmlspecialchars($_POST['hobby']);
    $_SESSION['name'] = $name;
    $_SESSION['hobby'] = $hobby;
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Week 10 Exercise 3</title>
  </head>
  <body>
    <a href=exercise3a.php>Let's visit the second page</a>
  </body>
</html>
