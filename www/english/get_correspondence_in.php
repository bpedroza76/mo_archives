<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Manila Observatory Archives</title>
<link href="../css_archives.css" rel="stylesheet" type="text/css">
</head>

<body class="background">
<table width="743" border="0" align="center" cellpadding="0" cellspacing="2" class="table1">
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
    <td height="137" valign="top"><table width="731" border="0" align="center" cellpadding="2" cellspacing="3" class="table2">
      <tr>
        <td height="59" valign="top">
         
            <?php
include ('php-bin/functions.php');
$type = $_POST['type'];
$database = $_POST['database'];
$category = $_POST['category'];
$ef = $_POST['ef'];
$name = $_POST['name'];

echo "<p class='l_text'>$name</p>";
echo "<p class='m_text'><b>$category<br>";
echo "$ef</b></p>";

@mysql_connect("mysqldb", "cives", "mundi") or die ("Can't connect!");
mysql_select_db("mo_archives") or die("Can't select database!");

$query="SELECT * FROM $database WHERE record_type LIKE '$type' ORDER by code";

$result=safe_query($query);

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

echo "
<table class='m_text'>
 <tr>
  <td width='90' valign='top'>
   $code</td>";
if ($sender=="")
{
echo "<td>Letter ";
}
else
{
echo "<td>Letter from $sender ";
}
if ($day=="")
{
echo " dated ";
}
else
{
echo "dated $day ";
}
if ($month=="")
{
echo "";
}
else
{
echo "$month ";
}
if ($year=="")
{
echo "";
}
else
{
echo "$year.&nbsp;&nbsp;";
}
if ($link_file=="")
{
echo "";
}
else
{
echo "<a href='$link_file' target='_blank'><img src='../pictures/docu_icon.gif' border='0' align='top'></a>";
}
echo "</td></form></table>";
}
?>

		  </p>
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