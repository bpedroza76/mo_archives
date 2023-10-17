<?php
/*
********************************************************
*** This script from MySQL/PHP Database Applications ***
***         by Jay Greenspan and Brad Bulger         ***
***                                                  ***
***   You are free to resuse the material in this    ***
***   script in any manner you see fit. There is     ***
***   no need to ask for permission or provide       ***
***   credit.                                        ***
********************************************************
*/

// void authenticate ([string realm] [, string error message]])

// Send a WWW-Authenticate header, to perform HTTP authentication.
// The first argument is the text that will appear in the pop-up
// form presented to the user. The second argument is the text
// that will appear on the 401 error page if the user hits the
// 'Cancel' button in the pop-up form.

// This code only works if PHP is running as an Apache module.

function authenticate ($realm="Secure Area"
	,$errmsg="Please enter a username and password"
)
{
	Header("WWW-Authenticate: Basic realm=\"$realm\"");
	Header("HTTP/1.0 401 Unauthorized");
	die($errmsg);
}


// void db_authenticate([string table [, string realm [, string error message [, string username field name [, string password field name]]]])

// Uses HTTP authentication to get a user name and password, and then
// verifies that against a database table. The first argument is the
// name of the table to use - the default is mysql.users.  The second
// and third arguments are passed in to the authenticate() function.
// The fourth and fifth arguments are the names of the fields in the
// database table - default values are 'username' and 'password'.

// This code only works if PHP is running as an Apache module.

function db_authenticate($table="mysql.users",$realm="Secure Area"
	,$errmsg="Please enter a username and password"
	,$user_field=""
	,$password_field=""
)
{
	global $PHP_AUTH_USER;
	global $PHP_AUTH_PW;

	if (empty($PHP_AUTH_USER))
	{
		authenticate($realm,$errmsg.": header");
	}
	else
	{
		if (empty($user_field)) { $user_field = "username"; }
		if (empty($password_field)) { $password_field = "password"; }

		$query = "select $user_field from $table 
			where $password_field = password(lower('$PHP_AUTH_PW')) 
			and $user_field = lower('$PHP_AUTH_USER')
		";
		$result = safe_query($query);
		if ($result) { list($valid_user) = mysql_fetch_row($result); }
		if (!$result || empty($valid_user))
		{ 
			authenticate($realm,$errmsg.": query");
		}
	}
	#print "<h5>Editing as $PHP_AUTH_USER</h5>\n";
}

// string cleanup_text ([string value [, string preserve [, string allowed_tags]]])

// This function uses the PHP function htmlspecialchars() to convert
// special HTML characters in the first argument (&,",',<, and >) to their 
// equivalent HTML entities. If the optional second argument is empty,
// any HTML tags in the first argument will be removed. The optional
// third argument lets you specify specific tags to be spared from
// this cleansing. The format for the argument is "<tag1><tag2>".

function cleanup_text ($value = "", $preserve="", $allowed_tags="")
{
	if (empty($preserve)) 
	{ 
		$value = strip_tags($value, $allowed_tags);
	}
	$value = htmlspecialchars($value);
	return $value;
}

// string get_attlist ([array attributes [,array default attributes]])

// This function will take an associative array and format as a string
// that looks like 'name1="value1" name2="value2"', as is used by HTML tags.
// Values for keys in the first argument will override values for the
// same keys in the second argument. (For example, if $atts is (color=>red)
// and $defaults is (color=>black, size=3), the resulting output will
// be 'color="red" size="3"'.)
 
function get_attlist ($atts="",$defaults="")
{
	$localatts = array();
	$attlist = "";

	if (is_array($defaults)) { $localatts = $defaults; }
	if (is_array($atts)) { $localatts = array_merge($localatts, $atts); }

	while (list($guest_name,$value) = each($localatts))
	{
		if ($value == "") { $attlist .= "$guest_name "; }
		else { $attlist .= "$guest_name=\"$value\" "; }
	}
	return $attlist;
}

// string make_page_title ([string title])

// This function will clean up a string to make it suitable for use
// as the value of an HTML <TITLE> tag, removing any HTML tags and
// replacing any HTML entities with their literal character equivalents.

function make_page_title ($title="")
{
	$title = cleanup_text($title);
	$trans = array_flip(get_html_translation_table(HTML_ENTITIES));
	$title = strtr($title, $trans); 
	return $title;
}

// string money ([mixed value])

// This function will format the first argument as a standard US dollars
// value, rounding any decimal value two decimal places for cents 
// and prepending a dollar sign to the returned string.

function money($val=0)
{
	return "$".number_format($val,2);
}

// array states(void)

// This function will return an associative array of US states,
// with the two-letter abbreviation as the key and the full name
// as the value.

