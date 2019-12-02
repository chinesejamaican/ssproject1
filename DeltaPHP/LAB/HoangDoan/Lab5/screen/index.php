<?php
//including the database connection file
include '../make_connect_db.php';
//fetching data in descending order (lastest entry first)
$result = $dbConn->query("SELECT * FROM screen");
?>

<html>
<head>	
	<title>Screen</title>
</head>

<body>
<a href="add.html">Add New Data</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Screen ID</td>
		<td>Theater ID</td>
		<td>Seats</td>
	</tr>
	<?php 	
	while($row = $result->fetch(PDO::FETCH_ASSOC)) { 		
		echo "<tr>";
		echo "<td>".$row['sid']."</td>";
		echo "<td>".$row['tid']."</td>";
		echo "<td>".$row['seats']."</td>";		
 		echo "<td><a href=\"edit.php?sid=$row[sid]\">Edit</a> | <a href=\"delete.php?sid=$row[sid]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>
