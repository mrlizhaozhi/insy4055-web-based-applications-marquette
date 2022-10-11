<html>
<head>
</head>

<body>
<form action="search.php" method="post">
First Name:
<input name="first" type="text" id="last" size="20">
<br/>
Last Name:
<input name="last" type="text" id="last" size="20">
<input type="submit" name="submit1" value="search">
<input type="submit" name="submit2" value="select all">
</form>

<?php
$myUserName = "zhaozhil";
$myPassword = "LZZnewmima19";
$myLocalHost = "localhost";
$myDB = "zhaozhil_db";

$conn = mysqli_connect($myLocalHost, $myUserName, $myPassword, $myDB);
if(!$conn){
	die("Connection failed: ");
}
if($_POST['submit1'] || $_POST['submit2']){
	$search1=trim($_POST['first']);
	$search2=trim($_POST['last']);

	$query = "SELECT * FROM alumni WHERE 1";
	
	if(!$search1==""){
		$query = $query." AND first_name='$search1'";
	}
	
	if(!$search2==""){
		$query = $query." AND last_name=' $search2'";
	}
	
	$result = mysqli_query($conn, $query);
	if(!$result)
		die("Cannot process the query");
	
	

	$num = mysqli_num_rows($result);
	if($num > 0){
	echo '<table border="1"><tr>';
	echo "<td>Alum ID</td>";
	echo "<td>prefix</td>";
	echo "<td>first_name</td>";
	echo "<td>last_name</td>";
	echo "<td>target</td>";
	echo "<td>active</td>";
	echo "<td>Detail</td></tr>";
		while($row=mysqli_fetch_assoc($result)){
			if($i%2===0){
				echo "<tr bgcolor=blue>";
				// $id=$row["alum_id"]; // id number
				echo "<td>".$row["alum_id"]."</td>";
				echo "<td>".$row["prefix"]."</td>";
				echo "<td>".$row["first_name"]."</td>";
				echo "<td>".$row["last_name"]."</td>";
				echo "<td>".$row["target"]."</td>";
				echo "<td>".$row["active"]."</td>";
				echo "<td><a href=moreinfo.php?key=$id>details</a></td>"; //connecting to another php file through predefined id.
			}
			else{
				echo "<tr bgcolor=yellow>";
				$id=$row["alum_id"]; // id number
				echo "<td>".$row["alum_id"]."</td>";
				echo "<td>".$row["prefix"]."</td>";
				echo "<td>".$row["first_name"]."</td>";
				echo "<td>".$row["last_name"]."</td>";
				echo "<td>".$row["target"]."</td>";
				echo "<td>".$row["active"]."</td>";
				echo "<td><a href=moreinfo.php?key=$id>details</a></td>"; //connecting to another php file through predefined id.
			}
			$i++;
		}
		echo "</tr></table>";
	}
	else{
		echo "no rows found.";
	}
}
mysqli_close($conn);
?>
</body>
</html>
