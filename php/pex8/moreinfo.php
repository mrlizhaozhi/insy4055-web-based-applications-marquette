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

$id = $_GET['key'];

$query = "SELECT * FROM alumni WHERE alum_id='$id';";

$result = mysqli_query($conn, $query);

if(!$result){
	die("Cannot process the query");
}

$num = mysqli_num_rows($result);
if($num > 0){
	while($row=mysqli_fetch_assoc($result)){
		$id=$row["alum_id"].'<br>';// id number
		echo $row["alum_id"].'&nbsp;';
		echo '<b>'.$row["prefix"].'&nbsp;';
		echo $row["first_name"].'&nbsp;';
		echo $row["last_name"].' </b> &nbsp;  <br>';
		echo 'Graduated: '.$row["gradyear"].'<br>';
		echo 'Home Address: '.$row["home_address"].'<br>';
		echo 'State: '.$row["home_state"].'<br>';
		echo 'ZIP: '.$row["home_zip"].'<br>';
		echo 'Home Phone: '.$row["home_phone"].'<br>';
		echo 'Cell Phone: '.$row["cell_phone"].'<br>';
		echo 'Email: '.$row["email"].'<br>'; 
		echo 'Major: '.$row["title"];
	}
}
else{
	echo "no rows found.";
}

//new query for title
//not sure how to use mysqli_multi_query statement.
$query2 = "SELECT title FROM major INNER JOIN alum_major ON major.major_id = alum_major.major_id AND alum_major.alum_id = '$id';";
$result2 = mysqli_query($conn, $query2);

if(!$result2){
	die("Cannot process the query");
}

$num2 = mysqli_num_rows($result2);
if($num2 > 0){
	while($row=mysqli_fetch_assoc($result2)){
		$id=$row["alum_id"].'<br>';// id number
		echo $row['title'].'<br>';
	}
}
else{
	echo "no rows found.";
}
mysqli_close($conn);

?>
<br><a href=detail.php>Back to Alumni Management</a>