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
        <td height="59" valign="top"><p class="l_text"><img src="../pictures/repetti.jpg" width="126" height="190" align="left">WILLIAM C. REPETTI, S.J. (1884-1966) </p>
          <p class="m_text">
<?php
		  
@mysql_connect("mysqldb", "cives", "mundi") or die ("Can't connect!");
mysql_select_db("mo_archives") or die("Can't select database!");
	
$query = "SELECT COUNT(code) FROM repetti"; 

$result = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_array($result)){
	echo "". $row['COUNT(code)'] ." textual records";
	echo "<br />";
}
	
?>          
          </p>
          <p class="m_text">Born in Washington, D. C., he entered the Society of Jesus in 1907. In 1910 he was director of the Seismological Station of Canisius College, Buffalo , New York . In 1914 he taught physics and mathematics in Fordham University , New York , and was director of its seismological observatory until 98. In 1926 he studied geophysics in Saint Louis University with Macelwane and obtained his doctoral degree with a thesis on the discontinuities of the structure of the earth interior. In 1928 he traveled to the Philippines and was put in charge of the seismological section of the Manila Observatory. There he completed a new catalogue of earthquakes in the Philippines . After the World War II, he returned to the United States and worked at Georgetown University.
          <p class="s_text">(Source: Udias, Agustin. (2003). <i>Searching the heavens and the earth: the history of Jesuit Observatories</i>. Dordrecht : Kluwer Academic Press)</p>
          <form name="submit_personal" method="post" action="get_personal.php">
            <span class="m_text">I.
            <input type="submit" value="&nbsp;&nbsp;&nbsp;&nbsp;Biographical records" style="font-family:Tahoma;font-size:13px;text-align:left;background-color:F0E8CE;border-style:none;color:D60A0A">
            </span>
            <input type="hidden" name="name" value="WILLIAM C. REPETTI, S.J. (1884-1966)">
            <input type="hidden" name="category" value="BIOGRAPHICAL RECORDS">
            <input type="hidden" name="ef" value="E/F No.: XIV REP S1">
            <input type="hidden" name="database" value="repetti">
            <input type="hidden" name="type" value="biographical_records">
          </form>
          <span class="m_text">II.&nbsp;&nbsp;&nbsp;Writings</span>
          <table>
            <tr>
              <td><form name="submit_writing" method="post" action="get_writing.php">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" value="Published" style="font-family:Tahoma;font-size:13px;background-color:F0E8CE;border-style:none;color:D60A0A">
        <input type="hidden" name="name" value="WILLIAM C. REPETTI, S.J. (1884-1966)">
        <input type="hidden" name="category" value="WRITINGS, PUBLISHED">
        <input type="hidden" name="ef" value="E/F No.: XIV REP S2">
        <input type="hidden" name="database" value="repetti">
        <input type="hidden" name="type" value="writings_published">
              </form></td>
            </tr>
          </table>
          <span class="m_text">III.&nbsp;&nbsp;Correspondence</span><br>
          <table>
            <tr>
              <td><form name="submit_correspondence" method="post" action="get_correspondence_in.php">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" value="Incoming" style="font-family:Tahoma;font-size:13px;background-color:F0E8CE;border-style:none;color:D60A0A">
        <input type="hidden" name="name" value="WILLIAM C. REPETTI, S.J. (1884-1966)">
        <input type="hidden" name="category" value="CORRESPONDENCE, INCOMING">
        <input type="hidden" name="ef" value="E/F No.: XIV REP S3">
        <input type="hidden" name="database" value="repetti">
        <input type="hidden" name="type" value="correspondence_incoming">
              </form></td>
            </tr>
          </table>
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
