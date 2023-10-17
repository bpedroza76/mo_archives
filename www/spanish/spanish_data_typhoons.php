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
        <td height="59" valign="top"><p class="l_text">TIFONES</p>
          <p class="m_text"> 
            35 


expedientes textuales</p>
		   <form name="submit_writing" method="post" action="get_writing.php">
          <p class="m_text"> <span class="m_text">I. </span>&nbsp;&nbsp;&nbsp;
           			<input type="submit" value="Informes y Observaciones" style="font-family:Tahoma;font-size:13px;text-align:left;background-color:F0E8CE;border-style:none;color:D60A0A">
                    <input type="hidden" name="name" value="TIFONES">
                    <input type="hidden" name="category" value="INFORMES Y OBSERVACIONES">
                    <input type="hidden" name="ef" value="E/F No.: XXXIV TYP S1">
                    <input type="hidden" name="database" value="data_records">
					<input type="hidden" name="type" value="typhoons_reports">
			</form>
			<p><span class="m_text">II.&nbsp;&nbsp;&nbsp;&nbsp;Correspondencia</span>
			<table>
               <tr>
                 <td><form name="submit_correspondence" method="post" action="get_correspondence_in.php">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" value="Entradas" style="font-family:Tahoma;font-size:13px;background-color:F0E8CE;border-style:none;color:D60A0A">&nbsp;|
        <input type="hidden" name="name" value="TIFONES">
        <input type="hidden" name="category" value="CORRESPONDENCIA, ENTRADAS">
        <input type="hidden" name="ef" value="E/F No.: XXXIV TYP S2.1">
        <input type="hidden" name="database" value="data_records">
		<input type="hidden" name="type" value="typhoons_in">
                 </form></td>
                 <td><form name="submit_correspondence" method="post" action="get_correspondence_out.php">
                     <input type="submit" value="Salidas" style="font-family:Tahoma;font-size:13px;background-color:F0E8CE;border-style:none;color:D60A0A">
                     <input type="hidden" name="name" value="TIFONES">
                     <input type="hidden" name="category" value="CORRESPONDENCIA, SALIDAS">
                     <input type="hidden" name="ef" value="E/F No.: XXXIV TYP S2.2">
                     <input type="hidden" name="database" value="data_records">
					 <input type="hidden" name="type" value="typhoons_out">
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
