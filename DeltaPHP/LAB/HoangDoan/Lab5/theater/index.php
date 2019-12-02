<?php
//including the database connection file
include '../make_connect_db.php';
//fetching data in descending order (lastest entry first)
$result = $dbConn->query("SELECT * FROM theater");
?>

<html>
<head>	
	<title>THEATER</title>
</head>

<body>
<a href="add.html">Add New Data</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Theater ID</td>
		<td>Title</td>
		<td>Location</td>
	</tr>
	<?php 	
	while($row = $result->fetch(PDO::FETCH_ASSOC)) { 		
		echo "<tr>";
		echo "<td>".$row['tid']."</td>";
		echo "<td>".$row['title']."</td>";
		echo "<td>".$row['location']."</td>";		
 		echo "<td><a href=\"edit.php?tid=$row[tid]\">Edit</a> | <a href=\"delete.php?tid=$row[tid]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>
