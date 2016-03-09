<?php
/*
Author: Vikki
Create Date: March 8, 2016
Description: This is the form to collect data about a new application
*/
?>
 <html>
 <style>
table.db-table 		{ border-right:1px solid #ccc; border-bottom:1px solid #ccc; }
table.db-table th	{ background:#eee; padding:5px; border-left:1px solid #ccc; border-top:1px solid #ccc; }
table.db-table td	{ padding:5px; border-left:1px solid #ccc; border-top:1px solid #ccc; }
</style>
 <head>
	<title>Application input form </title>
 </head>
<body>

<form action="saveapp.php" method="Post" target="_blank">
  Company Name:<br>
  <input type="text" name="cname" value="">
  <br>
 Position Title:<br>
  <input type="text" name= "ptitle" value="">
  <br><br>
  <input type="submit" value="Submit">
</form> 

<?php


	


?>
</body>
</html>