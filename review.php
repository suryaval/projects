<?php
include ('pdoConn.php');
$link = mysql_connect($host,$user,$password);
	if(!$link)
	{
		die('Could not connect'.mysql_error());
		
	}
	$db_selected = mysql_select_db($db,$link);
	

if(isset($_POST['rlogin']))
{ 	
	$temp1=$_POST['usid'];
	$temp2=$_POST['pswrd'];
	$query2 = "SELECT * FROM reviewer where rid='$temp1' and psd='$temp2'";
	$query_out = mysql_query($query2);
	$count = mysql_num_rows($query_out);
	
	if($count==1)
	{
		$link = mysql_connect($host,$user,$password);
	if(!$link)
	{
		die('Could not connect'.mysql_error());
		
	}
	$db_selected = mysql_select_db($db,$link);
		echo '<center><h1>Review Quote - Search Quotes<div align="right"><a href="home2.php">LogOut</a></div></h1>';
		echo '<tr><td><h2><a href="proc.php">Create Purchase Orders</a></h2></td></tr>';
		echo '<h2>Quotes List</h2>';
		$query3 = "SELECT * FROM quotes where qstatus=1";
		$query_out2 = mysql_query($query3);
		echo '<table border=3>';
		echo '<tr><th>Quote type</th><th>Quote Ids</th></tr>';
		echo '<tr><td>Created</td><td>';
		while($row2 = mysql_fetch_array($query_out2))
				{ 
			    echo ''.$row2['qid'].',';
				//echo '<form action="add.php" method="post"><tr><td>'.$row2['cid'].'</td><td>'.$row2['cname'].'</td><td>'.$row2['city'].'</td><td><a href="add.php?cust_id='.$cid1.'&sale_id='.$salesid.'">Create Quote</a></form></td></tr>';
				}
		echo '</td></tr>';
		echo '<tr><td>Un-Resolved</td><td>';
		$query4 = "SELECT * FROM quotes where qstatus=2";
		$query_out3 = mysql_query($query4);
		while($row3 = mysql_fetch_array($query_out3))
				{ 
			    echo ''.$row3['qid'].',';
				}
		echo '</td></tr>';
		echo '<tr><td>Sanctioned</td><td>';
		$query5 = "SELECT * FROM quotes where qstatus=3";
		$query_out4 = mysql_query($query5);
		while($row4 = mysql_fetch_array($query_out4))
				{ 
			    echo ''.$row4['qid'].',';
				}
		echo '</td></tr>';
		echo '</table></center><hr/>';
		echo '<center><h2>Search Quotes here</h2>';
		echo '<form action="quoteinfo.php" method="POST">';
		echo 'Enter quote id:<input type="text" name="qtid" size=5>';
		echo '    <input type="submit" name="qtsubmit" value="Get Quote!"><br><br>';
		echo '</form></center>';
	}
	else
	{
		echo 'Validation Failed Please try again';
	}
}
?>