<?php
include ('pdoConn.php');
$link = mysql_connect($host,$user,$password);
	if(!$link)
	{
		die('Could not connect'.mysql_error());
		
	}
	$db_selected = mysql_select_db($db,$link);
	

if(isset($_POST['slogin']))
{ 	
	$temp1=$_POST['uid'];
	$temp2=$_POST['pswd'];
	$query2 = "SELECT * FROM salesperson where id='$temp1' and password='$temp2'";
	$query_out = mysql_query($query2);
	$count = mysql_num_rows($query_out);
	
	$q2="SELECT * FROM salesperson where id='$temp1'";
	$q2out=mysql_query($q2);
	$list = mysql_fetch_array($q2out);
	$firstname=$list['fname'];
	$lastname=$list['lname'];
	$salespersonid=$list['id'];
	
	if($count==1)
	{
		echo '<h1>Welcome '.$firstname.'  '.$lastname.'</h1>';
		echo '<center><h2>Create Quote- Search Customer</h2></center>';
		echo '<form action="aname.php" method="post">';	
		echo 'Sales Person ID<input type="text" name="sid" value='.$salespersonid.' readonly>';
		echo '<br><br>Enter Customer Name here: <input type="text" name="cusname">'; 
		echo '<input type="submit" name="csubmit" value="Search">';
		echo '</form>';
	}
	else
	{
		echo 'Validation Failed Please try again';
	}
}
	if(isset($_POST['csubmit']))
		{
			$salespid=$_POST['sid'];
			$query4="SELECT * FROM salesperson where id='$salespid'";
			$query4out=mysql_query($query4);
			$list3=mysql_fetch_array($query4out);
			$salesid=$list3['id'];
			$firstname2=$list3['fname'];
			$lastname2=$list3['lname'];
		echo '<h1>Welcome '.$firstname2.'  '.$lastname2.'</h1>';
		echo '<center><h2>Create Quote- Search Customer</h2></center>';
		echo '<form action="aname.php" method="post">';	
		echo 'Sales Person ID<input type="text" name="sid" value='.$salesid.' readonly>';
		echo '<br><br>Enter Customer Name here: <input type="text" name="cusname">'; 
		echo '<input type="submit" name="csubmit" value="Search"><br><br>';
			$temp3=$_POST['cusname'];
			$query3= "SELECT * FROM CUSTOMERS WHERE CNAME LIKE '%$temp3%'";
			$query_out2 = mysql_query($query3);
			$count2 = mysql_num_rows($query_out2);
			
			if($count2!=0)
			{
				echo '<table border="5">';
				echo '<tr><th>Customer Id</th><th>Customer Name</th><th>City</th><th>Click here</th></tr>';
			while($row2 = mysql_fetch_array($query_out2))
				{ 
			    $cid1 = $row2['cid'];
				echo '<form action="add.php" method="post"><tr><td>'.$row2['cid'].'</td><td>'.$row2['cname'].'</td><td>'.$row2['city'].'</td><td><a href="add.php?cust_id='.$cid1.'&sale_id='.$salesid.'">Create Quote</a></form></td></tr>';
				}
			}
			else
			{
				echo "Customer not found. Try again";
			}
		}
		echo '</form>';
?>