<html>
<head>
<title>Manila Observatory Archives</title>
<link href="css_archives.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
<!--
a:link {
	color: #D60A0A;
}
-->
</style></head>

<body class="background">
<table width="743" height="100%" border="0" align="center" cellpadding="0" cellspacing="2" class="table1">
  <tr>
    <td height="18" valign="top"><center>
	<?php
//input page meta-data here to be passed on to header
//$homedir="php/";
include ('header.php');
?>
    </center>
   </td>
  </tr>
  <tr>
    <td height="477" valign="top"><table width="731" height="100%" border="0" align="center" cellpadding="2" cellspacing="3" class="table2">
      <tr>
        <td height="59" valign="top"><p class="l_text">RESULTS MANILA OBSERVATORY ARCHIVES </p>
<?php
include ('php-bin/functions.php');

$search_query=cleanup_text($HTTP_POST_VARS['search_query']);

@mysql_connect("localhost:3306", "cives", "mundi") or die ("Can't connect!");
mysql_select_db("mo_archives") or die("Can't select database!");

$query="(SELECT * FROM selga WHERE title LIKE '%$search_query%' OR lname LIKE '%$search_query%') UNION ALL (SELECT * FROM deppermann WHERE title LIKE '%$search_query%' OR lname LIKE '%$search_query%') UNION ALL (SELECT * FROM doucette WHERE title LIKE '%$search_query%' OR lname LIKE '%$search_query%')ORDER BY code";
//WHERE title LIKE '%klima%' finds all book titles with the word 'klima' anywhere in the book title
//echo "$query.<br>";

//(select * FROM internet_arts) UNION (select * FROM losangeles_arts) UNION (select * FROM sanfrancisco_arts) ORDER BY date desc, time desc LIMIT $offset, $rowsPerPage;


$result=safe_query($query);
echo "<span class='m_text'>You search <b>$search_query</b>.</span><br><br>";
echo "<span class='m_text'><a href='search.php'>Click here to search again.</a></span><br><br>";

$number=mysql_num_rows($result);
if ($number==0)
{
echo "<span class='m_text'>Sorry, I couldn't find anything that matches your query <b>($search_query)</b></span>";
exit;
}

if ($number==1)
{
echo "<span class='m_text'>I've found <b>1</b> match!</span><br>";
}
else {
echo "<span class='m_text'>I've found <b>$number</b> matches!</span><br>";
}

while ($row= mysql_fetch_array($result))
{
$code = $row['code'];
$record_type= $row['record_type'];
$year= $row['year'];
$month= $row['month'];
$month_no= $row['month_no'];
$day= $row['day'];
$fname= $row['fname'];
$lname= $row['lname'];
$sender= $row['sender'];
$recipient= $row['recipient'];
$title= $row['title'];
$source= $row['source'];
$source_title= $row['source_title'];
$publisher= $row['publisher'];
$place_publisher= $row['place_publisher'];
$volume_no= $row['volume_no'];
$page= $row['page'];
$description= $row['description'];
$note= $row['note'];
$copies= $row['copies'];
$ef_no= $row['ef_no'];
$link_file= $row['link_file'];

print "<br>";
if ($lname==null)
{
echo "<span class='m_text'></span>";
}
else
{
echo "<span class='m_text'>Last Name: $lname<br></span>";
}
if ($fname==null)
{
echo "<span class='m_text'></span>";
}
else
{
echo "<span class='m_text'>First Name: $fname<br></span>";
}
if ($title==null)
{
echo "<span class='m_text'></span>";
}
else
{
echo "<span class='m_text'>Title: $title<br></span>";
}
if ($description==null)
{
echo "<span class='m_text'></span>";
}
else
{
echo "<span class='m_text'>Description: $description<br></span>";
}
}
print "<br>";
?>


		</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td valign="bottom">
	<center>
	  <?php
//input page meta-data here to be passed on to header
//$homedir="php/";
include ('footer.php');
?>


	</center></td>
  </tr>
</table>
</body>
</html>