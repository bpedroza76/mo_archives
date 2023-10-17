<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Manila Observatory Archives</title>
<link href="../css_archives.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
a:link {
	color: #D60A0A;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: underline;
}
a:active {
	text-decoration: none;
}
-->
</style>
</head>

<body class="background">
<table width="743" height="0" border="0" align="center" cellpadding="0" cellspacing="2" class="table1">
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
    <td height="137" valign="top"><table width="731" height="100%" border="0" align="center" cellpadding="2" cellspacing="3" class="table2">
      <tr>
        <td height="59" valign="top"><p class="l_text"><img src="../pictures/hennesy.jpg" width="126" height="190" align="left">JAMES J. HENNESSEY, S.J.</p>
          <p class="m_text">
<?php
		  
@mysql_connect("mysqldb", "cives", "mundi") or die ("Can't connect!");
mysql_select_db("mo_archives") or die("Can't select database!");
	
$query = "SELECT COUNT(code) FROM hennessey"; 

$result = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_array($result)){
	echo "". $row['COUNT(code)'] ." textual records";
	echo "<br />";
}
	
?>          
          </p>
          <p class="m_text"> This collection is composed of the following record series and sub-series and their corresponding file list:</p>
          <form name="submit_personal" method="post" action="get_personal.php">
            <span class="m_text">I.
            <input type="submit" value="&nbsp;&nbsp;&nbsp;&nbsp;Biographical records" style="font-family:Tahoma;font-size:13px;text-align:left;background-color:F0E8CE;border-style:none;color:D60A0A">
            </span>
            <input type="hidden" name="name" value="JAMES J. HENNESSEY, S.J.">
            <input type="hidden" name="category" value="BIOGRAPHICAL RECORDS">
            <input type="hidden" name="ef" value="E/F No.: IX HEN S2">
            <input type="hidden" name="database" value="hennessey">
            <input type="hidden" name="type" value="biographical_records">
          </form>
          <span class="m_text">II.&nbsp;&nbsp;&nbsp;Writings</span>
          <table>
            <tr>
              <td><form name="submit_writing" method="post" action="get_writing.php">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" value="Published" style="font-family:Tahoma;font-size:13px;background-color:F0E8CE;border-style:none;color:D60A0A">
        <input type="hidden" name="name" value="JAMES J. HENNESSEY, S.J.">
        <input type="hidden" name="category" value="WRITINGS, PUBLISHED">
        <input type="hidden" name="ef" value="E/F No.: VI DOU S2">
        <input type="hidden" name="database" value="hennessey">
        <input type="hidden" name="type" value="writings_published">
              </form></td>
              <td>&nbsp;</td>
            </tr>
          </table>
          <span class="m_text">III.&nbsp;&nbsp;Correspondence</span><br>
          <table>
            <tr>
              <td><form name="submit_correspondence" method="post" action="get_correspondence_in.php">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" value="Incoming" style="font-family:Tahoma;font-size:13px;background-color:F0E8CE;border-style:none;color:D60A0A">
&nbsp;|
        <input type="hidden" name="name" value="JAMES J. HENNESSEY, S.J.">
        <input type="hidden" name="category" value="CORRESPONDENCE, INCOMING">
        <input type="hidden" name="ef" value="E/F No.: IX HEN S3.1">
        <input type="hidden" name="database" value="hennessey">
        <input type="hidden" name="type" value="correspondence_incoming">
              </form></td>
              <td><form name="submit_correspondence" method="post" action="get_correspondence_out.php">
                  <input type="submit" value="Outgoing" style="font-family:Tahoma;font-size:13px;background-color:F0E8CE;border-style:none;color:D60A0A">
                  <input type="hidden" name="name" value="JAMES J. HENNESSEY, S.J.">
                  <input type="hidden" name="category" value="CORRESPONDENCE, OUTGOING">
                  <input type="hidden" name="ef" value="E/F No.: IX HEN S3.2">
                  <input type="hidden" name="database" value="hennessey">
                  <input type="hidden" name="type" value="correspondence_outgoing">
              </form></td>
            </tr>
          </table>
          <p class="l_text">&nbsp;</p>
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
