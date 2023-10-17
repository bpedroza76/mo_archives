<!-- Initialize web materials variables -->

<?php

	$temp = "";
	$web_mat_no = cleanup_text($HTTP_POST_VARS['web_mat_no']);
	if (empty($web_mat_no))
		{ $web_mat_no = 0;}
	$cat_code = cleanup_text($HTTP_POST_VARS['cat_code']);
	$cc_area_code = cleanup_text($HTTP_POST_VARS['cc_area_code']);
	$cc_subarea_code = cleanup_text($HTTP_POST_VARS['cc_subarea_code']);
	$location = cleanup_text($HTTP_POST_VARS['location']);
	$title = $HTTP_POST_VARS['title'];
	$ol_source_code = cleanup_text($HTTP_POST_VARS['ol_source_code']);
	$description = $HTTP_POST_VARS['description'];

	$publish_date = "";
	$year = cleanup_text($HTTP_POST_VARS['year']);
	$month = cleanup_text($HTTP_POST_VARS['month']);
	$day = cleanup_text($HTTP_POST_VARS['day']);

	if ( (!empty($year)) && (!empty($month)) && (!empty($day)) )
		{
		$publish_date = $year."-".$month."-".$day;
		}
	else
		{
		$publish_date = "";
		}

?>