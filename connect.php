<?php
   $connection = new mysqli('localhost', 'root', '', 'dbhudarf2');
   
   if (!$connection){
   	die (mysqli_error($mysqli));
   }
?>