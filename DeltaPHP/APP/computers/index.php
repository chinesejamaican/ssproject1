<?php
// including the database connection file
include_once ("config.php");

// fetching data in descending order (lastest entry first)

$result = $dbConn->query("SELECT * FROM Computers ORDER BY ComputerID ASC");

include '../header.php'; // Contains HTML for header
?>
<a href="add.php">Add NEW</a>
<div class="content">
	<div class="container-fluid">
		<div class="row">

			<!--  table -->
			<div class="col-md-12">
				<div class="card strpied-tabled-with-hover">
					<div class="card-header ">
						<h4 class="card-title">COMPUTERS</h4>
					</div>
					<div class="card-body table-full-width table-responsive">
						<table class="table table-hover table-striped">
							<thead>
								<td>Computer ID</td>
								<td>VendorID</td>
								<td>Model</td>
								<td>MemorySize</td>
								<td>StoragesSize</td>
							</thead>
							<tbody>
	<?php
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>" . $row['ComputerID'] . "</td>";
    echo "<td>" . $row['VendorID'] . "</td>";
    echo "<td>" . $row['Model'] . "</td>";
    echo "<td>" . $row['MemorySize'] . "</td>";
    echo "<td>" . $row['StoragesSize'] . "</td>";
    echo "<td><a href=\"edit.php?ComputerID=$row[ComputerID]\">Edit</a> | <a href=\"delete.php?RoomID=$row[ComputerID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
}
?>
									
										</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- -end table -->

		</div>
	</div>
</div>

<?php
include '../footer.php'; // Contains HTML for header
?>
