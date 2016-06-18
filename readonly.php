<?php
$link = mysql_connect('blitz.cs.niu.edu:3306', 'student', 'student');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
$db = "csci467";
$db_selected = mysql_select_db($db,$link);
$query = "SELECT * FROM customers";
$query_out = mysql_query($query) or die ("Search query #1 failed" .mysql_error());
$count = mysql_num_rows($query_out);
		if ($count == 0)
		{
			
			$out =  "No Books published by the selected Publisher";
		}
		else
		{
			while($row = mysql_fetch_array($query_out))
			{ 	
				echo "The Customer is ".$row['name']."<br/>";
			}
		}

echo 'Connected successfully';
mysql_close($link);
?>