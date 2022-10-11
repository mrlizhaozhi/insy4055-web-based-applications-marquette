<html>
<head>
<meta HTTP-EQUIV="refresh" CONTENT="1">
</head>

<body>
<?php
include("connect.inc.php");


if ($_POST['submit']){
	$id = $_POST['alum_id'];
	$graduation = $_POST['gradyear'];
	$address = $_POST['home_address'];
	$city = $_POST['home_city'];
	$state = $_POST['home_state'];
	$zip = $_POST['home_zip'];
	$homePhone = $_POST['home_phone'];
	$cellPhone = $_POST['cell_phone'];
	$email = $_POST['email'];
	
	$sqlupdate= "UPDATE alumni SET gradyear='$graduation', home_address='$address', home_city='$city', home_state='$state', home_zip='$zip', 
	home_phone='$homePhone', cell_phone='$cellPhone', email='$email' WHERE alum_id='$id'";
	$result = mysqli_query($conn, $sqlupdate);
		if (!$result){
			die("Cannot process update query");
		}
}

if ($id == " "){
	$id = $_GET['key'];
}

$sql = "SELECT * FROM alumni WHERE alum_id='$id'";
$result2 = mysqli_query ($conn, $sql);
if (!$result2){
	die("Cannot process select query");
}

$row = mysqli_fetch_assoc($result2);
mysqli_close($conn);
?>

<form action="update.php" method="post">
	<input name="alum_id" type=hidden value="<?php echo $id; ?>" >
	<br/>
	Graduated: 
	<input name="graduation" type=text value="<?php echo $row["gradyear"]; ?>">
	<br/>
	Address: 
	<input name="address" type=text value="<?php echo $row["home_address"]; ?>">
	<br/>2
	City: 
	<input name="city" type=text value="<?php echo $row["home_city"]; ?>">
	<br/>
	State: 
	<input name="state" type=text value="<?php echo $row["home_state"]; ?>">
	<br/>
	ZIP: 
	<input name="zip" type=text value="<?php echo $row["home_zip"]; ?>">
	<br/>
	Home Phone: 
	<input name="homePhone" type=text value="<?php echo $row["home_phone"]; ?>">
	<br/>
	Cell Phone: 
	<input name="cellPhone" type=text value="<?php echo $row["cell_phone"]; ?>">
	<br/>
	Email: 
	<input name="email" type=text value="<?php echo $row["email"]; ?>">
	<br/>
	<input type="submit" name="submit" value="Update">
</form>

<?php
mysqli_close($conn);
?>

</body>
</html>

