<?php

// This exercise is designed to practice:
// 1) using PHP to connect to a relational database;
// 2) print the database in a table format;
// 3) format the table.

$myUserName = "zhaozhil";
$myPassword = "LZZnewmima19";
$myLocalHost = "localhost";
$myDB = "zhaozhil_db";

$conn = mysqli_connect($myLocalHost, $myUserName, $myPassword, $myDB);
if(!$conn){
	die("Connection failed: ");
	
}

$query = "SELECT * FROM alumni";
$result = mysqli_query($conn, $query);

if(!$result)
	die("Cannot process the query");
echo '<table border="1">';
echo "<td>Alum ID</td>";
echo "<td>prefix</td>";
echo "<td>first_name</td>";
echo "<td>last_name</td>";
echo "<td>target</td>";
echo "<td>active</td>";


$num = mysqli_num_rows($result);
if($num > 0){
	while($row=mysqli_fetch_assoc($result)){
		if($i%2===0){
		echo "<tr bgcolor=blue>";
		echo "<td>".$row["alum_id"]."</td>";
		echo "<td>".$row["prefix"]."</td>";
		echo "<td>".$row["first_name"]."</td>";
		echo "<td>".$row["last_name"]."</td>";
		echo "<td>".$row["target"]."</td>";
		echo "<td>".$row["active"]."</td>";
		}
		else{
		echo "<tr bgcolor=yellow>";
		echo "<td>".$row["alum_id"]."</td>";
		echo "<td>".$row["prefix"]."</td>";
		echo "<td>".$row["first_name"]."</td>";
		echo "<td>".$row["last_name"]."</td>";
		echo "<td>".$row["target"]."</td>";
		echo "<td>".$row["active"]."</td>";
		}
		$i++;
	}
	echo "</tr></table>";
}
else{
	echo "no rows found.";
}
mysqli_close($conn);
?>
