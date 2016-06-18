
<?php

$hostName="courses";
$userName="z1750104";
$password="19890922";
$db="z1750104";


//Establish Connection
$conn = mysql_connect($hostName, $userName, $password);

//Check to see if connection has been established
if(!$conn) {
	die("Couldn't connect: " . mysql_error());
}

//Select Database
$db_selected = mysql_select_db($db, $conn);

//Check to make sure database was selected
if(!$db_selected) {
	die("Cant use database: " . $db . mysq_error());
}

$msg = "";
if(isset($_REQUEST['btnSubmit'])) {
$id = $_REQUEST['spid'];
$fname = $_REQUEST['spfname'];
$lname = $_REQUEST['splname'];
$email = $_REQUEST['spemail'];
$phone = $_REQUEST['spphone'];
$password = $_REQUEST['sppass'];
$tot = $_REQUEST['sptot'];
$comm = $_REQUEST['spcomm'];
$query = "insert into salesperson (id,fname,lname,email,phone,password,tot,comm) values ('$id','$fname','$lname','$email','$phone','$password','$tot','$comm')";
if(mysql_query($query)){
$msg = "Record Saved!";
} else {
$msg = "Unable to Save!";
}
}
?>
<html>
<a href="display.php">Display</a>
<body>
<form method="POST">
<table>
<tr><td>
id : 
</td>
<td>
<input type="text" name="spid"/>
</td></tr>
<tr><td>
FirstName :
</td>
<td>
 <input type="text" name="spfname"/>
</td></tr>
<tr><td>
LastName : 
</td>
<td>
<input type="text" name="splname"/> <br/>
</td></tr>
<tr><td>
Email :
</td>
<td>
 <input type="text" name="spemail"/> <br/>
</td></tr>
<tr><td>
Phone : 
</td>
<td>
<input type="text" name="spphone"/> 
</td></tr>
<tr><td>
Password :
</td>
<td>
 <input type="text" name="sppass"/> 
</td></tr>
<tr><td>
Total : 
</td>
<td>
<input type="text" name="sptot"/>
</td></tr>
<tr><td>
Commission :
</td>
<td>
<input type="text" name="spcomm"/>
</td></tr>
<tr><td>
<input type="submit" name="btnSubmit" value="Save"/>
</td></tr>
</table>
<?php echo $msg; ?>
</form>
</body>

</html>