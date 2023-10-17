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
    <td height="137" valign="top"><table width="731" height="100%" border="0" align="center" cellpadding="2" cellspacing="3" class="table2">
      <tr>
        <td height="59" valign="top"><p class="l_text"><img src="../pictures/doucette.jpg" width="125" height="189" align="left">BERNARD F. DOUCETTE, S.J.</p>
          <p class="m_text"> 10 textos  archivados</p>
          <p class="m_text">Esta  colecci&oacute;n est&aacute; compuesta por los siguientes apartados y subapartados y su  correspondiente lista de archivos:</p>
          <form name="submit_personal" method="post" action="get_personal.php">
            <span class="m_text">I.
            <input type="submit" value="&nbsp;&nbsp;&nbsp;Registros biogr&aacute;ficos" style="font-family:Tahoma;font-size:13px;text-align:left;background-color:F0E8CE;border-style:none;color:D60A0A">
            </span>
            <input type="hidden" name="name" value="BERNARD F. DOUCETTE, S.J.">
            <input type="hidden" name="category" value="REGISTROS BIOGRAFICOS">
            <input type="hidden" name="ef" value="E/F No.: VI DOU S1">
            <input type="hidden" name="database" value="doucette">
            <input type="hidden" name="type" value="biographical_records">
          </form>
          <span class="m_text">II.&nbsp;&nbsp;&nbsp;Obras</span>
          <table>
            <tr>
              <td><form name="submit_writing" method="post" action="get_writing.php">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" value="Publicadas" style="font-family:Tahoma;font-size:13px;background-color:F0E8CE;border-style:none;color:D60A0A">
        <input type="hidden" name="name" value="BERNARD F. DOUCETTE, S.J.">
        <input type="hidden" name="category" value="OBRAS, PUBLICADAS">
        <input type="hidden" name="ef" value="E/F No.: VI DOU S2">
        <input type="hidden" name="database" value="doucette">
        <input type="hidden" name="type" value="writings_published">
              </form></td>
              <td>&nbsp;</td>
            </tr>
          </table>
          <span class="m_text">III.&nbsp;&nbsp;Correspondencia</span><br>
          <table>
            <tr>
              <td><form name="submit_correspondence" method="post" action="get_correspondence_in.php">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" value="Entradas" style="font-family:Tahoma;font-size:13px;background-color:F0E8CE;border-style:none;color:D60A0A">
&nbsp;|
        <input type="hidden" name="name" value="BERNARD F. DOUCETTE, S.J.">
        <input type="hidden" name="category" value="CORRESPONDENCIA, ENTRADAS">
        <input type="hidden" name="ef" value="E/F No.: VI DOU S3.1">
        <input type="hidden" name="database" value="doucette">
        <input type="hidden" name="type" value="correspondence_incoming">
              </form></td>
              <td><form name="submit_correspondence" method="post" action="get_correspondence_out.php">
                  <input type="submit" value="Salidas" style="font-family:Tahoma;font-size:13px;background-color:F0E8CE;border-style:none;color:D60A0A">
                  <input type="hidden" name="name" value="BERNARD F. DOUCETTE, S.J.">
                  <input type="hidden" name="category" value="CORRESPONDENCIA, SALIDAS">
                  <input type="hidden" name="ef" value="E/F No.: VI DOU S3.2">
                  <input type="hidden" name="database" value="doucette">
                  <input type="hidden" name="type" value="correspondence_outgoing">
              </form></td>
            </tr>
          </table>
          <p>&nbsp;</p>
        </tr>
      <tr>
        <td valign="top">        
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
