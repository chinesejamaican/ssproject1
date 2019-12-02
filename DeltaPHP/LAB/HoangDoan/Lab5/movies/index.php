<?php
// including the database connection file
include '../make_connect_db.php';
// fetching data in descending order (lastest entry first)
$result = $dbConn->query("SELECT * FROM moives");
?>


<a href="add.html">Add New Data</a>
<br />
<br />

<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Movie ID</td>
		<td>Title</td>
		<td>Genre</td>
		<td>Length</td>
	</tr>
	<?php
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>" . $row['mid'] . "</td>";
    echo "<td>" . $row['title'] . "</td>";
    echo "<td>" . $row['genre'] . "</td>";
    echo "<td>" . $row['length'] . "</td>";
    echo "<td><a href=\"edit.php?mid=$row[mid]\">Edit</a> | <a href=\"delete.php?mid=$row[mid]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
}
?>