<html>
<head>
<title>::::: klima climate change center :::::</title>

</head>

<body>

<?php
//insert this code in action page. named *.php

include ('php-bin/functions.php');

$copies = cleanup_text($HTTP_POST_VARS['copies']);
$name = cleanup_text($HTTP_POST_VARS['name']);
$org = cleanup_text($HTTP_POST_VARS['org']);
$email = cleanup_text($HTTP_POST_VARS['email']);
$phone = cleanup_text($HTTP_POST_VARS['phone']);
$fax = cleanup_text($HTTP_POST_VARS['fax']);
$subject = "Order:Publications - Disturbing Climate";
$address = cleanup_text($HTTP_POST_VARS['address']);
           ."\n\n"
		   ."\nCopies : ".$copies
           ."\nName : ".$name
           ."\nOrg : ".$org
		   ."\nEmail : ".$email 
           ."\nPhone : ".$phone;		
		   ."\nFax : ".$fax;		
		   ."\nAddress : ".$address;		   
$recipient_name = "klima@observatory.ph";

echo "<br />".$copies;
echo "<br />".$name;
echo "<br />".$org;
echo "<br />".$phone;
echo "<br />".$fax;
echo "<br />".$address;



if ( (!empty($name)) || (!empty($address)) )
     {
if (mail($recipient_name, $subject, $address))
	{
	print "<h4>Thank you, $sender_name! We are processing your request.</h4>";
	}
	}
else
	{
	print "Sorry, feedback submission failed.  Kindly send your feedback to the ";
	print "<a href=\"mailto:klima@observatory.ph\">webmaster</a>.";
   	}
    
?>
</body>
</html>