<?php
// including the database connection file
include_once ("config.php");

// fetching data in descending order (lastest entry first)
$result = $dbConn->query("SELECT * FROM buildings ORDER BY BuildingID");

include '../header.php'; // Contains HTML for header
?>
<a href="add.php">Add new</a>
<div class="content">
	<div class="container-fluid">
		<div class="row">

			<!--  table -->
			<div class="col-md-12">
				<div class="card strpied-tabled-with-hover">
					<div class="card-header ">
						<h4 class="card-title">Buildings</h4>
						<p class="card-category">Here is a subtitle for this table</p>
					</div>
					<div class="card-body table-full-width table-responsive">
						<table class="table table-hover table-striped">
							<thead>
								<td>Building ID</td>
								<td>Building Number</td>
								<td>BuildingName</td>

							</thead>
							<tbody>
												<?php
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row['BuildingID'] . "</td>";
                echo "<td>" . $row['BuildingNo'] . "</td>";
                echo "<td>" . $row['BuildingName'] . "</td>";

                echo "<td><a href=\"edit.php?BuildingID=$row[BuildingID]\">Edit</a> | <a href=\"delete.php?BuildingID=$row[BuildingID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
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