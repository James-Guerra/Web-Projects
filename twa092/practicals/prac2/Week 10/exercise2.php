<!--
  Name: James Guerra
  Student ID: 19045229
  Prac Class: Thursday 10am
-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Week 10 Exercise 2</title>
    <link rel="stylesheet" href="styles.css">
  </head>

<body>

<?php
  require_once("conn.php");
  $sql = "SELECT staffName, staffID
  FROM staff";
  $rs = $dbConn->query($sql)
     or die ('Problem with query' . $dbConn->error);
?>

  <h2>Select a staff name to display their orders:</h2>
  <?php while ($row = $rs->fetch_assoc()) : ?>
    <p><a href="exercise1.php?staffID=<?php echo $row["staffID"] ?>"><?php echo $row["staffName"]?></a></p>
  <?php endwhile;
  $dbConn->close();
  ?>
</body>
</html>
