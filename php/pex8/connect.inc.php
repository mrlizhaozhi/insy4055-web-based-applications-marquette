<?php
$myUserName = "zhaozhil";
$myPassword = "LZZnewmima19";
$myLocalHost = "localhost";
$myDB = "zhaozhil_db";

$conn = mysqli_connect($myLocalHost, $myUserName, $myPassword, $myDB);
if(!$conn){
	die("Connection failed: ");
}
?>
