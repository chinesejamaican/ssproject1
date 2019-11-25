<?php
// including the database connection file
include_once ("config.php");

// fetching data in descending order (lastest entry first)
$result = $dbConn->query("SELECT * FROM vendors ORDER BY VendorID ASC");

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
									<h4 class="card-title">Vendor</h4>
									<p class="card-category">Here is a subtitle for this table</p>
								</div>
								<div class="card-body table-full-width table-responsive">
									<table class="table table-hover table-striped">
										<thead>
											<th>Vendor ID</th>
											<th>Name</th>
											<th>Phone</th>
											<th>Contact</th>
										</thead>
										<tbody>
											<?php
                                              while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                                echo "<tr>";
                                                echo "<td>" . $row['VendorID'] . "</td>";
                                                echo "<td>" . $row['Name'] . "</td>";
                                                echo "<td>" . $row['Phone'] . "</td>";
                                                echo "<td>" . $row['Contact'] . "</td>";
                                                echo "<td><a href=\"edit.php?vendorID=$row[VendorID]\">Edit</a> | <a href=\"delete.php?vendorID=$row[VendorID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
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
