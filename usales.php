<?php
include ('pdoConn.php');
$link = mysql_connect($host,$user,$password);
	if(!$link)
	{
		die('Could not connect'.mysql_error());
		
	}
	$db_selected = mysql_select_db($db,$link);
	
	echo '<center><h1>Update Sales Person<div align="right"><a href="home2.php">Logout</a></div></h1><hr/>';
	echo '<h2>Sales Person List:</h2>';
	$sqlquery = "SELECT * FROM salesperson";
	$query_out = mysql_query($sqlquery);
	echo '<h2><table border="3">';
	echo '<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>E-mail</th><th>Phone</th><th>Commission</th></tr>';
	while($row=mysql_fetch_array($query_out))
	{
	echo '<tr><td>'.$row['id'].'</td><td>'.$row['fname'].'</td><td>'.$row['lname'].'</td><td>'.$row['email'].'</td><td>'.$row['phone'].'</td><td>'.$row['comm'].'</td></tr>';
	}
	echo '</table><hr/>';
//	echo '<input type="submit" value="Submit" name="addsales"><br></form></h2>';
	echo '<h2>Search for salesperson here</h2>';
	echo '<form action="updatesales.php" method="POST">';
	echo '<h3>Enter Sales Person Id:<input type="text" name="sid"></h3>';
	echo '<input type="submit" value="Get Details" name="updatesales">';
	echo '</form></center>';
?>