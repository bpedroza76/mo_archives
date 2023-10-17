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
        <td height="59" valign="top"><p class="l_text"><img src="../pictures/deppermann.jpg" width="126" height="190" align="left">CHARLES E. DEPPERMANN, S.J. (1889-1957)</p>
          <p class="m_text">
<?php
		  
@mysql_connect("mysqldb", "cives", "mundi") or die ("Can't connect!");
mysql_select_db("mo_archives") or die("Can't select database!");
	
$query = "SELECT COUNT(code) FROM deppermann"; 

$result = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_array($result)){
	echo "". $row['COUNT(code)'] ." textual records";
	echo "<br />";
}
	
?>          
          
          </p>
          <p class="m_text"> Born in New York, he entered in the Society of Jesus in 1910.  From 1923 to 1925 he studied physics at Johns Hopkins University, Baltimore, where he obtained his doctoral degree.  In 1926 Deppermann arrived at Manila Observatory where he took charge of the astronomy section and the time service and participated in a program of measurements of longitude.  From 1929 to 1931 he studied variable stars.  In 1931 he took charge of the meteorological section and worked on atmospheric electricity and the ionosphere.  In 1932 Depperemann traveled to the U.S. Geophysical Institute in Bergen and the Meteorological Service in Oslo.  In Norway he learned the new theories of weather front by Bjerknes and Petersen.  On his return to Manila he applied, for the first time, the theories of front genesis and air mass analysis to the storms in Philippines, and published his original work which he continued until the occupation of the observatory by the Japanese. In 1944 he was imprisoned buy the Japanese at Los Ba�os concentration camp. After World War II, in1945, he began plans for the reconstruction of the Observatory and spent in 1947 some time at Saint Louis University studying seismology with Macelwane.  In 1948 he became director of the new Manila Observatory dedicated now to seismology, magnetism, ionosphere studies and solar physics.  Deppermann was one of the most renowned Jesuit Meteorologists.           
          <p class="s_text">(Source: Udias, Agustin. (2003). Searching the heavens and the earth: the history of Jesuit Observatories. Dordrecht: Kluwer Academic Press)</p>
         <form name="submit_personal" method="post" action="get_personal.php">
		  <span class="m_text">I.<input type="submit" value="&nbsp;&nbsp;&nbsp;&nbsp;Biographical records" style="font-family:Tahoma;font-size:13px;text-align:left;background-color:F0E8CE;border-style:none;color:D60A0A"></span>
            <input type="hidden" name="name" value="CHARLES E. DEPPERMANN, S.J. (1889-1957)">
			<input type="hidden" name="category" value="BIOGRAPHICAL RECORDS">
			<input type="hidden" name="ef" value="E/F No.: V DEP S1">
			<input type="hidden" name="database" value="deppermann">
			<input type="hidden" name="type" value="biographical_records">
          </form>
		    <span class="m_text">II.&nbsp;&nbsp;&nbsp;Writings</span>
			<table>
			<tr>
			<td>
		<form name="submit_writing" method="post" action="get_writing.php">
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Published" style="font-family:Tahoma;font-size:13px;background-color:F0E8CE;border-style:none;color:D60A0A">&nbsp;|
                    <input type="hidden" name="name" value="CHARLES E. DEPPERMANN, S.J. (1889-1957)">
                    <input type="hidden" name="category" value="WRITINGS, PUBLISHED">
                    <input type="hidden" name="ef" value="E/F No.: V DEP S2.1">
                    <input type="hidden" name="database" value="deppermann">
					<input type="hidden" name="type" value="writings_published">
				  </form>
			</td>
			<td>
					<form name="submit_writing" method="post" action="get_writing.php">
				    <input type="submit" value="Others" style="font-family:Tahoma;font-size:13px;background-color:F0E8CE;border-style:none;color:D60A0A">
                    <input type="hidden" name="name" value="CHARLES E. DEPPERMANN, S.J. (1889-1957)">
					<input type="hidden" name="category" value="WRITINGS, OTHERS">
                    <input type="hidden" name="ef" value="E/F No.: V DEP S2.2">
                    <input type="hidden" name="database" value="deppermann">
					<input type="hidden" name="type" value="writings_others">
                </form>
             </td>
			 </tr>
		    </table>		
		     <span class="m_text">III.&nbsp;&nbsp;Correspondence</span><br>
             <table>
               <tr>
                 <td><form name="submit_correspondence" method="post" action="get_correspondence_in.php">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        
<input type="submit" value="Incoming" style="font-family:Tahoma;font-size:13px;background-color:F0E8CE;border-style:none;color:D60A0A">
&nbsp;|
        <input type="hidden" name="name" value="CHARLES E. DEPPERMANN, S.J. (1889-1957)">
        <input type="hidden" name="category" value="CORRESPONDENCE, INCOMING">
        <input type="hidden" name="ef" value="E/F No.: V DEP S3.1">
        <input type="hidden" name="database" value="deppermann">
		<input type="hidden" name="type" value="correspondence_incoming">
                 </form></td>
                 <td><form name="submit_correspondence" method="post" action="get_correspondence_out.php">
                     <input type="submit" value="Outgoing" style="font-family:Tahoma;font-size:13px;background-color:F0E8CE;border-style:none;color:D60A0A">
                     <input type="hidden" name="name" value="CHARLES E. DEPPERMANN, S.J. (1889-1957)">
                     <input type="hidden" name="category" value="CORRESPONDENCE, OUTGOING">
                     <input type="hidden" name="ef" value="E/F No.: V DEP S3.2">
                     <input type="hidden" name="database" value="deppermann">
					 <input type="hidden" name="type" value="correspondence_outgoing">
                 </form></td></tr>
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
