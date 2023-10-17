<html>
<head>
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
include ('spanish_header.php');
?>
    </center>
   </td>
  </tr>
  <tr>
    <td height="137" valign="top"><table width="731" border="0" align="center" cellpadding="2" cellspacing="3" class="table2">
      <tr>
        <td height="59" valign="top"><p class="l_text"><img src="../pictures/su.jpg" width="126" height="190" align="left">SERGIO S. SU, S.J. (1922- )</p>
          <p class="m_text"> 6 textos  archivados</p>
        <p class="m_text">Esta  colecci&oacute;n est&aacute; compuesta por los siguientes apartados y subapartados y su  correspondiente lista de archivos:</p>
              <span class="m_text">I.&nbsp;&nbsp;&nbsp;&nbsp;Obras</span>
			  <table>
			<tr>
			<td>
		<form name="submit_writing" method="post" action="get_writing.php">
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Publicadas" style="font-family:Tahoma;font-size:13px;background-color:F0E8CE;border-style:none;color:D60A0A">&nbsp;|&nbsp;
                    <input type="hidden" name="name" value="SERGIO S. SU, S.J. (1922- )">
                    <input type="hidden" name="category" value="OBRAS, PUBLICADAS">
                    <input type="hidden" name="ef" value="E/F No.: XVII SU S1">
                    <input type="hidden" name="database" value="su">
					<input type="hidden" name="type" value="writings_published">
			</form>
			</td>
			<td>
					<form name="submit_writing" method="post" action="get_writing.php">
				    <input type="submit" value="Otras" style="font-family:Tahoma;font-size:13px;background-color:F0E8CE;border-style:none;color:D60A0A">
                    <input type="hidden" name="name" value="SERGIO S. SU, S.J. (1922- )">
					<input type="hidden" name="category" value="OBRAS, OTRAS">
                    <input type="hidden" name="ef" value="E/F No.: XVII SU S2">
                    <input type="hidden" name="database" value="su">
					<input type="hidden" name="type" value="writings_others">
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
