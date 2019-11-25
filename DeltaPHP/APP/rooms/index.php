<?php

include_once("config.php");

$result = $dbConn->query("SELECT * FROM rooms ORDER BY RoomID ASC");
?>

<html>
<head>	
	<title>Homepage</title>
</head>

<body>
<a href="add.html">Add New Data</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Room ID</td>
		<td>BuildingID</td>
		<td>RoomNumber</td>
		<td>Capacity</td>
	</tr>
	<?php 	
	while($row = $result->fetch(PDO::FETCH_ASSOC)) { 		
		echo "<tr>";
		echo "<td>".$row['RoomID']."</td>";
		echo "<td>".$row['BuildingID']."</td>";
		echo "<td>".$row['RoomNumber']."</td>";	
		echo "<td>".$row['Capacity']."</td>";	
 		echo "<td><a href=\"edit.php?RoomID=$row[RoomID]\">Edit</a> | <a href=\"delete.php?RoomID=$row[RoomID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>