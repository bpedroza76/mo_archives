<html>
<head>
<meta name="keywords" content="Manila Observatory Archives Algue Selga El Observatorio de Manila Philippine Maps Documents Old Algue Selga Jesuits">
<link href="../css_archives.css" rel="stylesheet" type="text/css">
<SCRIPT LANGUAGE="JavaScript">
<!-- Original:  CodeLifter.com (support@codelifter.com) -->
<!-- Web Site:  http://www.codelifter.com -->

<!-- This script and many more are available free online at -->
<!-- The JavaScript Source!! http://javascript.internet.com -->

<!-- Begin
// Set slideShowSpeed (milliseconds)
var slideShowSpeed = 5000;
// Duration of crossfade (seconds)
var crossFadeDuration = 3;
// Specify the image files
var Pic = new Array();
// to add more images, just continue
// the pattern, adding to the array below

Pic[0] = '../pictures/fading_pictures/archives01.gif'
Pic[1] = '../pictures/fading_pictures/archives02.gif'
Pic[2] = '../pictures/fading_pictures/archives03.gif'
Pic[3] = '../pictures/fading_pictures/archives04.gif'
Pic[4] = '../pictures/fading_pictures/archives05.gif'
Pic[5] = '../pictures/fading_pictures/archives06.gif'
Pic[5] = '../pictures/fading_pictures/archives07.gif'

// do not edit anything below this line
var t;
var j = 0;
var p = Pic.length;
var preLoad = new Array();
for (i = 0; i < p; i++) {
preLoad[i] = new Image();
preLoad[i].src = Pic[i];
}
function runSlideShow() {
if (document.all) {
document.images.SlideShow.style.filter="blendTrans(duration=2)";
document.images.SlideShow.style.filter="blendTrans(duration=crossFadeDuration)";
document.images.SlideShow.filters.blendTrans.Apply();
}
document.images.SlideShow.src = preLoad[j].src;
if (document.all) {
document.images.SlideShow.filters.blendTrans.Play();
}
j = j + 1;
if (j > (p - 1)) j = 0;
t = setTimeout('runSlideShow()', slideShowSpeed);
}
//  End -->
</script>
</head>

<body class="background" onLoad="runSlideShow()">
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
    <td height="353" valign="top"><table width="731" border="0" align="center" cellpadding="2" cellspacing="3" class="table2">
      <tr>
        <td height="59" valign="top"><span class="m_text"><img src="../pictures/spanish_welcome.gif" width="529" height="35"><br>
            <img src="../pictures/fading_pictures/archives01.gif" name='SlideShow' align="left">Este sitio web sirve como una ayuda para la b&uacute;squeda de la recogida de los Archivo del Observatorio de Manila. B&uacute;squeda a trav&eacute;s de la colecci&oacute;n haciendo clic en los men&uacute;s por encima o utilizar la funci&oacute;n de b&uacute;squeda espec&iacute;fica para su investigaci&oacute;n. </span>
          <p class="m_text">El desarrollo de los archivos y este portal es posible gracias al apoyo financiero de Agencia Espa&ntilde;ola de Cooperaci&oacute;n Internacional para el Desarrollo (AECID) y Cives Mundi.</p>
          <p class="m_text"><img src="../pictures/spanish_news.gif" width="84" height="20" alt="Noticias"></p>
          <p class="m_text"><a href="http://www.civesmundi.es/esp/noticias.php?idnoticias=290" target="_blank">Cives Mundi concluye el proyecto de restauraci&oacute;n y digitalizaci&oacute;n de los   documentos del Archivo de Manila</a></p>
          <p class="m_text">&nbsp;</p>
<p class="m_text">&nbsp;</p>
          </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="right" valign="bottom" class="s_text">
    <!-- Start of StatCounter Code -->Eres el visitante numero:
<script type="text/javascript">
var sc_project=4838347; 
var sc_invisible=0; 
var sc_partition=56; 
var sc_click_stat=1; 
var sc_security="73677392"; 
var sc_text=2; 
</script>

<script type="text/javascript"
src="http://www.statcounter.com/counter/counter.js"></script><noscript><div
class="statcounter"><a title="myspace visitor counter"
href="http://www.statcounter.com/myspace/"
target="_blank"><img class="statcounter"
src="http://c.statcounter.com/4838347/0/73677392/0/"
alt="myspace visitor counter" ></a></div></noscript>
<!-- End of StatCounter Code --> &nbsp;
</td>
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
