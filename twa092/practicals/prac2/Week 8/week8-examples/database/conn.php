<?php
$connObj = new mysqli('localhost', 'TWA_student', 'TWA_2019_Autumn', 'autoservice');

if($connObj->connect_error) {
    die('Connection Error (' . $connObj->connect_errno . ')'
    . $connObj->connect_error);
}
?>
