<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>Example 1 PHP</title>
   </head>
   <body>

<?php
  $connObj = new mysqli('localhost', 'TWA_student', 'TWA_2019_Autumn', 'autoservice');

  if($connObj->connect_error) {
    die('Connection Error (' . $connObj->connect_errno . ')'
    . $connObj->connect_error);
  }

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
