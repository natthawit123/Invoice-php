<?php
$connect= mysqli_connect("localhost","root","","testing") or die("Error: " . mysqli_error($connect));
mysqli_query($con, "SET NAMES 'utf8' ");
error_reporting( error_reporting() & ~E_NOTICE );

?>