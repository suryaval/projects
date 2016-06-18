<?php								
/*
Name: Mallikharjuna Vallabhaneni
Zid: Z1761124
Section: 566-3
Due Date: 04/10/2015
Description: The following php file is used for connecting to the db
*/
$host = 'localhost';		
$user = 'root'; //username and password of database being used follows here
$password = '';
$db = 'qp';

$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');			
$conn = new PDO("mysql:host=$host;dbname=$db",$user,$password);	//connection is made in this statement.
try																	
{
$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}
catch(PDOException $e) //catch method to display the error encountered.
{
echo 'ERROR: '. $e->getMessage();	
}
?>