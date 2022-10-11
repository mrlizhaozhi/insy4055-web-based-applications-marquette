<?php
$FirstName=$_POST['txtFirstName'];
$LastName=$_POST['txtLastName'];

if (strlen(trim($FirstName)) == 0) {
    echo "Your first name is required.";
}

else if (strlen(trim($LastName)) == 0) {
    echo "Your last name is required.";
}
else{
	echo "Your name is ".$FirstName." ".$LastName.".";
}
?>