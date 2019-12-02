<?php
//including the database connection file
include '../make_connect_db.php';
//fetching data in descending order (lastest entry first)
$result = $dbConn->query("SELECT * FROM start_time");
?>

<html>
<head>	
	<title>Start Time</title>
</head>

<body>
<a href="add.html">Add New Data</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Start Time ID</td>
		<td>Time</td>
		<td>Price ID</td>
	</tr>
	<?php 	
	while($row = $result->fetch(PDO::FETCH_ASSOC)) { 		
		echo "<tr>";
		echo "<td>".$row['stid']."</td>";
		echo "<td>".$row['time']."</td>";
		echo "<td>".$row['pid']."</td>";		
 		echo "<td><a href=\"edit.php?stid=$row[stid]\">Edit</a> | <a href=\"delete.php?stid=$row[stid]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>
