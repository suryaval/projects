<?php
include ('pdoConn.php');
$link = mysql_connect($host,$user,$password);
	if(!$link)
	{
		die('Could not connect'.mysql_error());
		
	}
	$db_selected = mysql_select_db($db,$link);
	
	echo '<center><h1>Calculate Commission for Sales Person<div align="right"><a href="home2.php">Logout</a></div></h1><hr/>';
	echo '<h2><table border="3">';
	echo '<form action="proc.php" method="POST">';
	$query99="select * from quotes where po=0 and qstatus=3";
	$query_out2=mysql_query($query99);
	echo '<tr><th>Quote ID</th><th>Purchase Order+Confirmation Number</th></tr>';
	while($row2 = mysql_fetch_array($query_out2))
	{
	$temp=$row2['qid'];
	echo '<tr><td>'.$row2['qid'].'</td><td><a href="commission.php?quote='.$temp.'">Click Here</a></td></tr>';
	}
	echo '</table>';
	//echo '<input type="submit" value="Submit" name="addsales"><br></form></h2>';
	
	if(isset($_POST['addsales']))
		{
			include 'pdoConn.php';
			$link = mysql_connect($host,$user,$password);
			if(!$link)
			{
				die('Could not connect'.mysql_error());	
			}
			$db_selected = mysql_select_db($db,$link);
			$var1=$_POST['first'];
			$var2=$_POST['last'];
			$var3=$_POST['mail'];
			$var4=$_POST['mobile'];
			$var5=$_POST['password'];
			$query2 = "insert into salesperson(fname,lname,email,phone,password) values('$var1','$var2','$var3',$var4,'$var5')";
			mysql_query($query2) or die(mysql_error());
			if(empty(mysql_error()))
			{
				echo '<script language = "javascript">';
				echo 'alert("Quote Successfully Saved")';
				echo '</script>';
			}
		}

?>