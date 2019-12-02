<?php
//including the database connection file
include '../make_connect_db.php';
//fetching data in descending order (lastest entry first)
$result = $dbConn->query("SELECT * FROM show_time");
?>

<html>
<head>	
	<title>Show time</title>
</head>

<body>
<a href="add.html">Add New Data</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Showtime ID</td>
		<td>Movie ID</td>
		<td>Date week ID</td>
		<td>Screen ID</td>
		<td>Num of people</td>
	</tr>
	<?php 	
	while($row = $result->fetch(PDO::FETCH_ASSOC)) { 		
		echo "<tr>";
		echo "<td>".$row['sid']."</td>";
		echo "<td>".$row['mid']."</td>";
		echo "<td>".$row['did']."</td>";	
		echo "<td>".$row['sid']."</td>";
		echo "<td>".$row['num_people']."</td>";
 		echo "<td><a href=\"edit.php?sid=$row[sid]\">Edit</a> | <a href=\"delete.php?sid=$row[sid]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>
