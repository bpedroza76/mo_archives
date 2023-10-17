<html>
<head>
<link href="../css_archives.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="lightbox.css" type="text/css">
<script type="text/javascript" src="lightbox.js"></script>
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
    <td height="284" valign="top"><table width="731" height="100%" border="0" align="center" cellpadding="2" cellspacing="3" class="table2">
      <tr>
        <td height="240" valign="top"><p class="l_text">FOTOS Y MAPAS </p>
          <p class="m_text">La colecci&oacute;n de fotograf&iacute;as y mapas ofrece un registro visual de la  investigaci&oacute;n llevada a cabo en el Observatorio de Manila as&iacute; como de la  historia de esta instituci&oacute;n. Las fotos se han clasificado por temas, mientras  que los mapas se han clasificado seg&uacute;n su origen y fecha. Seleccione cualquiera  de los listados que aparecen a continuaci&oacute;n para visualizar los contenidos de  esta colecci&oacute;n. Quedan prohibidas tanto la reproducci&oacute;n total o parcial como la  publicaci&oacute;n de cualquiera de las im&aacute;genes aqu&iacute; expuestas sin previa autorizaci&oacute;n  expresa del Observatorio de Manila.          </p>
          <table>
            <tr>
              <td><form name="submit_writing" method="post" action="spanish_photos.php">
                <input type="submit" value="Fotos" style="font-family:Tahoma;font-size:13px;background-color:F0E8CE;border-style:none;color:D60A0A">
                &nbsp;|
              </form></td>
              <td><form name="submit_writing" method="post" action="spanish_get_maps.php">
                <input type="submit" value="Mapas" style="font-family:Tahoma;font-size:13px;background-color:F0E8CE;border-style:none;color:D60A0A">
                <input type="hidden" name="name" value="MAPS">
                <input type="hidden" name="category" value="MAPS, MONTHLY BULLETINS">
                <input type="hidden" name="ef" value="--">
                <input type="hidden" name="database" value="maps">
                <input type="hidden" name="type" value="maps_mb">
              </form></td>
            </tr>
          </table>
          <p class="m_text">&nbsp;</p></td>
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
