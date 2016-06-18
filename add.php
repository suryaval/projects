<?php
include ('pdoConn.php');
$link = mysql_connect($host,$user,$password);
	if(!$link)
	{
		die('Could not connect'.mysql_error());
		
	}
	$db_selected = mysql_select_db($db,$link);
?>
	<head>
<script type="text/javascript">

	function addRow(tableID) {
    var table = document.getElementById(tableID);
    var rowCount = table.rows.length;
    var row = table.insertRow(rowCount);
    var colCount = table.rows[0].cells.length;
    for(var i=0; i<colCount; i++) {
        var newcell = row.insertCell(i);
        newcell.innerHTML = table.rows[0].cells[i].innerHTML;
        //alert(newcell.childNodes);
        switch(newcell.childNodes[0].type) {
            case "text":
                newcell.childNodes[0].value = "";
                break;
            case "text":
                newcell.childNodes[0].value = "";
                break;
            case "text":
                newcell.childNodes[0].value = "";
                break;
            case "text":
                newcell.childNodes[0].value = "";
                break;
            case "text":
                newcell.childNodes[0].value = "";
                break;
            case "checkbox":
                newcell.childNodes[0].checked = false;
                break;
            case "select-one":
                newcell.childNodes[0].selectedIndex = 0;
                break;
        }
    }
}

var rows = document.getElementById(tableId).getElementsByTagName("tr").length;
window.location.href = "send.php?w1=" + rows;
</script>
	</head>
<?php
if(isset($_GET['cust_id']))
{ 	
    $cid = $_GET['cust_id'];
	if(isset($_GET['sale_id']))
	{
		$spid = $_GET['sale_id'];
//	echo 'Creating Quote for'.$cid.'<br>';
	echo "<body>";
	echo '<center><h1>Create Quote</h1></center>';
	echo '<form method="POST" action="add.php">';
	echo '<center><table><tr><td>Customer id</td><td><input type="text" name = "cid" size=5 value='.$cid.' readonly></td></tr>';
	echo '<tr><td>Sales Person id</td><td><input type="text" size=5 name = "spid"value='.$spid.' readonly></td></tr></table></center><hr/>';
	echo '<center><h2>Add Product Details here</h2></center>';
	echo " <center><table id=\"dataTable\" width=\"auto\" style=\"margin:-4px 0 0 0;\" cellspacing=\"0px\">\n";	
echo "    <tr>\n"; 
echo "      \n"; 
echo "      <td><INPUT type=\"text\" name=\"item[]\" style=\"width:160px;\" autocomplete=\"on\" placeholder=\"Item Name\" required/></td>\n"; 
echo "            <td><INPUT type=\"text\" name=\"cost[]\" style=\"width:62px;\" autocomplete=\"on\" placeholder=\"Price\" required/></td>\n"; 
echo "            \n"; 
echo "    </tr>\n"; 
echo "  </table>\n"; 
echo "<br\>";
echo "    <INPUT type=\"button\" value=\"Add row\" onclick=\"addRow('dataTable')\" />\n";
echo "</p>";
echo '<table>';
echo '<tr><td>Quote Description</td><td><textarea rows="4" cols="25" name="desc"></textarea></td></tr>';
echo '<tr><td>Email</td><td><input type="text" name="mail"></td></tr>';
echo '<tr><td>Secret Notes</td><td><input type="text" name="snote"></td></tr>';
echo '</table>';
echo '<input type="submit" value="Submit Quote" name="qsave">';
	echo "</center>";
	echo "</form></body>";
}
}

if(isset($_POST['qsave']))
{
	include 'pdoConn.php';
	$link = mysql_connect($host,$user,$password);
	if(!$link)
	{
		die('Could not connect'.mysql_error());
		
	}
	$db_selected = mysql_select_db($db,$link);
	$desc = $_POST['desc'];
	$mail = $_POST['mail'];
	$snote =  $_POST['snote'];
	$spid = $_POST['spid'];
	$cid = $_POST['cid'];
	$query2 = "insert into quotes(qdesc,spid,cid,email,note1,qstatus,po) values ('$desc',$spid,$cid,'$mail','$snote',1,0)";
	$query_out = mysql_query($query2) or die('Insert query failed'.mysql_error());
    if(empty(mysql_error()))
	{
    if(isset($_POST['item'])&& isset($_POST['cost']))
    { 
    $ITEM_NAME=$_POST['item'];
    $ITEM_COST = $_POST['cost'];
	$query3 = "select max(qid) from quotes";
	$query_out3 = mysql_query($query3) or die('Insert query failed'.mysql_error());
	$list = mysql_fetch_array($query_out3);
	$qid2 = $list[0];
	$line_no = 1;
	foreach($ITEM_NAME as $a => $b)
	{
	$sql2 = "INSERT INTO quote_details(qid,quoteseq,iname,price) values ($qid2,$line_no,'$ITEM_NAME[$a]',$ITEM_COST[$a])";	
 	mysql_query($sql2) or die(mysql_error()); 
	//echo $ITEM_NAME[$a];
	//echo $ITEM_COST[$a];
	$line_no = $line_no + 1; 
	}
	if(empty(mysql_error()))
	{
			$query4 = "SELECT SUM(price) FROM quote_details where qid=$qid2";
			$query_out3 = mysql_query($query4);
			$row4 = mysql_fetch_array($query_out3);
			$tot=$row4['SUM(price)'];
			$query5 = "INSERT INTO quote_details(qtotal) values ($tot)";
			$query_out3 = mysql_query($query5);
		echo '<script language = "javascript">';
		echo 'alert("Quote Successfully Saved")';
		echo '</script>';
		echo '<center><h2>Your Session has expired.</h2>';
		echo '<center><h1><a href="slogin.php">Click here to login</a></h1></center>';
		
	}
	}
		
	}
}
?>