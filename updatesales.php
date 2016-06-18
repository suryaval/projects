<?php
	if(isset($_POST['updatesales']))
		{
			include 'pdoConn.php';
			$link = mysql_connect($host,$user,$password);
			if(!$link)
			{
				die('Could not connect'.mysql_error());	
			}
			$db_selected = mysql_select_db($db,$link);
			$var1=$_POST['sid'];
			//$var2=$_POST['last'];
			//$var3=$_POST['mail'];
			//$var4=$_POST['mobile'];
			//$var5=$_POST['password'];
			//$query2 = "insert into salesperson(fname,lname,email,phone,password) values('$var1','$var2','$var3',$var4,'$var5')";
			$query5="SELECT * FROM salesperson where id=$var1";
			$queryout2=mysql_query($query5);
			$list=mysql_fetch_array($queryout2);
			echo '<center><h2>Details for Sales Person Id:'.$list['id'].'</h2>';
			echo '<h2><table border="0">';
			echo '<form action="updatesales.php" method="POST">';
			echo '<tr><td>ID</td><td><input type="text" name="salesid" value='.$list['id'].' readonly></td></tr>';
			echo '<tr><td>First Name</td><td><input type="text" name="first" value='.$list['fname'].'></td></tr>';
			echo '<tr><td>Last Name</td><td><input type="text" name="last" value='.$list['lname'].'></td></tr>';
			echo '<tr><td>E-Mail</td><td><input type="text" name="mail" value='.$list['email'].'></td></tr>';
			echo '<tr><td>Phone</td><td><input type="text" name="mobile" value='.$list['phone'].'></td></tr>';
			echo '<tr><td>Password</td><td><input type="text" name="password" value='.$list['password'].'></td></tr>';
			//echo '<tr><td>Password</td><td><input type="password" name="password"></td></tr>';
			echo '</table>';
			echo '<input type="submit" name="upda" value="Update"></center>';
			echo '</form>';
		}
			if(isset($_POST['upda']))
			{
			include 'pdoConn.php';
			$link = mysql_connect($host,$user,$password);
			if(!$link)
			{
			die('Could not connect'.mysql_error());
			}
			$db_selected = mysql_select_db($db,$link);
			$var11=$_POST['salesid'];
			$var9=$_POST['first'];
			$var2=$_POST['last'];
			$var3=$_POST['mail'];
			$var4=$_POST['mobile'];
			$var5=$_POST['password'];
			$query7="UPDATE salesperson SET fname='$var9',lname='$var2',email='$var3',phone=$var4,password='$var5' where id=$var11";
			//echo '$query7';
			mysql_query($query7) or die(mysql_error());
			if(empty(mysql_error()))
			{
				echo '<script language = "javascript">';
				echo 'alert("Details Successfully Saved")';
				echo '</script>';
				echo '<center><h2>Your Session has expired.</h2>';
				echo '<center><h1><a href="alogin.php">Click here to login</a></h1></center>';
			}
			}
?>