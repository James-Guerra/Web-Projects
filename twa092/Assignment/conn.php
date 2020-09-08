<?php
   $dbConn = new mysqli("localhost", "TWA_student", "TWA_2020_Autumn", "247Music");
   if($dbConn->connect_error) {
      die("Failed to connect to database " . $dbConn->connect_error);
   }
?>
