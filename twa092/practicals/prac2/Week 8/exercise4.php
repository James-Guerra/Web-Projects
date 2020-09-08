<!--
  Name: James Guerra
  Student ID: 19045229
  Prac Class: Thursday 10am
-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Week 8 Exercise 4</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <?php
      require_once("conn.php");
      $quantity = $dbConn->escape_string($_POST["quantity"]);
      $sql = "SELECT name, quantityInStock, price
      FROM product
      WHERE quantityInStock > '$quantity' ";
      $results = $dbConn->query($sql)
        or die ('Problem with query: ' . $dbConn->error);
    ?>

    <?php
      if(is_numeric(htmlspecialchars($_POST["quantity"]))) {
        if($quantity < 60) { ?>
          <h1>Products with stock > <?php echo $quantity ?></h1>
          <table>
            <tr>
              <th>Name </th>
              <th>Quantity In Stock</th>
              <th>Price</th>
            </tr>

          <?php while ($row = $results->fetch_assoc()) { ?>
              <tr>
                <td><?php echo $row["name"]?></td>
                <td><?php echo $row["quantityInStock"]?></td>
                <td><?php echo $row["price"]?></td>
                <!-- output the other fields here from the $row array -->
              </tr>
          <?php }
        }
        else { ?>
          <p id="greater-than-60"><?php echo "There are no products that have more than 60 in stock"; ?></p><?php
        }
          $dbConn->close(); ?>
        </table>
  <?php }
        else { ?>
          <p style="color: red;"><?php echo "The value entered for the quantity was not a number." ?></p>
      <?php } ?>
  </body>
</html>
