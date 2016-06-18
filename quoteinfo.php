        <?php
include ('pdoConn.php');
$link = mysql_connect($host,$user,$password);
	if(!$link)
	{
		die('Could not connect'.mysql_error());
		
	}
	$db_selected = mysql_select_db($db,$link);
	

if(isset($_POST['qtsubmit']))
{ 	
	$temp1=$_POST['qtid'];
	echo '<center><h2>Quote details for Quote No:'.$temp1.'</h2></center><hr/>';
	//echo 'temp1'.$temp1.':value:';
	$query2 = "SELECT * FROM quotes where qid=$temp1";
	//echo $query2;
	$query_out1 = mysql_query($query2);
	$count = mysql_num_rows($query_out1);
	$row2 = mysql_fetch_array($query_out1);
	//echo "The value of id is".$row2['qid'];
	$query3 = "SELECT * FROM quote_details where qid='$temp1'";
	$query_out2 = mysql_query($query3);
	
	$query4 = "SELECT SUM(price) FROM quote_details where qid=$temp1";
	$query_out3 = mysql_query($query4);
	$row4 = mysql_fetch_array($query_out3);
	
	$query7 = "SELECT * FROM quotes where qid=$temp1";
	$query_out7 = mysql_query($query7);
	$row7 = mysql_fetch_array($query_out7);
	$var7=$row7['qstatus'];
	if($var7==3)
	{
		$tot=$row7['qtotal'];
	}
	else
	{
		$tot=$row4['SUM(price)'];
	}

	echo '<center><table border=0>';
	if($count==1)
	{
		if($var7<3)
		{
		$cid=$row2['cid'];
		$qdes=$row2['qdesc'];
		$spid=$row2['spid'];
		$email=$row2['email'];
		$note1=$row2['note1'];
		$stat=$row2['qstatus'];
		$qot=$row2['qid'];
		echo '<form action="quoteinfo.php" method="POST">';
		echo '<input type="hidden" name="qi" value='.$qot.'>';
		echo '<tr><th><div align="left">Customer Id</div></th><td><input type="text" value='.$cid.' name="cid" readonly></td></tr>';
		echo '<tr><th><div align="left">Quote Description</div></th><td><input type="text" value='.$qdes.' name="qdes" readonly></td></tr>';
		echo '<tr><th><div align="left">Sales Person Id</div></th><td><input type="text" value='.$spid.' name="spid" readonly></td></tr>';
		echo '<tr><th><div align="left">E-mail</div></th><td><input type="text" value='.$email.' name="email" readonly></td></tr>';
		echo '<tr><th><div align="left">Secret Note</div></th><td><input type="text" value='.$note1.' name="note1" readonly></td></tr>';
		while ($row3 = mysql_fetch_array($query_out2))
		{
			echo '<tr><th><div align="left">Item Name</div></th><td><input type="text" value='.$row3['iname'].' readonly></td><td><input type="text" size=5 value='.$row3['price'].'></</td></tr>';
		}
		echo '<tr><th><div align="left">Secret Note-2</div></th><td><input type="text" name="note2"</td></tr>';
		echo '<tr><th><div align="left">Quote Total</div></th><td><input type="text" name="tot" value='.$tot.' readonly></td></tr>';
		echo '<tr><th><div align="left">Discount Amount</div></th><td><input type="text" name="disc"></td></tr>';
		echo '<tr><th><div align="left">Quote Status</div></th><td><select name="qstatus"><option value="2">Un-Resolved</option><option value="3">Completed</option></td></tr>';
		echo '</table>';
		echo '<br><input type="submit" name="edit" value="Confirm Quote">';
		echo '</form>';
		}
		else
		{
		echo '<center><h2>Only Open & Un-resolved quotes will be opened. Please try again!</h2></center>';
		echo '<center><h1><a href="rlogin.php">Click here to login</a></h1></center>';
		}
	}
	else
	{
		echo '<center><h2>Invalid Quote Number. Please try again!</h2></center>';
	}
	echo '</center>';
}
if(isset($_POST['edit']))
{
	//echo "hiii";
	include 'pdoConn.php';
	$link = mysql_connect($host,$user,$password);
	if(!$link)
	{
		die('Could not connect'.mysql_error());
		
	}
	$db_selected = mysql_select_db($db,$link);
		$var1=$_POST['cid'];
		$var2=$_POST['qdes'];
		$var3=$_POST['spid'];
		$var4=$_POST['email'];
		$var5=$_POST['note1'];
		$var6=$_POST['tot'];
		$var7=$_POST['note2'];
		$var8=$_POST['disc'];
		$var9=$_POST['qstatus'];
		$var10=$_POST['qi'];
		$var6=$var6-$var8;
		//echo 'After Discount:'.$var6.'<br>';
		$query9 = "UPDATE quotes set note2='$var7',qtotal=$var6,qstatus=$var9,po=0 where qid=$var10";
		//$query_out9 = mysql_query($query9);
		//$query10 = "UPDATE quote_details set";
		mysql_query($query9) or die(mysql_error());
		/*if($var9==3)
		{
			$query77 = "UPDATE quotes set po=1 where qid=$var10";
			mysql_query($query77) or die(mysql_error());
		}*/
		if(empty(mysql_error()))
		{
		echo '<script language = "javascript">';
		echo 'alert("Quote Successfully Saved")';
		echo '</script>';
		echo '<center><h2>Your Session has expired.</h2>';
		echo '<center><h1><a href="rlogin.php">Click here to login</a></h1></center>';
		}
}	
?>