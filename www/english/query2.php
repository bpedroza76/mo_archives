<?php
include ('php-bin/functions.php');

$search_query=cleanup_text($HTTP_POST_VARS['search_query']);

@mysql_connect("localhost:3306", "root", "asdzxc987") or die ("Can't connect!");
mysql_select_db("test") or die("Can't select database!");

$query="SELECT * FROM directory WHERE wdescription LIKE '%$search_query%' OR fname LIKE '%$search_query%' ORDER BY age";
//WHERE title LIKE '%klima%' finds all book titles with the word 'klima' anywhere in the book title
//echo "$query.<br>";

$result=safe_query($query);
echo "You search <b>$search_query</b>.<br><br>";

$number=mysql_num_rows($result);
if ($number==0)
{
echo "Sorry, I couldn't find anything that matches your query <b>($search_query)</b>";
exit;
}

if ($number==1)
{
echo "I've found <b>1</b> match!<br>";
}
else {
echo "I've found <b>$number</b> matches! <br><br>";
}

while ($row= mysql_fetch_array($result))
{
$id = $row["id"];
$fname= $row['fname'];
$lname= $row['lname'];
$email= $row['email'];
$age= $row['age'];
$wdescription= $row['wdescription'];

echo "The ID of the user is: $id.<br>";
echo "The First Name of the user is: $fname.<br>";
echo "The Last Name of the user is: $lname.<br>";
echo "The Email of the user is: <a href=mailto:$email>$email</a>.<br>";
echo "The Age of the user is: $age.<br>";
echo "The Work Description of the user is: $wdescription.<br><br>";
}

?>