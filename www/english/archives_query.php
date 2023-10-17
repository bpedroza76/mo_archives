<?php
include ('php-bin/functions.php');

$search_query=cleanup_text($HTTP_POST_VARS['search_query']);

@mysql_connect("mysqldb", "cives", "mundi") or die ("Can't connect!");
mysql_select_db("test") or die("Can't select database!");

//$query="SELECT * FROM archives_test ORDER BY title";
$query="SELECT * FROM archives_test WHERE title LIKE '%$search_query%' OR creator1 LIKE '%$search_query%' ORDER BY title";
//WHERE title LIKE '%klima%' finds all book titles with the word 'klima' anywhere in the book title
//echo "$query.<br>";

$result=safe_query($query);
echo "You search <b>$search_query</b>.<br><br>";

$number=mysql_num_rows($result);
if ($number==0)
{
echo "Sorry, Archives couldn't find anything that matches your query <b>($search_query)</b>";
exit;
}

if ($number==1)
{
echo "Archives found <b>1</b> match!<br><br>";
}
else {
echo "I've found <b>$number</b> matches! <br><br>";
}

while ($row= mysql_fetch_array($result))
{
$ref_code= $row["ref_code"];
$title= $row['title'];
$creator1= $row['creator1'];
$creator2= $row['creator2'];
$creator3= $row['creator3'];
$periodical_title= $row['periodical_title'];
$periodical_number= $row['periodical_number'];
$publication_place= $row['publication_place'];
$publisher_name= $row['publisher_name'];
$date= $row['date'];
$material_type= $row['material_type'];
$physical_description= $row['physical_description'];
$isbn_issn= $row['isbn_issn'];
$notes= $row['notes'];
$accession_number= $row['accession_number'];

echo "Reference Code: $ref_code<br>";
echo "Title: $title<br>";
echo "Author/s: $creator1<br>";
echo "Periodical Title: $periodical_title<br>";
echo "Periodical Number: $periodical_number<br>";
echo "Place of Publication: $publication_place<br>";
echo "Name of Publisher: $publisher_name<br>";
echo "Date Published: $date<br>";
echo "Type of Material: $material_type<br>";
echo "Physical Description: $physical_description<br>";
echo "ISBN/ISSN: $isbn_issn<br>";
echo "Notes: $notes<br>";
echo "Accession Number: $accession_number<br><br>";
}

?>