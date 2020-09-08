<!--
  Name: James Guerra
  Student ID: 19045229
  Prac Class: Thursday 10am
-->
<!DOCTYPE>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Week 10 Exercise 4</title>
  </head>
  <body>
    <?php
      require_once("conn.php");
      $customer_id = $dbConn->escape_string($_POST['customerID']);
      $sql = "SELECT firstName, lastName, suburb, customerID
      FROM customer
      WHERE customer.customerID = '$customer_id' ";
      $results = $dbConn->query($sql)
         or die ('Problem with query' . $dbConn->error);
    ?>

    <?php
    $row = $results->fetch_assoc();
    if($_POST["customerID"] == $row["customerID"]) { ?>
    <form>
      <?php while ($row = $results->fetch_assoc()) { ?>
        <label for="fname">First Name:</label>
        <input type="text" id="fname" value="<?php echo $row['firstName']?>"><br>
        <label for="lname">Last Name:</label>
        <input type="text" id="lname" value="<?php echo $row['lastName']?>"><br>
        <label for="suburb">Suburb:</label>
        <input type="text" id="suburb" value="<?php echo $row['suburb']?>">
    <?php }
      $dbConn->close(); ?>
    </form>
  <?php }
        else { ?>
          <p style="color: red"><?php echo "Invalid customer ID" ?></p>
        <?php } ?>
  </body>
</html>
