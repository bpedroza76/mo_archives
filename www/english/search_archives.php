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

//I change the code below, it is outdated and potentially unsafe. 
//In modern PHP, I use $_POST to access POST data. updated as of October 13, 2023
// $search_query=cleanup_text($HTTP_POST_VARS['search_query']); 
$search_query = cleanup_text($_POST['search_query']);

@mysql_connect("mysqldb", "cives", "mundi") or die ("Can't connect!");
mysql_select_db("mo_archives") or die("Can't select database!");

$query="(SELECT * FROM algue WHERE title LIKE '%$search_query%' OR lname LIKE '%$search_query%' OR fname LIKE '%$search_query%') UNION ALL
        (SELECT * FROM badillo WHERE title LIKE '%$search_query%' OR lname LIKE '%$search_query%' OR fname LIKE '%$search_query%') UNION ALL
        (SELECT * FROM coronas WHERE title LIKE '%$search_query%' OR lname LIKE '%$search_query%' OR fname LIKE '%$search_query%') UNION ALL
		(SELECT * FROM deppermann WHERE title LIKE '%$search_query%' OR lname LIKE '%$search_query%' OR fname LIKE '%$search_query%') UNION ALL
        (SELECT * FROM doucette WHERE title LIKE '%$search_query%' OR lname LIKE '%$search_query%' OR fname LIKE '%$search_query%') UNION ALL
        (SELECT * FROM faura WHERE title LIKE '%$search_query%' OR lname LIKE '%$search_query%' OR fname LIKE '%$search_query%') UNION ALL
        (SELECT * FROM glover WHERE title LIKE '%$search_query%' OR lname LIKE '%$search_query%' OR fname LIKE '%$search_query%') UNION ALL
        (SELECT * FROM hennessey WHERE title LIKE '%$search_query%' OR lname LIKE '%$search_query%' OR fname LIKE '%$search_query%') UNION ALL
        (SELECT * FROM heyden WHERE title LIKE '%$search_query%' OR lname LIKE '%$search_query%' OR fname LIKE '%$search_query%') UNION ALL
        (SELECT * FROM hidalgo WHERE title LIKE '%$search_query%' OR lname LIKE '%$search_query%' OR fname LIKE '%$search_query%') UNION ALL
        (SELECT * FROM marasigan WHERE title LIKE '%$search_query%' OR lname LIKE '%$search_query%' OR fname LIKE '%$search_query%') UNION ALL
        (SELECT * FROM miller WHERE title LIKE '%$search_query%' OR lname LIKE '%$search_query%' OR fname LIKE '%$search_query%') UNION ALL
        (SELECT * FROM repetti WHERE title LIKE '%$search_query%' OR lname LIKE '%$search_query%' OR fname LIKE '%$search_query%') UNION ALL
        (SELECT * FROM saderra_maso WHERE title LIKE '%$search_query%' OR lname LIKE '%$search_query%' OR fname LIKE '%$search_query%') UNION ALL
        (SELECT * FROM selga WHERE title LIKE '%$search_query%' OR lname LIKE '%$search_query%' OR fname LIKE '%$search_query%') UNION ALL
        (SELECT * FROM su WHERE title LIKE '%$search_query%' OR lname LIKE '%$search_query%' OR fname LIKE '%$search_query%') UNION ALL
		(SELECT * FROM data_records WHERE title LIKE '%$search_query%' OR lname LIKE '%$search_query%' OR fname LIKE '%$search_query%') UNION ALL
		(SELECT * FROM institutional_records WHERE title LIKE '%$search_query%' OR lname LIKE '%$search_query%' OR fname LIKE '%$search_query%') ORDER BY code";
//WHERE title LIKE '%klima%' finds all book titles with the word 'klima' anywhere in the book title
//echo "$query.<br>";

//(select * FROM internet_arts) UNION (select * FROM losangeles_arts) UNION (select * FROM sanfrancisco_arts) ORDER BY date desc, time desc LIMIT $offset, $rowsPerPage;


$result=safe_query($query);
echo "<span class='m_text'>You search <b>$search_query</b>.</span><br><br>";
echo "<span class='m_text'><a href='search.php'>Click here to search again.</a></span><br><br>";

$number=mysql_num_rows($result);
if ($number==0)
{
echo "<span class='m_text'>Sorry, Manila Observatory Archives couldn't find anything that matches your query <b>($search_query)</b></span>";
exit;
}

if ($number==1)
{
echo "<span class='m_text'>Manila Observatory Archives <b>1</b> match!</span><br>";
}
else {
echo "<span class='m_text'>Manila Observatory Archives found <b>$number</b> matches!</span><br>";
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
if ($code=="")
{
echo "<span class='m_text'></span>";
}
else
{
echo "<span class='m_text'>Code: $code<br></span>";
}
if ($fname==null)
{
echo "<span class='m_text'></span>";
}
else
{
echo "<span class='m_text'>Author: $fname $lname<br></span>";
}
if ($title=="")
{
echo "<span class='m_text'></span>";
}
else
{
echo "<span class='m_text'>Title: $title </span>";
}
if ($link_file=="")
{
echo "<span class='m_text'><br></span>";
}
else
{
echo "<a href='$link_file' target='_blank'><img src='../pictures/docu_icon.gif' border='0' align='top'></a><br>";
}
if ($source=="")
{
echo "<span class='m_text'></span>";
}
else
{
echo "<span class='m_text'>Source: $source <br></span>";
}
if ($volume_no=="")
{
echo "<span class='m_text'></span>";
}
else
{
echo "<span class='m_text'>Volume/Issue No.: $volume_no <br></span>";
}
if ($page=="")
{
echo "<span class='m_text'></span>";
}
else
{
echo "<span class='m_text'>Page: $page <br></span>";
}
if ($place_publisher=="")
{
echo "<span class='m_text'></span>";
}
else
{
echo "<span class='m_text'>Place of Publication: $place_publisher <br></span>";
}
if ($publisher==null)
{
echo "<span class='m_text'></span>";
}
else
{
echo "<span class='m_text'>Publisher: $publisher<br></span>";
}
if ($year=="")
{
echo "<span class='m_text'></span>";
}
else
{
echo "<span class='m_text'>Year of Publication: $year <br></span>";
}
if ($description==null)
{
echo "<span class='m_text'></span>";
}
else
{
echo "<span class='m_text'>Description: $description<br></span>";
}
if ($note==null)
{
echo "<span class='m_text'></span>";
}
else
{
echo "<span class='m_text'>Note: $note<br></span>";
}
if ($ef_no==null)
{
echo "<span class='m_text'></span>";
}
else
{
echo "<span class='m_text'>E/F No.: $ef_no<br></span>";
}
}
print "";
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