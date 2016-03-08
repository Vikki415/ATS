<?php
/*
Author: Vikki
Create Date: Feb 15, 2016
Description: This simply lists the data from the Application table with the option for individual records to be deleted
*/
?>
<?php

include "/functions.php"

?>
<html>
<style>
table.db-table 		{ border-right:1px solid #ccc; border-bottom:1px solid #ccc; }
table.db-table th	{ background:#eee; padding:5px; border-left:1px solid #ccc; border-top:1px solid #ccc; }
table.db-table td	{ padding:5px; border-left:1px solid #ccc; border-top:1px solid #ccc; }
</style>

	<head></head>
	<body>
	
		<table width = "75%" border = "1">
		<th>Company Name &nbsp; &nbsp;
			<a href="/listapps.php?sortby=C">
			<img align=center src="/icons/up.gif"></a>
			&nbsp; &nbsp;
			<a href="/listapps.php?sortby=Cd">
			<img align=center src="/icons/down.gif"></a>
		
		</th>
		<th>Position Title &nbsp; &nbsp;
			<a href="/listapps.php?sortby=T">
			<img align=center src="/icons/up.gif"/></a>
			&nbsp;&nbsp
			<a href="/listapps.php?sortby=Td">
			<img align=center src="/icons/down.gif"></a>
		</th>
		<th>Submission Date&nbsp; &nbsp;
			<a href="/listapps.php?sortby=D">
			<img align=center src="/icons/up.gif"></a>
			&nbsp; &nbsp;
			<a href="/listapps.php?sortby=Dd">
			<img align=center src="/icons/down.gif"></a>
		</th>
		<th> &nbsp; &nbsp;
		</th>
			
<?php

$sortoptions['C'] = "CompanyName";
$sortoptions['T'] = "PositionTitle";
$sortoptions['D'] = "SubmissionDate";
$sortoptions['I'] = "ApplicationID";
$sortoptions['Cd'] = "CompanyName Desc";
$sortoptions['Td'] = "PositionTitle Desc";
$sortoptions['Dd'] = "SubmissionDate Desc";
$sortoptions['Id'] = "ApplicationID Desc";
         
        
 
 $conn=getCon();
 
 // first, set the default if there are nonexistant or nonsense parameters
$sortby = "submissiondate";
if (array_key_exists("sortby", $_REQUEST))
{	
//to guard against SQL injection we will do a simple translation of request parameter to column name
	$param = $_REQUEST['sortby'];

	if (array_key_exists($param, $sortoptions))
	{
		$sortby = $sortoptions[$param];
	}
	
}

 

$sql = "SELECT * FROM Application ORDER BY ".$sortby; 

 echo $sql; 

$result = $conn->query($sql);

if (!$result) { die('error in SQL'); }

while ($row = mysqli_fetch_object($result))
{
	
	echo "<tr>";
	
	$name = $row->CompanyName;
	$title = $row->PositionTitle;
	$date = $row->SubmissionDate;
	$id = $row->ApplicationID;

	echo "<td>";
	
	echo $name;
	
	echo "</td>";
	
	echo "<td>";
	
	echo $title;
	
	echo "</td>";
	
	echo "<td>";
	
	echo $date;
	
	echo "</td>";
	
	echo "<td>";
	//this is tricky because it contains a mix of quotes. the \ escapes, allowing the Javascript to run. We chose Javascript for this 
	//confirmation button versus server side tools to more closely follow production code practices. This ignores the very minimal complication 
	//that a few users will not be Javascript enabled.
	
	echo "<a href='/deleteapps.php?id=".$id."' onclick=\"javascript:return confirm('Delete this record?');\" >";
	
	echo "<img width='35px' src='icons/trash.png'>  </a>"  ;
	
	echo "</td>";
	
	echo "</tr>";
	
	
	
}
?>

</table>


<?php

if ($result) {
	echo "Above are all of your pending applications";
    // output data of each row
   // if ($recordObj = $result->fetch_object()) {
        // echo $recordObj-> $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
	mysqli_free_result($result)	
	

?>

	</body>
</html>

