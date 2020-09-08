<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>Example 2 PHP</title>
   </head>
   <body>
<?php
  require_once('conn.php');

  if(!$recordSet = $connObj->query('select * from customer')) {
    die('Query Statement Error (' . $connObj->errno . ')'
     . $connObj->error);
  }
?>
   <h1>Customers</h1>
   <p>
<?php
  while($row = $recordSet->fetch_assoc()) {
     // Do something with the row
    echo $row['familyName'] . "<br>";
  }

  $connObj->close();

?>
    </p>
    </body>
</html>
