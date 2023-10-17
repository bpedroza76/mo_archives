<?php
// function definitions [some from Greenspan and Bulger book]


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

// int safe_query ([string query])
// This function will execute an SQL query against the currently open
// MySQL database. If the global variable $query_debug is not empty,
// the query will be printed out before execution. If the execution fails,
// the query and any error message from MySQL will be printed out, and
// the function will return FALSE. Otherwise, it returns the MySQL
// result set identifier.
function safe_query ($query = "")
{
	global	$query_debug;

	if (empty($query)) { return FALSE; }

	if (!empty($query_debug)) { print "<pre>$query</pre>\n"; }

	$result = mysql_query($query)
		or die("ack! query failed: "
			."<li>errorno=".mysql_errno()
			."<li>error=".mysql_error()
			."<li>query=".$query
		);
	return $result;
}


// int select_entries ([int offset])
// Select a set of entries from the klima articles. The number of entries selected
// is determined by the value of the global variable limit.  The offset
// argument determines where to start - the default value is zero, meaning
// the first record. Entries are retrieved in descending order of the date
// they were created. Return the mysql data set identifier for the rows
// retrieved.
function select_entries ($offset=0)
{
	global $limit;

	if (empty($offset)) { $offset = 0; }

	$query = "select *
		, date_format(art_date,'%e %M %Y') as art_date
		from article
		where date_format(art_date,'%Y%m%d') > (curdate()-7)
		order by art_date desc
		limit $offset, $limit
	";
	$result = safe_query($query);

	return $result;

}

// int select_entries_where ([string where_clause])
// Select a set of entries from the klima articles. The number of entries selected
// is determined by the value of the global variable limit.  The offset
// argument determines where to start - the default value is zero, meaning
// the first record. Entries are retrieved in descending order of the date
// they were created. Return the mysql data set identifier for the rows
// retrieved.
function select_entries_where ($where_clause,$table)
{
	global $limit;

	$query = "select web_mat_no, cat_code, cc_area_code, cc_subarea_code, location, title,
		ol_source_code, date_format(publish_date,'%e %M %Y') as publish_date,
		description, web_url, pdf_file_name, html_file_name, zip_file_name,
		image_file_name, create_date
		from $table
		$where_clause
		limit $limit
	";
	$result = safe_query($query);

	return $result;

}


// date_drop_down_box(string select_name)
// Create a drop down box for date.  Values are defined in the global variables
// $day_array, $month_array, $year_array.
function date_drop_down_box($select_name,$select_value)
{
	global $day_array;
	global $month_array;
	global $year_array;

	$option_block = "";

	if ($select_name == "month")
		{ $an_array = $month_array; }
	if ($select_name == "day")
		{ $an_array = $day_array; }
	if ($select_name == "year")
		{ $an_array = $year_array; }

	foreach ( $an_array as $key => $value )
		{
		if ($key == $select_value)
			{
			$option_block .= "\t<option value=\"$key\" selected>".$value."</option>\n";
			}
		else
			{
			$option_block .= "\t<option value=\"$key\">".$value."</option>\n";
			}
		}
	echo $option_block;
}

// db_drop_down_box(string table, string lookup_code, string lookup_description, string default_value)
function db_lookup_drop_down_box($table,$code,$descrip,$selected)
{
	// create SQL statement
	$query = "SELECT ".$code.", ".$descrip." FROM ".$table
		." ORDER BY ".$code." ASC";

	// execute SQL query and get result
     	$result = safe_query($query);

	// put data into drop-down list box
	while ($row = mysql_fetch_array($result))
		{
		$value  = $row[$code];
		$label  = $row[$descrip];
		if ($value == $selected)
			{
			$option_block = $option_block."<OPTION value=\"$value\" selected>$label</OPTION>";
			}
		else
			{
			$option_block = $option_block."<OPTION value=\"$value\">$label</OPTION>";
			}
		}
	echo "$option_block";
}

