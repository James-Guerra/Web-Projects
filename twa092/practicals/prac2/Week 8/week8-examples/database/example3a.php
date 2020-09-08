<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>Example 3a PHP</title>
   </head>
   <body>
<?php
  require_once('conn.php');

  if(!$recordSet = $connObj->query('select * from customer where familyName = "fred"')) {
    die('Query Statement Error (' . $connObj->errno . ')'
     . $connObj->error);
  }
?>
   <h1>Customers</h1>
   <?php if($recordSet->num_rows): ?>
       <ul>
       <?php while($row = $recordSet->fetch_assoc()): ?>
           <li><?php echo $row['familyName'];?></li>
       <?php endwhile; ?>
       </ul>
   <?php else: ?>
       <p>There are no records for Customers with that surname</p>
   <?php endif;

  $connObj->close();

?>
    </body>
</html>
