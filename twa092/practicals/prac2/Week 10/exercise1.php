<!--
  Name: James Guerra
  Student ID: 19045229
  Prac Class: Thursday 10am
-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Week 10 Exercise 1</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <?php
      require_once("conn.php");
      $staffId = $dbConn->escape_string($_GET['staffID']);
      $sql = "SELECT DISTINCT orderID, orderDate, shippingDate, staffName
      FROM purchase
      INNER JOIN staff
      ON staff.staffID = '$staffId'
      AND staff.staffID = purchase.staffID
      ORDER BY orderDate asc";
      $results = $dbConn->query($sql)
         or die ('Problem with query' . $dbConn->error);
    ?>
    <h1>Staff Purchases</h1>
    <table>
      <tr>
        <th>Order ID</th>
        <th>Date Ordered</th>
        <th>Date Shipped</th>
        <th>Staff Name</th>
      </tr>

    <?php while ($row = $results->fetch_assoc()) { ?>
        <tr>
          <td><?php echo $row["orderID"]?></td>
          <td><?php echo $row["orderDate"]?></td>
          <td><?php echo $row["shippingDate"]?></td>
          <td><?php echo $row["staffName"]?></td>
          <!-- output the other fields here from the $row array -->
        </tr>
    <?php }
      $dbConn->close(); ?>
    </table>
  </body>
</html>