//franz: 12 Jan 2004, added this function for guestlist
function db_lookup_drop_down_box_code($table,$code,$descrip,$selected)
{
	// create SQL statement
	$query = "SELECT ".$code.", ".$descrip." FROM ".$table
		." ORDER BY ".$code." ASC";

	// execute SQL query and get result
     	$result = safe_query($query);

	// put data into drop-down list box
	while ($row = mysql_fetch_array($result))
		{
		$value  = $row[$code];
		$label  = $row[$code]." - ".$row[$descrip];
		if ($value == $selected)
			{
			$option_block = $option_block."<OPTION value=\"$value\" selected>$label</OPTION>";
			}
		else
			{
			$option_block = $option_block."<OPTION value=\"$value\">$label</OPTION>";
			}
		}
	echo "$option_block";
}

function db_lookup_drop_down_box_choose($table,$code,$descrip,$selected,$where)
{
	// create SQL statement
	$query = "SELECT ".$code.", ".$descrip." FROM ".$table
		." WHERE ".$where." ORDER BY ".$code." ASC";

	// execute SQL query and get result
     	$result = safe_query($query);

	// put data into drop-down list box
	while ($row = mysql_fetch_array($result))
		{
		$value  = $row[$code];
		$label  = $row[$descrip];
		if ($value == $selected)
			{
			$option_block = $option_block."<OPTION value=\"$value\" selected>$label</OPTION>";
			}
		else
			{
			$option_block = $option_block."<OPTION value=\"$value\">$label</OPTION>";
			}
		}
	echo "$option_block";
}

// void print_entry (array row [, string preserve] [, string ...])
// Prints out a klima web material entry. The first argument is expected be a row
// from a MySQL result set, but could be any valid array. The second
// argument is passed to cleanup_text() and controls the stripping-out
// of HTML tags.  The names of the fields to be printed are passed
// in as a variable number of arguments following the first two.
function print_entry($row,$preserve="")
{
	global $web_material_number;

	// walk through any arguments passed in after the first two
	$numargs = func_num_args();
	for ($i = 2; $i < $numargs; $i++)
	{
		$field = func_get_arg($i);

		// This will transform a label string to a valid database
		// field name - e.g., "Last Name" becomes "last_name"
		$dbfield = str_replace(" ", "_", strtolower($field));

		$dbvalue = cleanup_text($row[$dbfield],$preserve);
		$name = ucwords($field);
		switch ($field)
			{
			case "title":
				$display_title = $dbvalue;
				//print "<tr><td></td></tr>";
				break;
			case "publish_date":
				$display_pub_date = $dbvalue;
				break;
			case "ol_source_code":
				$display_source = $dbvalue;
				break;
			case "description":
				$display_descrip = $dbvalue;
				break;
			case "web_url":
				$display_web_url = $dbvalue;
				break;
			case "pdf_file_name":
				$display_pdf_file_name = $dbvalue;
				break;
			case "html_file_name":
				$display_html_file_name = $dbvalue;
				break;
			case "zip_file_name":
				$display_zip_file_name = $dbvalue;
				break;
			case "image_file_name":
				$display_image_file_name = $dbvalue;
				break;
			case "web_mat_no":
				$web_mat_no = $dbvalue;
				break;
			}
	}
	print "<tr><td></td></tr>";
	print "<tr><td>";
	print "<A HREF=$display_web_url TARGET=NewWindow>".$display_title."</A>";
	print "</td></tr>";
	print "<tr><td>";
	print "$display_pub_date";
	if (!empty($display_source))
		{
		print " (".$display_source.") ";
		}
	print " - $display_descrip";
	print "</td></tr>";
	print "<tr><td>";
	if (!empty($display_pdf_file_name))
		{
		print "<A HREF=pdf/$display_pdf_file_name TARGET=NewWindow>PDF</A>\n";
		}
	else
		{
		print "PDF\n";
		}
	if (!empty($display_html_file_name))
		{
		print "<A HREF=html/$display_html_file_name TARGET=NewWindow>PDF</A>\n";
		}
	else
		{
		print "HTML\n";
		}
	if (!empty($display_zip_file_name))
		{
		print "<A HREF=zip/$display_zip_file_name TARGET=NewWindow>PDF</A>\n";
		}
	else
		{
		print "ZIP\n";
		}
	if (!empty($display_image_file_name))
		{
		print "<A HREF=images/$display_image_file_name TARGET=NewWindow>IMAGE</A>\n";
		}
	else
		{
		print "IMAGE\n";
		}
	print "</td></tr>";
	print "<tr><td>";
	print "<table>";
	print "<tr><td>";
	print "<FORM method=\"post\" action=\"K001M000update.php\">";
	print "<input type=\"submit\" name=\"maintain_web_mat\" value=\"Edit\">";
	print "<input type=\"hidden\" name=\"wm_no\" value=\"$web_mat_no\">";
	print "</FORM></td><td>";
	include ('jscripts.php');
	print "<FORM method=\"post\" action=\"K001M000delete.php\">";
	print "<input type=\"submit\" name=\"maintain_web_mat\" value=\"Delete\">";
	print "<input type=\"hidden\" name=\"wm_no\" value=\"$web_mat_no\">";
	print "</FORM></td></tr>";
	print "</table>";
	print "</td></tr>";

}

