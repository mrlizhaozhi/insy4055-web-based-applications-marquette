<?php

$myUserName = "zhaozhil";
$myPassword = "LZZnewmima19";
$myLocalHost = "localhost";
$myDB = "zhaozhil_db";

$conn = mysqli_connect($myLocalHost, $myUserName, $myPassword, $myDB);
if(!$conn){
	die("Connection failed: ");
	
}
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);

if(!$result)
	die("Cannot process the query");

$num = mysqli_num_rows($result);
if($num > 0){
	while($row=mysqli_fetch_assoc($result)){
		echo $row["last_name"];
		echo "<br/>";
		echo $row["first_name"];
		echo "<br/>";
		echo $row["admin"];
		echo "<br/>";
		echo $row["phone"];
		echo "<br/>";
		echo $row["cell"];
		echo "<br/>";
		echo $row["email"];
		echo "<br/>";		
	}
}
else{
	echo "no rows found.";
}
mysqli_close($conn);
?>
