<?php
include("connect.inc.php");

session_start();
session_destroy();
echo "You have been successfully logged out. <br><br> You will now be returned to the login page.
	<META HTTP-EQUIV=\"refresh\" content=\"2; URL=login.php\">";
?>