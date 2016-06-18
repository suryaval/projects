<?php
include ('pdoConn.php');
$link = mysql_connect($host,$user,$password);
	if(!$link)
	{
		die('Could not connect'.mysql_error());
		
	}
	$db_selected = mysql_select_db($db,$link);
	
	echo '<center><h1>Add Sales Person<div align="right"><a href="home2.php">Logout</a></div></h1><hr/>';
	echo '<h2><table border="0">';
	echo '<form action="asales.php" method="POST">';
	echo '<tr><td>First Name</td><td><input type="text" name="first"></td></tr>';
	echo '<tr><td>Last Name</td><td><input type="text" name="last"></td></tr>';
	echo '<tr><td>E-Mail</td><td><input type="text" name="mail"></td></tr>';
	echo '<tr><td>Phone</td><td><input type="text" name="mobile"></td></tr>';
	echo '<tr><td>Password</td><td><input type="password" name="password"></td></tr>';
	echo '</table>';
	echo '<input type="submit" value="Submit" name="addsales"><br></form></h2>';
	
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
				echo 'alert("Sales Person Details Successfully Saved")';
				echo '</script>';
			}
		}

?>