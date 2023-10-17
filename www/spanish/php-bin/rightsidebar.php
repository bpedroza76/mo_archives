<td class="rightsb">

<!-- Start of Right Sidebar -->

<table width="100%" align="center" border="0" cellspacing="0">
<tr><td class="menuright">Current Projects</td></tr>
<tr><td class="menuright_item"><a class="menuitem2" href="http://www.klima.ph/cd4cdm/"><img src="06_about/01_projects/02_cd4cdm/cd4cdm.png" width="120px" height="72px" alt="CD4CDM"></a></td></tr>
<tr><td class="menuright_item"><a class="menuitem2" href="06_about/01_projects.php#devcap"><img src="06_about/01_projects/01_devcap/devcap.png" width="120px" height="72px" alt="DevCap"></a></td></tr>
<tr><td class="menuright_bottom">&nbsp;</td></tr>
<tr><td class="menuspacer"></td></tr>
<tr><td class="menuright">Climate &amp; Weather</td></tr>
<tr><td class="menuright_item"><a class="menuitem2" href="07_webservices/02_weather/satellite_image.php"><img src="07_webservices/02_weather/latest.jpg" alt="Weather Satellite Imagery" width="120px" height="90px"></a></td></tr> 
<tr><td class="menuright_bottom">&nbsp;</td></tr> <tr><td class="menuspacer"></td></tr>
<tr><td class="menuright">Events</td></tr>  
<?php
	$query = "select A.title as title,
                      date_format(A.start_date,'%M %Y') as pub_date,
                      A.description as description,
                      A.web_url as web_url
                  FROM events A, web_materials B 
                  WHERE A.web_mat_no=B.web_mat_no 
                     and B.cat_code='3' 
                     and A.start_date>date_sub(curdate(), interval '7' day) 
                  order by A.end_date 
                  limit 0,3";
	 //echo $query;
	$result=safe_query($query);
        if (mysql_num_rows($result)==0)
	  {
	    print "<tr><td class=\"menucenter\">";
	    print "There are no climate-related activities scheduled at this time.";
	    print "</td></tr>";
	  }
	else
	  {
	    while ($row = mysql_fetch_array($result))
	      {
		print "<tr><td class=\"menuright_item\">";
		if (!empty($row['web_url']))
		  {
		    print "<a href=\"".$row['web_url']."\">".$row['title']."</a><br>(".$row['pub_date'].")";
		  }
		else
		  {
		    print $row['title']."<br>(".$row['pub_date'].")";
		  }
		print "</td></tr>";
	      }
	  }
?>
<tr><td class="menuright_more"><a href="calendar.php">more >>></a></td></tr>

</table>

<!-- End of Right Sidebar -->

</td>
