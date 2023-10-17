<?php
//initialize
include ('global_vars.php');

$conn = mysql_connect("10.8.0.8","kclient","malamig")
	or die("Could not connect to database");
mysql_select_db("klima", $conn) or
	die("could not select klima");
?>