//string construct_where (string)
//Construct where clause for web_materials table
function construct_where($cat_code,$cc_area_code,$cc_subarea_code,$location,$title,
		$ol_source_code,$month,$year,$day,$description,$web_url,
		$pdf_file_name,$html_file_name,$zip_file_name,$image_file_name)
{
	$where_clause = "";
	if (!empty($cat_code))
		{
		if (!empty($where_clause))
			{
			$where_clause = $where_clause." and ";
			}
		$where_clause = $where_clause." cat_code = '".$cat_code."'";
		}
	if (!empty($cc_area_code))
		{
		if (!empty($where_clause))
			{
			$where_clause = $where_clause." and ";
			}
		$where_clause = $where_clause." cc_area_code = '".$cc_area_code."'";
		}
	if (!empty($cc_subarea_code))
		{
		if (!empty($where_clause))
			{
			$where_clause = $where_clause." and ";
			}
		$where_clause = $where_clause." cc_subarea_code = '".$cc_subarea_code."'";
		}
	if (!empty($location))
		{
		if (!empty($where_clause))
			{
			$where_clause = $where_clause." and ";
			}
		$where_clause = $where_clause." location = '".$location."'";
		}
	if (!empty($title))
		{
		if (!empty($where_clause))
			{
			$where_clause = $where_clause." and ";
			}
		$where_clause = $where_clause." title like '%".$title."%'";
		}
//use this while online_source maintenance[select button] is not yet resolved
	if (!empty($ol_source_code))
		{
		if (!empty($where_clause))
			{
			$where_clause = $where_clause." and ";
			}
		$where_clause = $where_clause." ol_source_code like '%".$ol_source_code."%'";
		}

//	if (!empty($ol_source_code))
//		{
//		if (!empty($where_clause))
//			{
//			$where_clause = $where_clause." and ";
//			}
//		$where_clause = $where_clause." ol_source_code = '".$ol_source_code."'";
//		}
	if (!empty($year))
		{
		if (!empty($where_clause))
			{
			$where_clause = $where_clause." and ";
			}
		$where_clause = $where_clause." date_format(publish_date,'%Y') = date_format('".$year."-0-0','%Y')";
		}
	if (!empty($month))
		{
		if (!empty($where_clause))
			{
			$where_clause = $where_clause." and ";
			}
		$where_clause = $where_clause." date_format(publish_date,'%m') = date_format('0000-".$month."-0','%m')";
		}
	if (!empty($day))
		{
		if (!empty($where_clause))
			{
			$where_clause = $where_clause." and ";
			}
		$where_clause = $where_clause." date_format(publish_date,'%d') = date_format('0000-0-".$day."','%d')";
		}
	if (!empty($description))
		{
		if (trim($description) != "")
			{
				if (!empty($where_clause))
					{
						$where_clause = $where_clause." and ";
					}
				$where_clause = $where_clause." description like '%".$description."%'";
			}
		}
	if (!empty($web_url))
		{
		if (!empty($where_clause))
			{
			$where_clause = $where_clause." and ";
			}
		$where_clause = $where_clause." web_url like '%".$web_url."%'";
		}
	if (!empty($pdf_file_name))
		{
		if (!empty($where_clause))
			{
			$where_clause = $where_clause." and ";
			}
		$where_clause = $where_clause." pdf_file_name like '%".$pdf_file_name."%'";
		}
	if (!empty($html_file_name))
		{
		if (!empty($where_clause))
			{
			$where_clause = $where_clause." and ";
			}
		$where_clause = $where_clause." html_file_name like '%".$html_file_name."%'";
		}
	if (!empty($zip_file_name))
		{
		if (!empty($where_clause))
			{
			$where_clause = $where_clause." and ";
			}
		$where_clause = $where_clause." zip_file_name like '%".$zip_file_name."%'";
		}
	if (!empty($image_file_name))
		{
		if (!empty($where_clause))
			{
			$where_clause = $where_clause." and ";
			}
		$where_clause = $where_clause." image_file_name like '%".$image_file_name."%'";
		}

	if (!empty($where_clause))
		{
		$where_clause = "where ".$where_clause." ";
		}
	return $where_clause;
}


