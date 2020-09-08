<!--
  Name: James Guerra
  Student ID: 19045229
  Prac Class: Thursday 10am
-->
<?php
  function value() {
    if($_SERVER["REQUEST_METHOD"] === "POST") {
      session_start();
      $quantitySession = htmlspecialchars($_POST["quantity"]);
      $_SESSION["value"] = $quantitySession;
    }
    return $_SESSION["value"];
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Week 8 Exercise 5</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <?php
      $quantityError = "";
      if($_SERVER["REQUEST_METHOD"] === "POST") {
        $quantityCheck = htmlspecialchars($_POST['quantity']);
        if (!preg_match("/^[0-9]*$/" , $quantityCheck)) {
          $quantityError =  "The value entered for the quantity was not a number.";
        }
      }
    ?>

    <form id="exercise5Form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <h1>Quantity in Stock</h1>
      <p>Please enter the quantity to check against stock levels</p>
      <p>
          <label for="quantity">Quantity: </label>
          <input type="text" name="quantity" size="10" id="quantity" maxlength="6" value="<?php if(isset($_REQUEST['submit'])) {echo value();} ?>">
          <span id="error">
            <?php
              if($_SERVER["REQUEST_METHOD"] == "POST") {
                echo $quantityError;
              }
            ?>
          </span>
      </p>
      <p><input type="submit" name="submit"></p>
    </form>

    <?php if(isset($_REQUEST['submit'])) {
            if(is_numeric(htmlspecialchars($_POST["quantity"]))) {
                require_once("conn.php");
                $quantity = $dbConn->escape_string($_POST["quantity"]);
                $sql = "SELECT name, quantityInStock, price
                FROM product
                WHERE quantityInStock > '$quantity' ";
                $results = $dbConn->query($sql)
                  or die ('Problem with query: ' . $dbConn->error);
              ?>

            <?php if($quantity < 60) {?>
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
                    <p id="greater-than-60"><?php echo "There are no products that have more than " . $quantity . " in stock"; ?></p><?php
                  }
                  $dbConn->close();
              }
            }?>
      </table>
  </body>
</html>
