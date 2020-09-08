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
    $firstname = htmlspecialchars($_POST["firstname"]);
    $email = htmlspecialchars($_POST["email"]);
    $address = htmlspecialchars($_POST["postaddr"]);
    $sport = htmlspecialchars($_POST["favsport"]);
    $mailingList = htmlspecialchars($_POST["emaillist"]);
    ?>
      <p>The following information was received from the form:</p>
      <p><strong>Name = </strong> <?php echo $firstname; ?></p>
      <p><strong>Email = </strong> <?php echo $email; ?></p>
      <p><strong>Postal Address = </strong> <?php echo $address; ?></p>
      <p><strong>Favourite Sports = </strong></p>
      <?php
      foreach($_POST["favsport"] as $multiSport) { ?>
        <p> <?php echo $multiSport ?></p>
      <?php } ?>
      <p><strong>Subscribed = </strong> <?php echo $mailingList; ?></p>

  </body>
</html>
