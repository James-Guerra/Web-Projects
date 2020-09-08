<!--
  Name: James Guerra
  Student ID: 19045229
  Prac Class: Thursday 10am
-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Week 7 Exercise 1</title>
  </head>
  <body>
    <?php
    //obtain the firstname input from the $_GET array
    $namestr = $_GET["firstname"];
    $email = $_GET["email"];
    $address = $_GET["postaddr"];
    $sport = $_GET["favsport"];
    $mailingList = $_GET["emaillist"];
    ?>
      <p>The following information was received from the form:</p>
      <p><strong>Name = </strong> <?php echo "$namestr"; ?></p>
      <p><strong>Email = </strong> <?php echo "$email"; ?></p>
      <p><strong>Postal Address = </strong> <?php echo "$address"; ?></p>
      <p><strong>Favourite Sport = </strong> <?php echo "$sport"; ?></p>
      <p><strong>Subscribed = </strong> <?php echo "$mailingList"; ?></p>

  </body>
</html>