function states()
{
	$states['AL'] = "Alabama";
	$states['AK'] = "Alaska";
	$states['AS'] = "American Samoa";
	$states['AZ'] = "Arizona";
	$states['AR'] = "Arkansas";
	$states['CA'] = "California";
	$states['CO'] = "Colorado";
	$states['CT'] = "Connecticut";
	$states['DE'] = "Delaware";
	$states['DC'] = "District Of Columbia";
	$states['FM'] = "Federated States Of Micronesia";
	$states['FL'] = "Florida";
	$states['GA'] = "Georgia";
	$states['GU'] = "Guam";
	$states['HI'] = "Hawaii";
	$states['ID'] = "Idaho";
	$states['IL'] = "Illinois";
	$states['IN'] = "Indiana";
	$states['IA'] = "Iowa";
	$states['KS'] = "Kansas";
	$states['KY'] = "Kentucky";
	$states['LA'] = "Louisiana";
	$states['ME'] = "Maine";
	$states['MH'] = "Marshall Islands";
	$states['MD'] = "Maryland";
	$states['MA'] = "Massachusetts";
	$states['MI'] = "Michigan";
	$states['MN'] = "Minnesota";
	$states['MS'] = "Mississippi";
	$states['MO'] = "Missouri";
	$states['MT'] = "Montana";
	$states['NE'] = "Nebraska";
	$states['NV'] = "Nevada";
	$states['NH'] = "New Hampshire";
	$states['NJ'] = "New Jersey";
	$states['NM'] = "New Mexico";
	$states['NY'] = "New York";
	$states['NC'] = "North Carolina";
	$states['ND'] = "North Dakota";
	$states['MP'] = "Northern Mariana Islands";
	$states['OH'] = "Ohio";
	$states['OK'] = "Oklahoma";
	$states['OR'] = "Oregon";
	$states['PW'] = "Palau";
	$states['PA'] = "Pennsylvania";
	$states['PR'] = "Puerto Rico";
	$states['RI'] = "Rhode Island";
	$states['SC'] = "South Carolina";
	$states['SD'] = "South Dakota";
	$states['TN'] = "Tennessee";
	$states['TX'] = "Texas";
	$states['UT'] = "Utah";
	$states['VT'] = "Vermont";
	$states['VI'] = "Virgin Islands";
	$states['VA'] = "Virginia";
	$states['WA'] = "Washington";
	$states['WV'] = "West Virginia";
	$states['WI'] = "Wisconsin";
	$states['WY'] = "Wyoming";
	$states['AE'] = "Armed Forces Africa";
	$states['AA'] = "Armed Forces Americas";
	$states['AE'] = "Armed Forces Canada";
	$states['AE'] = "Armed Forces Europe";
	$states['AE'] = "Armed Forces Middle East";
	$states['AP'] = "Armed Forces Pacific";

	return $states;
}

// string get_local_ref ([string ref])

// This function will transform a local reference (such as "edit.php")
// to a local reference that begins with the root of the current
// script as defined by the Apache variable SCRIPT_NAME (such as
// "/book/guestbook/view.php"). It is used by the secure_url()
// and regular_url() functions to create an absolute URL out of
// a local reference.

// This behavior of this function if run under a server other than Apache
// is not known. It's likely to work, though, as SCRIPT_NAME is part of
// the CGI 1.1 specification.

function get_local_ref($ref="")
{
	global $SCRIPT_NAME;

	if (substr($ref,0,1) != "/")
	{
		$ref = substr($SCRIPT_NAME,0,strrpos($SCRIPT_NAME,"/")+1).$ref;
	}
	return $ref;
}

// string secure_url ([string ref])

// This function will transform a local URL into an absolute URL pointing
// to a secure server running on the same domain, as defined by the global
// Apache variable HTTP_HOST. (Note: the server we are using runs on 
// non-standard ports, thus the need to change the port numbers.)

function secure_url($ref="")
{
	global $HTTP_HOST;

	$url = "https://".$HTTP_HOST.get_local_ref($ref);
	$url = str_replace("8080","444",$url);
	return $url;
}

// string regular_url ([string ref])

// This function will transform a local URL into an absolute URL pointing
// to a normal server running on the same domain, as defined by the global
// Apache variable HTTP_HOST. (Note: the server we are using runs on 
// non-standard ports, thus the need to change the port numbers.)

function regular_url($ref="")
{
	global $HTTP_HOST;

	$url = "http://".$HTTP_HOST.get_local_ref($ref);
	$url = str_replace("444","8080",$url);
	return $url;
}


include ('/var/www/html/klima/php-bin/functions/db.php');
	include ('/var/www/html/klima/php-bin/functions/html.php');
	include ('/var/www/html/klima/php-bin/functions/forms.php');
	include ('/var/www/html/klima/php-bin/functions/tables.php');




?>

