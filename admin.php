<?php
include ('pdoConn.php');
$link = mysql_connect($host,$user,$password);
	if(!$link)
	{
		die('Could not connect'.mysql_error());
		
	}
	$db_selected = mysql_select_db($db,$link);
	if(isset($_POST['alogin']))
		{ 	
			$temp1=$_POST['aid'];
			$temp2=$_POST['apswd'];
			$u="admin";
			$p="csci567";
			if($temp1==$u)
			{
				if($temp2==$p)
				{
					echo '<center><h1>Administrator Home Page<div align="right"><a href="home2.php">LogOut</a></div></h1><hr/>';
					echo '<h2><table border="0">';
					echo '<tr><td><a href="asales.php">Add Sales Person</a></td></tr>';
					echo '<tr><td><a href="usales.php">Update Sales Person</a></td></tr>';
					//echo '<tr><td><a href="proc.php">Processing System(Calculate SalesPerson commission)</a></td></tr>';
					echo '</table></h2></center>';
				}
				else
				{
					echo '<center><h2>Validation Failed</h2>';
					echo '<h1><a href="alogin.php">Click here to login again</h1></center>';
				}
			}
				else
				{
					echo '<center><h2>Validation Failed</h2>';
					echo '<h1><a href="alogin.php">Click here to login again</h1></center>';
				}
		}
			
?>