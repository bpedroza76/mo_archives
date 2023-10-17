<script type="text/javascript" language="javascript">

<!--Open new window-->
function owindow($file)
{
   
nwindow=window.open($file,"nwindow","toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=600")
}

function imgwindow($file,$w,$h)
{
  prop="toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width="+$w+",height="+$h;
  nwindow=window.open("","nwindow",prop);  
  shell="<head><title>klima Climate Change Center<\/title><\/head><body marginheight=0 topmargin=0 marginwidth=0 leftmargin=0><img src="+$file+"><\/body><\/html>';
  self.nwindow.document.open();
  self.nwindow.document.write(shell);
  self.nwindow.document.close();
  self.nwindow.focus();
}


<!--End Open new window-->

</script>
