<html>
<head>
</head>

<body>
<?php
include("connect.inc.php");

if ($_POST['login']){
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
	$result = mysqli_query ($conn, $sql);
	if (!$result){ 
		die("Cannot process select query");
	}
	
	$num = mysqli_num_rows($result);
	if ($num == 1){
		session_start();
		$_SESSION['logABC'] = "apple";
		echo "<META HTTP-EQUIV=\"refresh\" content=\"0; URL=details.php\">";
	}
	else{
		echo "check your username and password";
	}
}
mysqli_close($conn);
?>

<form action="login.php" method="post">
	SIGN IN: 
	Username: <input name="username" type="text" size="20"> <br>
	Password: <input name="password" type="text" size="20"> <br>
	<input type="submit" name="login" value="Login">
</form>
</body>
</html>