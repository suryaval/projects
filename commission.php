<?php
include ('pdoConn.php');
$link = mysql_connect($host,$user,$password);
	if(!$link)
	{
		die('Could not connect'.mysql_error());
		
	}
	$db_selected = mysql_select_db($db,$link);
	
	echo '<center><h1>Calculate Commission for Sales Person<div align="right"><a href="home2.php">Logout</a></div></h1><hr/>';
	if(isset($_GET['quote']))
	{
		$qtid = $_GET['quote'];
		echo '<br>Quote ID is:'.$qtid.'<br>';
		


$fp = fsockopen( "udp://blitz.cs.niu.edu", 4446, $errno, $errstr );
if (!$fp) die("$errstr ($errno)<br>");

$quote=$qtid;
include "pdoConn.php";
$link = mysql_connect($host,$user,$password);
$link1 = mysql_connect('blitz.cs.niu.edu:3306', 'student', 'student');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
if (!$link1) {
    die('Could not connect: ' . mysql_error());
}

$db_selected = mysql_select_db($db,$link);
$db2 = "csci467";
$db_selected1 = mysql_select_db($db2,$link1);

$query = "SELECT * FROM quotes where qid=$quote";
$query2 = "SELECT * FROM quote_details where qid=$quote";
//echo $query;
$query_out = mysql_query($query,$link) or die ("ffSearch query #1 failed" .mysql_error());
$query_out1 = mysql_query($query2,$link) or die ("eeSearch query #1 failed" .mysql_error());
$count = mysql_num_rows($query_out);
$cust_name = '';
$commission = '';
$sales_id = '';
$quote_id = '';
while($row = mysql_fetch_array($query_out))
			{
			$mymail=$row['email'];
		    $cust_id = $row['cid'];
			$quote_id = $row['qid'];
			//$commission = $row['commission'];
			$sales_id = $row['spid'];
			$query3 = "SELECT name FROM customers where id=$cust_id";
			$query_out2 = mysql_query($query3,$link1) or die ("ddSearch query #1 failed" .mysql_error());
			$row2 = mysql_fetch_array($query_out2);
			$cust_name = $row2[0];
			echo $cust_name;
			}
$count2 = mysql_num_rows($query_out1);
$price = 0;
while($row1 = mysql_fetch_array($query_out1))
			{ 				
			$price = $price + $row1['price'];
			}
$name = $cust_name;
$message = $quote. ":". $name .":". $price ;
echo "Sending: $message<br>";
fwrite( $fp, $message ) or die("write failed<br>");
$response = fread($fp, 1024);
$arr = explode(":", $response);
$confirmation_no = $arr[4];
$commission1 = $arr[6];
$query6 = "select * from salesperson where id = $sales_id";
$query_out6 = mysql_query($query6,$link) or die ("ccSearch query #1 failed" .mysql_error());
$row3 = mysql_fetch_array($query_out6);
$commission = $row3['comm']; 
$commission2 = ($price * $commission1)/100;
$commission = $commission + $commission2;
echo "Received: $response<br>";
fclose($fp);
$a = "A";
$query5 = "update quotes set confirmation_no = $confirmation_no,po=1 where qid = $quote_id";
$query4 = "update salesperson set comm = $commission where id = $sales_id ";
/*code for sending e-mail
$mailmsg = <'Hi\nYour Quote has been approved\nQuote ID:'.$quote.'\n Quote Total:$price\nPlease give your feedback@: http://localhost/xampp/myproj/se/clogin.php'>;
$mailmsg = wordwrap($msg,70);
mail('$mymail',"My subject",$msg);
*/
$query_out4 = mysql_query($query4,$link) or die ("aaSearch query #1 failed" .mysql_error());
$query_out5 = mysql_query($query5,$link) or die ("bbSearch query #1 failed" .mysql_error());

if(empty(mysql_error()))
{
	echo "Confirmation no is ".$confirmation_no;
	echo '<br>';
	echo "\n Commission is ".$commission;
	
}
}
?>