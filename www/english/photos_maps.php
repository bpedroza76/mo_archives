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
        <td height="59" valign="top"><p class="l_text">PHOTOS AND MAPS</p>
          <p class="m_text">The Photos and Maps collection provide visual representations of the institutional history and research activities of the Manila Observatory. The photos are grouped according to assigned subjects; while the maps are arranged by source and date. The titles, descriptions and year were all taken from the actual materials. Otherwise, any additional information supplied is enclosed in square brackets ([ ]). Select any of the lists below to view the contents of this collection. These images may not be copied, published, or reproduced without permission from the Manila Observatory.          </p>
          <table>
            <tr>
              <td><form name="submit_writing" method="post" action="photos.php">
                <input type="submit" value="Photos" style="font-family:Tahoma;font-size:13px;background-color:F0E8CE;border-style:none;color:D60A0A">&nbsp;|
                </form></td>
              <td>
                <form name="submit_writing" method="post" action="get_maps.php">
                  <input type="submit" value="Maps" style="font-family:Tahoma;font-size:13px;background-color:F0E8CE;border-style:none;color:D60A0A">
                  <input type="hidden" name="name" value="MAPS">
                  <input type="hidden" name="category" value="MAPS, MONTHLY BULLETINS">
                  <input type="hidden" name="ef" value="--">
                  <input type="hidden" name="database" value="maps">
                  <input type="hidden" name="type" value="maps_mb">
                  </form>
                </td>
            </tr>
		    </table>
          <p>&nbsp;</p></td>
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
