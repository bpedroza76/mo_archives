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
        <td height="59" valign="top"><p class="l_text"><img src="../pictures/maso.jpg" width="126" height="190" align="left">MIGUEL SADERRA-MASO, S.J. (1865-1939)</p>
          <p class="m_text">
<?php
		  
@mysql_connect("mysqldb", "cives", "mundi") or die ("Can't connect!");
mysql_select_db("mo_archives") or die("Can't select database!");
	
$query = "SELECT COUNT(code) FROM saderra_maso"; 

$result = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_array($result)){
	echo "". $row['COUNT(code)'] ." textual records";
	echo "<br />";
}
	
?>          
          </p>
          <p class="m_text"> He was born in Olot (Gerona, Spain) and joined the Society of Jesus in 1882. In 1890 he arrived at the Manila Observatory and was put in charge of he seismological station. In 1895 he published the first work on the seismology of Philippines (La sismolog&iacute;a en Filipinas), which includes a catalogue of earthquakes for the periods 1599-1865 (historical) and 1866-1889 (instrumental), with intensity maps for larger events.  He returned to Spain to complete his studies in theology and was back in Manila Observatory in 1901, where he worked in seismology and terrestrial magnetism. He installed seismographic stations in Butuan, Ambulong, Baguio and the island of Guam. He established also meteorological and geomagnetic stations in several places in Philippines and studied the occurrence of earthquakes and volcanic eruptions. In 1910 he published a new catalogue of  destructive earthquakes and in 1913 the first study of seismotectonics of Philippines. In 1932 after suffering a stroke he returned to Spain.</p>
          <form name="submit_personal" method="post" action="get_personal.php">
            <span class="m_text">I.
            <input type="submit" value="&nbsp;&nbsp;&nbsp;&nbsp;Biographical records" style="font-family:Tahoma;font-size:13px;text-align:left;background-color:F0E8CE;border-style:none;color:D60A0A">
            </span>
            <input type="hidden" name="name" value="MIGUEL SADERRA-MAS&Oacute;, S.J. (1865-1939)">
            <input type="hidden" name="category" value="BIOGRAPHICAL RECORDS">
            <input type="hidden" name="ef" value="E/F No.: XV SAD S1">
            <input type="hidden" name="database" value="saderra_maso">
            <input type="hidden" name="type" value="biographical_records">
          </form>
          <span class="m_text">II.&nbsp;&nbsp;&nbsp;Writings</span>
          <table>
            <tr>
              <td><form name="submit_writing" method="post" action="get_writing.php">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" value="Published" style="font-family:Tahoma;font-size:13px;background-color:F0E8CE;border-style:none;color:D60A0A">
        <input type="hidden" name="name" value="MIGUEL SADERRA-MAS&Oacute;, S.J. (1865-1939)">
        <input type="hidden" name="category" value="WRITINGS, PUBLISHED">
        <input type="hidden" name="ef" value="E/F No.: XV SAD S2">
        <input type="hidden" name="database" value="saderra_maso">
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
        <input type="hidden" name="name" value="MIGUEL SADERRA-MAS&Oacute;, S.J. (1865-1939)">
        <input type="hidden" name="category" value="CORRESPONDENCE, INCOMING">
        <input type="hidden" name="ef" value="E/F No.: XV SAD S3">
        <input type="hidden" name="database" value="saderra_maso">
        <input type="hidden" name="type" value="correspondence_incoming">
              </form></td>
            </tr>
          </table>
          <p>&nbsp;</p>
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
