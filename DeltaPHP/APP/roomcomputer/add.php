<?php

include_once("config.php");
if(isset($_POST['Submit'])) {	
    $RoomID = $_POST['RoomID'];
    $BuildingID = $_POST['BuildingID'];
	$ComputerID = $_POST['ComputerID'];
	$Count = $_POST['Count'];
		
	
	if(empty($RoomID) || empty($BuildingID) || empty($ComputerID) || empty($Count)) {
				
	    if(empty($RoomID)) {
			echo "<font color='red'>RoomID field is empty.</font><br/>";
		}
		
		if(empty($BuildingID)) {
			echo "<font color='red'>BuildingID field is empty.</font><br/>";
		}
		
		if(empty($ComputerID)) {
			echo "<font color='red'>ComputerID field is empty.</font><br/>";
		}
		
		if(empty($Count)) {
		    echo "<font color='red'>Count field is empty.</font><br/>";
		}
		
	
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
			
		$sql = "INSERT INTO RoomComputers(RoomID, BuildingID, ComputerID, Count) VALUES(:RoomID, :BuildingID, :ComputerID, :Count)";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':RoomID', $RoomID);
		$query->bindparam(':BuildingID', $BuildingID);
		$query->bindparam(':ComputerID', $ComputerID);
		$query->bindparam(':Count', $Count);
		$query->execute();
		
		
		
	
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>

<?php
include '../header.php'; // Contains HTML for header
?>

<body>
	<a href="index.php">Home</a>


	<!-- begin table -->

	<div class="col-md-8">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Add new</h4>
			</div>
			<div class="card-body">
				<form action="add.php" method="post" name="form1">
					<div class="row">
						<div class="col-md-5 pr-1">
							<div class="form-group">
								<label>RoomID</label> <input type="text" name="RoomID"
									class="form-control" placeholder="RoomID">
							</div>
						</div>
						<div class="col-md-6 pr-1">
							<div class="form-group">
								<label>BuildingID</label> <input type="text" class="form-control"
									name="BuildingID" placeholder="BuildingID">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 pr-1">
							<div class="form-group">
								<label>ComputerID</label> <input type="text" class="form-control"
									name="ComputerID" placeholder="ComputerID">
							</div>
						</div>
						<div class="col-md-6 pl-1">
							<div class="form-group">
								<label>Count</label> <input type="text" class="form-control"
									name="Count" placeholder="Count">
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

