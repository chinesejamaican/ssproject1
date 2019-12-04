<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
    $BuildingID = $_POST['BuildingID'];
    $BuildingNo = $_POST['BuildingNo'];
    $BuildingName = $_POST['BuildingName'];
		
	// checking empty fields
	if(empty($BuildingID) || empty($BuildingNo) || empty($BuildingName)) {	
			
        if(empty($BuildingID)) {
			echo "<font color='red'>Building ID field is empty.</font><br/>";
		}
		
		if(empty($BuildingNo)) {
			echo "<font color='red'>BuildingNo is empty.</font><br/>";
		}
		
		if(empty($BuildingName)) {
			echo "<font color='red'>BuildingName is empty.</font><br/>";
		}
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database		
		$sql = "INSERT INTO Buildings(BuildingID, BuildingNo , BuildingName) VALUES(:BuildingID, :BuildingNo, :BuildingName)";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':BuildingID', $BuildingID);
		$query->bindparam(':BuildingNo', $BuildingNo);
		$query->bindparam(':BuildingName', $BuildingName);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':name' => $name, ':email' => $email, ':age' => $age));
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>


<?php
include '../header.php'; // Contains HTML for header
?>

<body>
	<a href="index.php">Home</a>


	<!-- begin table -->

	<div class="col-md-8">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Add a vendor</h4>
			</div>
			<div class="card-body">
				<form action="add.php" method="post" name="form1">
					<div class="row">
						<div class="col-md-5 pr-1">
							<div class="form-group">
								<label>BuildingID</label> <input type="text" name="BuildingID"
									class="form-control" placeholder="BuildingID">
							</div>
						</div>
						<div class="col-md-6 pr-1">
							<div class="form-group">
								<label>BuildingNo</label> <input type="text" class="form-control"
									name="BuildingNo" placeholder="BuildingNo">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 pr-1">
							<div class="form-group">
								<label>BuildingName</label> <input type="text" class="form-control"
									name="BuildingName" placeholder="BuildingName">
							</div>
						</div>
					</div>
					<button type="submit" name="Submit" value="Add"
						class="btn btn-info btn-fill pull-right">Submit</button>
					<div class="clearfix"></div>
				</form>
			</div>
		</div>
	</div>
	<!-- end table -->

<?php
include '../footer.php'; // Contains HTML for header
?>
