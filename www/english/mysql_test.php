<?php

# Define MySQL Settings
define("MYSQL_HOST", "localhost");
define("MYSQL_USER", "root");
define("MYSQL_PASS", "asdzxc987");
define("MYSQL_DB", "test");

$conn = mysql_connect("".MYSQL_HOST."", "".MYSQL_USER."", "".MYSQL_PASS."") or die(mysql_error());
mysql_select_db("".MYSQL_DB."",$conn) or die(mysql_error());

$sql = "SELECT * FROM name";
$res = mysql_query($sql);

while ($field = mysql_fetch_array($res))
{
$id = $field['id'];
$name = $field['name'];

echo 'ID: ' . $field['id'] . '<br />';
echo 'Name: ' . $field['name'] . '<br /><br />';
}

?>