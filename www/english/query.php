<?php
include ('php-bin/functions.php');

$search_query=cleanup_text($HTTP_POST_VARS['search_query']);

mysql_pconnect("localhost", "root", "asdzxc987") or die("Can't connect!");
mysql_select_db("test") or die("Can't select database!");


//$query= mysql_query("SELECT * FROM name WHERE name=".$search_query);
$query= "SELECT * FROM name WHERE name='".$search_query."'";
//echo "$query.<br>";

$result=safe_query($query);
echo "You search $search_query.<br>";

//$result1 = mysql_num_rows($query);
//if ($query == 0)
//{
//echo "Sorry, I couldn't find any user that matches your query //($search_query)";
//exit;
//}

//if ($result1 == 1)
//{
//echo "I've found <b>1</b> match!<br>";
//}
//else {
//echo "I've found <b>$result1</b> matches! <br>";
//}

while ($row= mysql_fetch_array($result))
{
$name= $row['name'];
$id = $row["id"];

echo "The NAME of the user is: $name.<br>";
echo "The ID of the user is: $id.<br>";
}

?>