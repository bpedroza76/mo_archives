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
</style></head>

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
        <td height="59" valign="top"><p class="l_text">CONTACTE</p>
          <p class="m_text">You can e-mail us at archives@observatory.ph or just fill the information below.</p>
          <form name="contact_achieves" method="post" action="send_archives.php">
		  <table width="90%"  border="0" cellspacing="1" cellpadding="1" class="m_text">
            <tr>
              <td  valign="top" width="21%">Nombre:</td>
              <td width="79%">
                <input name="sender" type="text" class="m_text" size="40">
              </span></td>
            </tr>
            <tr>
              <td valign="top">Organizacion:</td>
              <td><input name="organization" type="text" class="m_text" size="40"></td>
            </tr>
            <tr>
              <td valign="top">Correo electr&oacute;nico:</td>
              <td><input name="email" type="text" class="m_text" size="40"></td>
            </tr>
            <tr>
              <td valign="top">Numero de Telefono:</td>              
              <td><input name="telephone" type="text" class="m_text" size="40"></td>
            </tr>
            <tr>
              <td valign="top">Fax Number:</td>
              <td><input name="fax" type="text" class="m_text" size="40"></td>
            </tr>
            <tr>
              <td valign="top">Tema:</td>
              <td><input name="subject" type="text" class="m_text" size="40"></td>
            </tr>
            <tr>
              <td valign="top">Mensahe:                </th>
              <td><textarea name="message" cols="50" class="m_text"></textarea></td>
            </tr>
          </table>
		  <p>
		    <input class="m_text" type="reset" name="Reset" value="Reset">
            <input class="m_text" type="submit" name="Submit" value="Submit">
		  </p>
          </form>          
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
