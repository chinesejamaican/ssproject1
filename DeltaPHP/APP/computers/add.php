<?php

include_once("config.php");
if(isset($_POST['Submit'])) {	
    $ComputerID = $_POST['ComputerID'];
    $VendorID = $_POST['VendorID'];
	$Model = $_POST['Model'];
	$MemorySize = $_POST['MemorySize'];
	$StoragesSize = $_POST['StoragesSize'];
		
	
	if(empty($ComputerID) || empty($VendorID) || empty($Model) || empty($MemorySize) || empty($StoragesSize)) {
				
	    if(empty($ComputerID)) {
			echo "<font color='red'>ComputerID ID field is empty.</font><br/>";
		}
		
		if(empty($VendorID)) {
			echo "<font color='red'>VendorID field is empty.</font><br/>";
		}
		
		if(empty($Model)) {
			echo "<font color='red'>Model field is empty.</font><br/>";
		}
		
		if(empty($MemorySize)) {
		    echo "<font color='red'>MemorySize field is empty.</font><br/>";
		}
		if(empty($StoragesSize)) {
		    echo "<font color='red'>StoragesSize field is empty.</font><br/>";
		}
	
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
			
		$sql = "INSERT INTO Computers (ComputerID, VendorID, Model, MemorySize, StoragesSize) VALUES(:ComputerID, :VendorID, :Model, :MemorySize, :StoragesSize)";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':ComputerID', $ComputerID);
		$query->bindparam(':VendorID', $VendorID);
		$query->bindparam(':Model', $Model);
		$query->bindparam(':MemorySize', $MemorySize);
		$query->bindparam(':StoragesSize', $StoragesSize);
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
								<label>ComputerID</label> <input type="text" name="ComputerID"
									class="form-control" placeholder="ComputerID">
							</div>
						</div>
						<div class="col-md-6 pr-1">
							<div class="form-group">
								<label>VendorID</label> <input type="text" class="form-control"
									name="VendorID" placeholder="VendorID">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 pr-1">
							<div class="form-group">
								<label>Model</label> <input type="text" class="form-control"
									name="Model" placeholder="Model">
							</div>
						</div>
						<div class="col-md-6 pl-1">
							<div class="form-group">
								<label>MemorySize</label> <input type="text" class="form-control"
									name="MemorySize" placeholder="MemorySize">
							</div>
						</div>
						<div class="col-md-6 pl-1">
							<div class="form-group">
								<label>StoragesSize</label> <input type="text" class="form-control"
									name="StoragesSize" placeholder="StoragesSize">
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

