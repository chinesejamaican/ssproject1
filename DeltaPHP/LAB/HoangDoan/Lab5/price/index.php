<?php
//including the database connection file
include '../make_connect_db.php';
//fetching data in descending order (lastest entry first)
$result = $dbConn->query("SELECT * FROM price");
?>

<html>
<head>	
	<title>Price</title>
</head>

<body>
<a href="add.html">Add New Data</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Price ID</td>
		<td>Cost</td>
	</tr>
	<?php 	
	while($row = $result->fetch(PDO::FETCH_ASSOC)) { 		
		echo "<tr>";
		echo "<td>".$row['pid']."</td>";
		echo "<td>".$row['cost']."</td>";	
 		echo "<td><a href=\"edit.php?pid=$row[pid]\">Edit</a> | <a href=\"delete.php?pid=$row[pid]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>