//string construct_set (string)
//Construct set clause for web_materials table
function construct_set($cat_code,$cc_area_code,$cc_subarea_code,$location, $title,
		$ol_source_code,$month,$year,$day,$description,$web_url,
		$pdf_file_name,$html_file_name,$zip_file_name,$image_file_name)
{
	$set_clause = "";
	if (!empty($cat_code))
		{
		if (!empty($set_clause))
			{
			$set_clause = $set_clause." , ";
			}
		$set_clause = $set_clause." cat_code = '".$cat_code."'";
		}
	if (!empty($cc_area_code))
		{
		if (!empty($set_clause))
			{
			$set_clause = $set_clause." , ";
			}
		$set_clause = $set_clause." cc_area_code = '".$cc_area_code."'";
		}
	if (!empty($cc_subarea_code))
		{
		if (!empty($set_clause))
			{
			$set_clause = $set_clause." , ";
			}
		$set_clause = $set_clause." cc_subarea_code = '".$cc_subarea_code."'";
		}
	if (!empty($location))
		{
		if (!empty($set_clause))
			{
			$set_clause = $set_clause." , ";
			}
		$set_clause = $set_clause." location = '".$location."'";
		}
	if (!empty($title))
		{
		if (!empty($set_clause))
			{
			$set_clause = $set_clause." , ";
			}
		$set_clause = $set_clause." title ='".$title."'";
		}
//use this while online_source maintenance[select button] is not yet resolved
	if (!empty($ol_source_code))
		{
		if (!empty($set_clause))
			{
			$set_clause = $set_clause." , ";
			}
		$set_clause = $set_clause." ol_source_code = '".$ol_source_code."'";
		}

//	if (!empty($ol_source_code))
//		{
//		if (!empty($set_clause))
//			{
//			$set_clause = $set_clause." , ";
//			}
//		$set_clause = $set_clause." ol_source_code = '".$ol_source_code."'";
//		}

	$publish_date = $year."-".$month."-".$day;
	if (!empty($publish_date))
		{
		if (!empty($set_clause))
			{
			$set_clause = $set_clause." , ";
			}
		$set_clause = $set_clause." publish_date = '".$publish_date."'";
		}
	//if (!empty($description))
	//	{
		if (!empty($set_clause))
			{
			$set_clause = $set_clause." , ";
			}
		$set_clause = $set_clause." description = '".$description."'";
	//	}
	//if (!empty($web_url))
	//	{
		if (!empty($set_clause))
			{
			$set_clause = $set_clause." , ";
			}
		$set_clause = $set_clause." web_url = '".$web_url."'";
	//	}
	if (!empty($pdf_file_name))
		{
		if (!empty($set_clause))
			{
			$set_clause = $set_clause." , ";
			}
		$set_clause = $set_clause." pdf_file_name = '".$pdf_file_name."'";
		}
	if (!empty($html_file_name))
		{
		if (!empty($set_clause))
			{
			$set_clause = $set_clause." , ";
			}
		$set_clause = $set_clause." html_file_name = '".$html_file_name."'";
		}
	if (!empty($zip_file_name))
		{
		if (!empty($set_clause))
			{
			$set_clause = $set_clause." , ";
			}
		$set_clause = $set_clause." zip_file_name = '".$zip_file_name."'";
		}
	if (!empty($image_file_name))
		{
		if (!empty($set_clause))
			{
			$set_clause = $set_clause." , ";
			}
		$set_clause = $set_clause." image_file_name = '".$image_file_name."'";
		}

	if (!empty($set_clause))
		{
		$set_clause = "set ".$set_clause." ";
		}
	return $set_clause;
}


