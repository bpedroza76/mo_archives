<html>
<head>
<title>Send Archives</title>

</head>

<body>

<?php
//insert this code in action page. named *.php

include ('php-bin/functions.php');

$sender = cleanup_text($HTTP_POST_VARS['sender']);
$organization = cleanup_text($HTTP_POST_VARS['organization']);
$email = cleanup_text($HTTP_POST_VARS['email']);
$telephone = cleanup_text($HTTP_POST_VARS['telephone']);
$fax = cleanup_text($HTTP_POST_VARS['fax']);
$subject = cleanup_text($HTTP_POST_VARS['subject']);
$message = cleanup_text($HTTP_POST_VARS['message'])
           ."\n\n"
           ."\nName : ".$sender
           ."\nOrganization : ".$organization
           ."\nE-mail : ".$email
		   ."\nTel : ".$tel 
           ."\nFax : ".$fax;		   
$recipient_name = "cd4cdm@observatory.ph";

echo "<br />".$sender_name;
echo "<br />".$email_ad;
echo "<br />".$tel;
echo "<br />".$fax;


if ( (!empty($sender)) || (!empty($message)) )
     {
if (mail($recipient_name, $subject, $message))
	{
	print "<h4>Thank you, $sender!</h4>";
	}
	}
else
	{
	print "Sorry, feedback submission failed.  Kindly send your feedback to the ";
	print "<a href=\"mailto:cd4cdm@observatory.ph\">webmaster</a>.";
   	}
    
?>
</body>
</html>