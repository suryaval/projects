<?php
include ('pdoConn.php');
$link = mysql_connect($host,$user,$password);
	if(!$link)
	{
		die('Could not connect'.mysql_error());
		
	}
	$db_selected = mysql_select_db($db,$link);

	$link1 = mysql_connect('blitz.cs.niu.edu:3306', 'student', 'student');
	if (!$link1)
	{
    die('Could not connect: ' . mysql_error());
	}
	$db2 = "csci467";
	$db_selected1 = mysql_select_db($db2,$link1);

if(isset($_POST['clogin']))
{ 	
	$temp1=$_POST['usid'];
	$temp2=$_POST['pswd'];
	$query2 = "SELECT * FROM quotes where cid='$temp1' and qid='$temp2'";
	$query_out = mysql_query($query2,$link);
	$count = mysql_num_rows($query_out);
	
	$query99 = "SELECT * FROM cfeedback where flag=1 and qid='$temp2'";
	$query_out9 = mysql_query($query99,$link);
	$count9 = mysql_num_rows($query_out9);
	
	$q2="SELECT * FROM customers where id='$temp1'";
	$q2out=mysql_query($q2,$link1);
	$list = mysql_fetch_array($q2out);
	$name=$list['name'];
	
	if($count==1)
	{
		if($count9==0)
		{
		echo '<h1>Welcome <i>'.$name.'</i></h1>';
		echo '<center><h2>Customer Feedback for Quote no:'.$temp2.'</h2></center><hr/>';
		echo '<form action="customer_page.php" method="post"><center>';
		echo 'Customer Id<input type="hidden" value='.$temp1.' name="cus">';
		echo 'Quote Id<input type="hidden" value='.$temp2.' name="quo">';
		echo '<h3>Feedback</h3><textarea rows="10" cols="50" name="fback"></textarea>';
		echo '<br><br><input type="submit" name="fsubmit" value="Submit">';
		echo '</center></form>';
		}
		else
		{
			echo '<center><h2>Feedback already provided for the quote no:'.$temp2.'</h2></center>';
			echo '<center><h1><a href="clogin.php">Click here to give feedback for another quote</a></h1></center>';
		}
	}
	else
	{
		echo '<center><h2>Validation Failed Please try again</h2>';
		echo '<h1><a href="clogin.php">Click here to Login again</a></h1></center>';
	}
}
	if(isset($_POST['fsubmit']))
		{	
			$c=$_POST['cus'];
			$q=$_POST['quo'];
			$feedback=$_POST['fback'];
			$query4="INSERT INTO cfeedback(cid,qid,feedback,flag) values($c,$q,'$feedback',1)";
			mysql_query($query4,$link) or die(mysql_error());
			if(empty(mysql_error()))
			{
			echo '<script language = "javascript">';
			echo 'alert("Feedback Successfully Saved")';
			echo '</script>';
			echo '<center><h2>Thanks for your feedback</h2>';
			echo '<center><h1><a href="clogin.php">Click here to give feedback for another quote</a></h1></center>';
			}
}
?>