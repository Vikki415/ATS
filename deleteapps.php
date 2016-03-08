<?php
/*
Author: Vikki
Create Date: March 7, 2016
Description: This page deletes the record specified in he URL and confirms the deletion of that record from the Application table
*/

include "/functions.php";

?>
 <html>
 <head>
	<title>Deletepage</title>
 </head>
<body>

<?php


	

if (array_key_exists("id", $_REQUEST))
{
	$param = $_REQUEST['id'];

	//will use this function to prevent bad "id" param, Ctype digit just checks for numbers
	if (!ctype_digit($param)) {
		die ("bad parameter");

	}
	 
	//the echo below is to display the record number passed from the URL
	//echo "$param";
}
else 
{
	die("sorry, no record selected");
}
	

	
$sql = "DELETE FROM Application WHERE ApplicationID=".$param;
// the echo below displays the literal SQL statement that will be run
// echo $sql; 

$conn=getCon();

$conn->query($sql);

// notice that we are asking the connection, not the result for the information about the number of rows affected
if($conn->affected_rows) 
{
	echo "Thank you. Your record number " .$param." has been deleted.";
}	
else 
{
	echo "That record does not exist.";
}	
	
?>


  
 
<br>
<a href="/listapps.php?sortby=ID">
	<img align=center src="/icons/left.gif">
Back
</a>

</body>
</html>
