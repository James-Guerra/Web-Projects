<!--
  Name: James Guerra
  Student ID: 19045229
  Prac Class: Thursday 10am
-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Week 8 Exercise 1</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <?php
      require_once("conn.php");
      $sql = "SELECT * FROM product";
      $results = $dbConn->query($sql)
        or die ('Problem with query: ' . $dbConn->error);
    ?>
    <h1>Product table</h1>
    <table>
      <tr>
        <th>Product Code</th>
        <th>Name </th>
        <th>Quantity In Stock</th>
        <th>Price</th>
      </tr>

    <?php while ($row = $results->fetch_assoc()) { ?>
        <tr>
          <td><?php echo $row["productCode"]?></td>
          <td><?php echo $row["name"]?></td>
          <td><?php echo $row["quantityInStock"]?></td>
          <td><?php echo $row["price"]?></td>
          <!-- output the other fields here from the $row array -->
        </tr>
    <?php }
      $dbConn->close(); ?>
    </table>
  </body>
</html>
