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
        <td height="59" valign="top"><p class="l_text"><img src="../pictures/faura.jpg" width="126" height="190" align="left">FREDERICO P. FAURA, S.J. (1840-1897)</p>
          <p class="m_text"> 12 textos  archivados </p>
          <p class="m_text">Naci&oacute;  en Art&eacute;s (Barcelona), Espa&ntilde;a y entr&oacute; en la Compa&ntilde;&iacute;a de Jes&uacute;s en 1859. Cuando  era un joven jesuita, le enviaron a Manila en 1866. Ejerci&oacute; de profesor de  f&iacute;sica y matem&aacute;ticas en el Ateneo y se encarg&oacute; del Observatorio creado en 1865.  En 1868, realiz&oacute; su primera expedici&oacute;n cient&iacute;fica para observar un eclipse  solar en las islas C&eacute;lebes. En 1871 regres&oacute; a Espa&ntilde;a para completar sus  estudios de teolog&iacute;a y en 1877 visit&oacute; los observatorios del Colegio Romano y  Stonyhurst donde trabaj&oacute; con Secchi y Perry. En 1878 Faura volvi&oacute; a Manila y se  convirti&oacute; de nuevo en el director del Observatorio. Comenz&oacute; sus estudios sobre  los tifones estableciendo algunas hip&oacute;tesis sobre su naturaleza, los fen&oacute;menos  previos y realiz&oacute; las primeras previsiones de estas tormentas en 1879. En 1880  estudi&oacute; los terremotos y el da&ntilde;o que produc&iacute;an. Asimismo renov&oacute; el instrumental  sismol&oacute;gico del Observatorio. Dos a&ntilde;os despu&eacute;s dise&ntilde;&oacute; un bar&oacute;metro para  detectar la existencia de tifones. En 1884 Faura fue nombrado Director del  Servicio Meteorol&oacute;gico Oficial Filipino, creado por el Gobierno Colonial  Espa&ntilde;ol y estableci&oacute; una red de estaciones meteorol&oacute;gicas en el archipi&eacute;lago.  Viaj&oacute; a Barcelona en 1888 para presentar el trabajo realizado en el  observatorio en la Exposici&oacute;n Universal y volvi&oacute; a Manila en 1894.</p>
          <p class="s_text"> (Fuente: Udias, Agustin. (2003). <i>Searching the heavens and the earth: the history of Jesuit Observatories</i>. Dordrecht : Kluwer Academic Press) </p>          
          <p class="m_text">Esta  colecci&oacute;n est&aacute; compuesta por los siguientes apartados y subapartados y su  correspondiente lista de archivos:</p>
          <form name="submit_personal" method="post" action="get_personal.php">
		  <span class="m_text">I.<input type="submit" value="&nbsp;&nbsp;&nbsp;&nbsp;Registros biogr&aacute;ficos" style="font-family:Tahoma;font-size:13px;text-align:left;background-color:F0E8CE;border-style:none;color:D60A0A"></span>
            <input type="hidden" name="name" value="FREDERICO P. FAURA, S.J. (1840-1897)">
			<input type="hidden" name="category" value="REGISTROS BIOGRAFICOS">
			<input type="hidden" name="ef" value="E/F No.: VII FAU S1">
			<input type="hidden" name="database" value="faura">
			<input type="hidden" name="type" value="biographical_records">
          </form>
		    <span class="m_text">II.&nbsp;&nbsp;&nbsp;Correspondencia</span>
			<table>
			<tr>
			<td>
		<form name="submit_correspondence" method="post" action="get_correspondence_in.php">
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Entradas" style="font-family:Tahoma;font-size:13px;background-color:F0E8CE;border-style:none;color:D60A0A">&nbsp;|
                    <input type="hidden" name="name" value="FREDERICO P. FAURA, S.J. (1840-1897)">
                    <input type="hidden" name="category" value="CORRESPONDENCIA, ENTRADAS">
                    <input type="hidden" name="ef" value="E/F No.: VII FAU S2.1">
                    <input type="hidden" name="database" value="faura">
					<input type="hidden" name="type" value="correspondence_incoming">
			</form>
			</td>
			<td>
					<form name="submit_correspondence" method="post" action="get_correspondence_out.php">
				    <input type="submit" value="Salidas" style="font-family:Tahoma;font-size:13px;background-color:F0E8CE;border-style:none;color:D60A0A">
                    <input type="hidden" name="name" value="FREDERICO P. FAURA, S.J. (1840-1897)">
					<input type="hidden" name="category" value="CORRESPONDENCIA, SALIDAS">
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
