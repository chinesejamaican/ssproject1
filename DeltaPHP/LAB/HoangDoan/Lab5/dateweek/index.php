<?php
//including the database connection file
include '../make_connect_db.php';
$result = $dbConn->query("SELECT * FROM date_of_week;");
?>

<html>
<head>	
	<title>Date week</title>
</head>

<body>
<a href="add.html">Add New Data</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Date ID</td>
		<td>Day</td>
	</tr>
	<?php 	
	while($row = $result->fetch(PDO::FETCH_ASSOC)) { 		
		echo "<tr>";
		echo "<td>".$row['did']."</td>";
		echo "<td>".$row['day']."</td>";		
 		echo "<td><a href=\"edit.php?did=$row[did]\">Edit</a> | <a href=\"delete.php?did=$row[did]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>
