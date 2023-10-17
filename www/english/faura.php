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
        <td height="59" valign="top"><p class="l_text"><img src="../pictures/faura.jpg" width="126" height="190" align="left">FREDERICO P. FAURA, S.J. (1840-1897)</p>
          <p class="m_text">
<?php
		  
@mysql_connect("mysqldb", "cives", "mundi") or die ("Can't connect!");
mysql_select_db("mo_archives") or die("Can't select database!");
	
$query = "SELECT COUNT(code) FROM faura"; 

$result = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_array($result)){
	echo "". $row['COUNT(code)'] ." textual records";
	echo "<br />";
}
	
?>          
          
          </p>
          <p class="m_text"> Born in Art&eacute;s (Barcelona), Spain he entered the Society of Jesus in 1859.  As a young Jesuit he was a sent to Manila in 1866 as a teacher of physics and mathematics at the Ateneo and took charge of the observatory which had been created in 185.  In 1868, he made his first scientific expedition to observe a solar ellipse in the Celebes Islands.  In 1871 he returned to Spain to complete his theological studies and in 1877 he visited the observatories of the Colegio Romano and Stonyhurst where he worked with Secchi and Perry.  In 1878 Faura returned to Manila and became again director of the observatory.  He began studies of typhoons stating some hypotheses on their nature and precursory phenomena and made the first forecasts of these storms in 1879.  He studied the earthquakes of 1880 and their damage and renovated the seismological instrumentation of the observatory.  In 182 he made the design of a barometer for the detection of typhoon occurrences.  In 1884 Faura was named Director of the official Servicio Meteorol&oacute;gico Filipino, created by the Spanish Colonial Government and established a network of meteorological stations in the archipelago.  In 1888 Faura traveled to Barcelona to presents the work of the observatory in the Exposici&oacute;n Universal and returned to Manila in 1894.</p>
          <p class="s_text"> (Source: Udias, Agustin. (2003). <i>Searching the heavens and the earth: the history of Jesuit Observatories</i>. Dordrecht : Kluwer Academic Press) </p>          
          <p class="m_text"> This collection is composed of the following record series and sub-series and the corresponding file list: </p>
          <form name="submit_personal" method="post" action="get_personal.php">
		  <span class="m_text">I.<input type="submit" value="&nbsp;&nbsp;&nbsp;&nbsp;Biographical records" style="font-family:Tahoma;font-size:13px;text-align:left;background-color:F0E8CE;border-style:none;color:D60A0A"></span>
            <input type="hidden" name="name" value="FREDERICO P. FAURA, S.J. (1840-1897)">
			<input type="hidden" name="category" value="BIOGRAPHICAL RECORDS">
			<input type="hidden" name="ef" value="E/F No.: VII FAU S1">
			<input type="hidden" name="database" value="faura">
			<input type="hidden" name="type" value="biographical_records">
          </form>
		    <span class="m_text">II.&nbsp;&nbsp;&nbsp;Correspondence</span>
			<table>
			<tr>
			<td>
		<form name="submit_correspondence" method="post" action="get_correspondence_in.php">
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Incoming" style="font-family:Tahoma;font-size:13px;background-color:F0E8CE;border-style:none;color:D60A0A">&nbsp;|
                    <input type="hidden" name="name" value="FREDERICO P. FAURA, S.J. (1840-1897)">
                    <input type="hidden" name="category" value="CORRESPONDENCE, INCOMING">
                    <input type="hidden" name="ef" value="E/F No.: VII FAU S2.1">
                    <input type="hidden" name="database" value="faura">
					<input type="hidden" name="type" value="correspondence_incoming">
			</form>
			</td>
			<td>
					<form name="submit_correspondence" method="post" action="get_correspondence_out.php">
				    <input type="submit" value="Outgoing" style="font-family:Tahoma;font-size:13px;background-color:F0E8CE;border-style:none;color:D60A0A">
                    <input type="hidden" name="name" value="FREDERICO P. FAURA, S.J. (1840-1897)">
					<input type="hidden" name="category" value="CORRESPONDENCE, OUTGOING">
                    <input type="hidden" name="ef" value="E/F No.: VII FAU S2.2">
                    <input type="hidden" name="database" value="faura">
					<input type="hidden" name="type" value="correspondence_outgoing">
                </form>
             </td>
			 </tr>
		    </table>		
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
