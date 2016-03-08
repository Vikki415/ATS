<?php
/*
Author: Vikki
Create Date: Feb 29, 2016
Description: This simply lists the functions used in the ATS1
*/
?>
<?php

function getCon()
{
	$servername = "localhost";
	$username = "application";
	$password = "remember1";
	$dbname = "app";

	// Create connection
	$conn = @new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_errno) {
		die("Connection failed: " . $conn->connect_error);
	}
	
return $conn;    
}

?>