//Copy file to server
//void copy_file_to_server (string)
function copy_file_to_server( $user_file, $tmp_file_name, $dest_dir, $dest_file)
{

if (is_uploaded_file ($tmp_file_name))
	{
	copy($tmp_file_name,$dest_dir.$dest_file);
	echo "<b>$user_file</b> copied successfully!!";
	}
else
	{
	echo "<b>$user_file</b> cannot be copied!!!";
	}
}

//Check file dependency
//int check_file_dep (string)
function check_file_dep($table, $db_field, $file_name, $web_mat_no)
{
if (!empty($file_name))
	{
	$query = "select * from ".$table
					." where ".$db_field." = \"".$file_name."\""
					." and web_mat_no <> ".$web_mat_no;
	$query_result=safe_query($query);
	$result=mysql_num_rows($query_result);
	}
else
	{
	$result = 1;
	}
return $result;
}

//Move file to trash directory
//void move_file_to_trash (string)
function move_file_to_trash ($orig_file_name, $dest_dir, $dest_file)
{
copy($orig_file_name,$dest_dir.$dest_file);
unlink($orig_file_name);
}

function construct_where_product($product_name,$cat_code,$cc_area_code,
				$cc_subarea_code,$location,
				$author,$edition,$publisher,
				$year,$month,$day,
				$copyright,$diameter,$pheight,$pwidth,
				$pages,$weight,$planguage,$format,
				$isbn,$web_url,$short_desc,$long_desc,
				$price,$availability,$pdf_file_name,
				$html_file_name,$zip_file_name,$image_file_name)
{
	//$where_clause = "";
	if (!empty($product_name))
		{
		if (!empty($where_clause))
			{
			$where_clause = $where_clause." and ";
			}
		$where_clause = $where_clause." product_name like '%".$product_name."%'";
		}
	if (!empty($cat_code))
		{
		if (!empty($where_clause))
			{
			$where_clause = $where_clause." and ";
			}
		$where_clause = $where_clause." cat_code = '".$cat_code."'";
		}
	if (!empty($cc_area_code))
		{
		if (!empty($where_clause))
			{
			$where_clause = $where_clause." and ";
			}
		$where_clause = $where_clause." cc_area_code = '".$cc_area_code."'";
		}
	if (!empty($cc_subarea_code))
		{
		if (!empty($where_clause))
			{
			$where_clause = $where_clause." and ";
			}
		$where_clause = $where_clause." cc_subarea_code = '".$cc_subarea_code."'";
		}
	if (!empty($location))
		{
		if (!empty($where_clause))
			{
			$where_clause = $where_clause." and ";
			}
		$where_clause = $where_clause." location = '".$location."'";
		}
	if (!empty($author))
		{
		if (!empty($where_clause))
			{
			$where_clause = $where_clause." and ";
			}
		$where_clause = $where_clause." author like '%".$author."%'";
		}
	if (!empty($edition))
		{
		if (!empty($where_clause))
			{
			$where_clause = $where_clause." and ";
			}
		$where_clause = $where_clause." edition like '%".$edition."%'";
		}
	if (!empty($publisher))
		{
		if (!empty($where_clause))
			{
			$where_clause = $where_clause." and ";
			}
		$where_clause = $where_clause." publisher like '%".$publisher."%'";
		}

	if (!empty($year))
		{
		if (!empty($where_clause))
			{
			$where_clause = $where_clause." and ";
			}
		$where_clause = $where_clause." date_format(publish_date,'%Y') = date_format('".$year."-0-0','%Y')";
		}
	if (!empty($month))
		{
		if (!empty($where_clause))
			{
			$where_clause = $where_clause." and ";
			}
		$where_clause = $where_clause." date_format(publish_date,'%m') = date_format('0000-".$month."-0','%m')";
		}
	if (!empty($day))
		{
		if (!empty($where_clause))
			{
			$where_clause = $where_clause." and ";
			}
		$where_clause = $where_clause." date_format(publish_date,'%d') = date_format('0000-0-".$day."','%d')";
		}

	if (!empty($copyright))
		{
		if (!empty($where_clause))
			{
			$where_clause = $where_clause." and ";
			}
		$where_clause = $where_clause." copyright like '%".$copyright."%'";
		}
	if (!empty($diameter))
		{
		if (!empty($where_clause))
			{
			$where_clause = $where_clause." and ";
			}
		$where_clause = $where_clause." diameter like '%".$diameter."%'";
		}
	if (!empty($pheight))
		{
		if (!empty($where_clause))
			{
			$where_clause = $where_clause." and ";
			}
		$where_clause = $where_clause." pheight like '%".$pheight."%'";
		}
	if (!empty($pwidth))
		{
		if (!empty($where_clause))
			{
			$where_clause = $where_clause." and ";
			}
		$where_clause = $where_clause." pwidth like '%".$pwidth."%'";
		}
	if (!empty($pages))
		{
		if (!empty($where_clause))
			{
			$where_clause = $where_clause." and ";
			}
		$where_clause = $where_clause." pages like '%".$pages."%'";
		}
	if (!empty($weight))
		{
		if (!empty($where_clause))
			{
			$where_clause = $where_clause." and ";
			}
		$where_clause = $where_clause." weight like '%".$weight."%'";
		}
	if (!empty($planguage))
		{
		if (!empty($where_clause))
			{
			$where_clause = $where_clause." and ";
			}
		$where_clause = $where_clause." planguage = '".$planguage."'";
		}
	if (!empty($format))
		{
		if (!empty($where_clause))
			{
			$where_clause = $where_clause." and ";
			}
		$where_clause = $where_clause." format = '".$format."'";
		}
	if (!empty($isbn))
		{
		if (!empty($where_clause))
			{
			$where_clause = $where_clause." and ";
			}
		$where_clause = $where_clause." isbn like '%".$isbn."%'";
		}
	if (!empty($web_url))
		{
		if (!empty($where_clause))
			{
			$where_clause = $where_clause." and ";
			}
		$where_clause = $where_clause." web_url like '%".$web_url."%'";
		}
	if (!empty($short_desc))
		{
		if (trim($short_desc) != "")
			{
				if (!empty($where_clause))
					{
						$where_clause = $where_clause." and ";
					}
				$where_clause = $where_clause." short_desc like '%".$short_desc."%'";
			}
		}
	if (!empty($long_desc))
		{
		if (trim($long_desc) != "")
			{
				if (!empty($where_clause))
					{
						$where_clause = $where_clause." and ";
					}
				$where_clause = $where_clause." long_desc like '%".$long_desc."%'";
			}
		}
	if (!empty($price))
		{
		if (!empty($where_clause))
			{
			$where_clause = $where_clause." and ";
			}
		$where_clause = $where_clause." price like '%".$price."%'";
		}
	if (!empty($availability))
		{
		if (!empty($where_clause))
			{
			$where_clause = $where_clause." and ";
			}
		$where_clause = $where_clause." availability = '".$availability."'";
		}

	if (!empty($pdf_file_name))
		{
		if (!empty($where_clause))
			{
			$where_clause = $where_clause." and ";
			}
		$where_clause = $where_clause." pdf_file_name like '%".$pdf_file_name."%'";
		}
	if (!empty($html_file_name))
		{
		if (!empty($where_clause))
			{
			$where_clause = $where_clause." and ";
			}
		$where_clause = $where_clause." html_file_name like '%".$html_file_name."%'";
		}
	if (!empty($zip_file_name))
		{
		if (!empty($where_clause))
			{
			$where_clause = $where_clause." and ";
			}
		$where_clause = $where_clause." zip_file_name like '%".$zip_file_name."%'";
		}
	if (!empty($image_file_name))
		{
		if (!empty($where_clause))
			{
			$where_clause = $where_clause." and ";
			}
		$where_clause = $where_clause." image_file_name like '%".$image_file_name."%'";
		}

	if (!empty($where_clause))
		{
		$where_clause = "and ".$where_clause." ";
		}
	return $where_clause;
}

