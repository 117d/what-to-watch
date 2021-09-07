
<?php
// database login details
$dbServer = 'localhost';
$dbUser = 'itech56';
$dbPw = 'HXW4sJSw7R^G';
$dbName = 'itech56';
//define('DB_PASSWORD', 'HXW4sJSw7R^G');


$db = mysqli_connect($dbServer, $dbUser, $dbPw, $dbName);

// if connection is failed 
if($db === false){
	die("ERROR: Could not connect.");
	}


?>