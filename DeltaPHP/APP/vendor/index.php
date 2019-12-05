<?php
// including the database connection file
include_once ("config.php");

// fetching data in descending order (lastest entry first)
$sql = "SELECT * FROM vendors ORDER BY VendorID ASC";
$result = $dbConn->query($sql);

include '../header.php'; // Contains HTML for header
?>
			<div class="content">
				<div class="container-fluid">
					<div class="row">
					
						<!--  table -->
						<div class="col-md-12">
							<div class="card strpied-tabled-with-hover">
								<div class="card-header ">
									<h4 class="card-title">Vendor</h4>
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
											
											$btbClass = 'class = "btn btn-info btn-fill"';
											
											if ($result->fetchColumn() > 0) {
											    $sql = "SELECT * FROM vendors ORDER BY VendorID ASC";
											    foreach ($dbConn->query($sql) as $row){
											        echo "<tr>";
											        echo "<td>" . $row['VendorID'] . "</td>";
											        echo "<td>" . $row['Name'] . "</td>";
											        echo "<td>" . $row['Phone'] . "</td>";
											        echo "<td>" . $row['Contact'] . "</td>";
											        echo "<td><a $btbClass href=\"edit.php?vendorID=$row[VendorID]\">Edit</a>
                                                        </td>";
											        echo "<td><a $btbClass href=\"delete.php?vendorID=$row[VendorID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
											    }
											}
											else{
											    echo '<div class="alert alert-warning">
											    <button type="button" aria-hidden="true" class="close" data-dismiss="alert">
                                                   <i class="nc-icon nc-simple-remove"></i>
											    </button>
											    <span>
											    <b> Warning - </b> No records found</span>
											    </div>';
											}
														
                                            ?>     
									
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<!-- -end table -->

					</div>
					<a class="btn btn-info btn-fill pull-left" name="Add" value="Add" href="add.php">Add</a>
					<div class="clearfix"></div>
				</div>
			</div>

<?php 
include '../footer.php'; // Contains HTML for header
?>