function construct_set_product($product_name,
				$author,$edition,$publisher,
				$year,$month,$day,
				$copyright,$diameter,$pheight,$pwidth,
				$pages,$weight,$planguage,$format,
				$isbn,$short_desc,$long_desc,
				$price,$availability)
{
	$set_clause = "";
	if (!empty($product_name))
		{
		if (!empty($set_clause))
			{
			$set_clause = $set_clause." , ";
			}
		$set_clause = $set_clause." product_name = '".$product_name."'";
		}
	if (!empty($author))
		{
		if (!empty($set_clause))
			{
			$set_clause = $set_clause." , ";
			}
		$set_clause = $set_clause." author = '".$author."'";
		}
	if (!empty($edition))
		{
		if (!empty($set_clause))
			{
			$set_clause = $set_clause." , ";
			}
		$set_clause = $set_clause." edition = '".$edition."'";
		}
	if (!empty($publisher))
		{
		if (!empty($set_clause))
			{
			$set_clause = $set_clause." , ";
			}
		$set_clause = $set_clause." publisher = '".$publisher."'";
		}
	$publish_date = $year."-".$month."-".$day;
	if (!empty($publish_date))
		{
		if (!empty($set_clause))
			{
			$set_clause = $set_clause." , ";
			}
		$set_clause = $set_clause." publish_date = '".$publish_date."'";
		}

	if (!empty($copyright))
		{
		if (!empty($set_clause))
			{
			$set_clause = $set_clause." , ";
			}
		$set_clause = $set_clause." copyright = '".$copyright."'";
		}
	if (!empty($diameter))
		{
		if (!empty($set_clause))
			{
			$set_clause = $set_clause." , ";
			}
		$set_clause = $set_clause." diameter = '".$diameter."'";
		}
	if (!empty($pheight))
		{
		if (!empty($set_clause))
			{
			$set_clause = $set_clause." , ";
			}
		$set_clause = $set_clause." pheight = '".$pheight."'";
		}
	if (!empty($pwidth))
		{
		if (!empty($set_clause))
			{
			$set_clause = $set_clause." , ";
			}
		$set_clause = $set_clause." pwidth = '".$pwidth."'";
		}
	if (!empty($pages))
		{
		if (!empty($set_clause))
			{
			$set_clause = $set_clause." , ";
			}
		$set_clause = $set_clause." pages = '".$pages."'";
		}
	if (!empty($weight))
		{
		if (!empty($set_clause))
			{
			$set_clause = $set_clause." , ";
			}
		$set_clause = $set_clause." weight = '".$weight."'";
		}
	if (!empty($planguage))
		{
		if (!empty($set_clause))
			{
			$set_clause = $set_clause." , ";
			}
		$set_clause = $set_clause." planguage = '".$planguage."'";
		}
	if (!empty($format))
		{
		if (!empty($set_clause))
			{
			$set_clause = $set_clause." , ";
			}
		$set_clause = $set_clause." format = '".$format."'";
		}
	if (!empty($isbn))
		{
		if (!empty($set_clause))
			{
			$set_clause = $set_clause." , ";
			}
		$set_clause = $set_clause." isbn = '".$isbn."'";
		}
	if (!empty($short_desc))
		{
		if (trim($short_desc) != "")
			{
				if (!empty($set_clause))
					{
						$set_clause = $set_clause." , ";
					}
				$set_clause = $set_clause." short_desc = '".$short_desc."'";
			}
		}
	if (!empty($long_desc))
		{
		if (trim($long_desc) != "")
			{
				if (!empty($set_clause))
					{
						$set_clause = $set_clause." , ";
					}
				$set_clause = $set_clause." long_desc = '".$long_desc."'";
			}
		}
	if (!empty($price))
		{
		if (!empty($set_clause))
			{
			$set_clause = $set_clause." , ";
			}
		$set_clause = $set_clause." price = '".$price."'";
		}
	if (!empty($availability))
		{
		if (!empty($set_clause))
			{
			$set_clause = $set_clause." , ";
			}
		$set_clause = $set_clause." availability = '".$availability."'";
		}
	if (!empty($set_clause))
		{
		$set_clause = "set ".$set_clause." ";
		}
	return $set_clause;
}

//Franz: added 19 December 2003 for Guestlist
function print_form_header($title, $method, $action)
{
  print "<b>".$title."</b>";
  print "<form method=\"".$method."\" action=\"".$action."\">";
}

function print_form_button($type, $name, $value, $src)
{
  print "<input type=\"".$type."\" name=\"".$name."\" value=\"".$value."\" ";
  if (!empty($src))
    {
      print "src=\"".$src."\"";
    }
  print ">";
}

function print_form_footer()
{
  print "</form>";
}

?>
