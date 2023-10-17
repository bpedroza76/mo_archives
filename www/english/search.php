<html>
<head>
<title>Manila Observatory Archives</title>
<link href="../css_archives.css" rel="stylesheet" type="text/css">
</head>

<body class="background">
<table width="743" height="100%" border="0" align="center" cellpadding="0" cellspacing="2" class="table1">
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
    <td height="367" valign="top"><table width="731" border="0" align="center" cellpadding="2" cellspacing="3" class="table2">
      <tr>
        <td height="59" valign="top"><p class="l_text">SEARCH MANILA OBSERVATORY ARCHIVES </p>
         <form action="search_archives.php" method="post">
           <p><img src="../pictures/fading_pictures/archives02.gif" width="242" height="315" align="left">               
             <input class="m_text" name="search_query" type="text" size="50">
           </p>
           <p><input class="m_text" type="reset" name="reset" value="Reset"><input class="m_text" type="submit" name="submit" value="Submit">
           </p>
         </form></td>
      </tr>
      <tr>
        <td height="23" valign="top"></td>
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
