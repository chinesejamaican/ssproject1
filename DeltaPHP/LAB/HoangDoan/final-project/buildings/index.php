<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
$result = $dbConn->query("SELECT * FROM buildings ORDER BY BuildingID ASC");
?>

<html>
<head>	
	<title>Homepage</title>
</head>

<body>
<a href="add.html">Add New Data</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Building ID</td>
		<td>Building Number</td>
		<td>BuildingName</td>
	
	</tr>
	<?php 	
	while($row = $result->fetch(PDO::FETCH_ASSOC)) { 		
		echo "<tr>";
		echo "<td>".$row['BuildingID']."</td>";
		echo "<td>".$row['BuildingNo']."</td>";
		echo "<td>".$row['BuildingName']."</td>";	
			
 		echo "<td><a href=\"edit.php?BuildingID=$row[BuildingID]\">Edit</a> | <a href=\"delete.php?BuildingID=$row[BuildingID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>
