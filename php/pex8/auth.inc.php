<?php
include("connect.inc.php");

session_start();
if($_SESSION['logABC'] != "apple"){
	echo "<p> Access denied. You will now be redirected to the login page. <p>";
	echo "<meta http-equiv=\"refresh\" content=\"2; URL=login.php\">";
	exit;
}
?>