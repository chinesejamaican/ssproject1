<?php

include_once("config.php");
if(isset($_POST['update']))
{	
    $RoomID = $_POST['RoomID'];
    $BuildingID = $_POST['BuildingID'];
    $ComputerID = $_POST['ComputerID'];
    $Count = $_POST['Count'];
	
	
    if(empty($RoomID) || empty($BuildingID) || empty($ComputerID) || empty($Count)) {	
			
        if(empty($RoomID)) {
			echo "<font color='red'>Room ID field is empty.</font><br/>";
		}
		
		if(empty($BuildingID)) {
			echo "<font color='red'>Building ID field is empty.</font><br/>";
		}
		
		if(empty($ComputerID)) {
			echo "<font color='red'>ComputerID field is empty.</font><br/>";
		}
		
		if(empty($Count)) {
		    echo "<font color='red'>Count field is empty.</font><br/>";
		}
	} else {	
		
	    $sql = "UPDATE roomcomputers SET RoomID='$RoomID', BuildingID='$BuildingID', ComputerID='$ComputerID', Count='$Count' WHERE RoomID='$RoomID'";
		$query = $dbConn->prepare($sql);				
		$query->execute();
		
		
		header("Location: index.php");
	}	
}
?>
<?php

$RoomID = $_GET['RoomID'];

$sql = "SELECT * FROM roomcomputers WHERE RoomID=:RoomID";
$query = $dbConn->prepare($sql);
$query->execute(array(':RoomID' => $RoomID));
while($row = $query->fetch(PDO::FETCH_ASSOC))
{
    $RoomID = $row['RoomID'];
    $BuildingID = $row['BuildingID'];
    $ComputerID = $row['ComputerID'];
    $Count = $row['Count'];
    
}
?>

<?php
include '../header.php'; // Contains HTML for header
?>
<!-- begin table -->

<div class="col-md-8">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Edit Vendor</h4>
		</div>
		<div class="card-body">
			<form name="form1" method="post" action="edit.php">
				<div class="row">
					<div class="col-md-5 pr-1">
						<div class="form-group">
							<label>RoomID (disabled)</label> <input type="text" 
								class="form-control" disabled="" placeholder="RoomID"
								value="<?php echo $_GET['RoomID'];?>">
						</div>
					</div>
					<div class="col-md-6 pr-1">
						<div class="form-group">
							<label>BuildingID</label> <input type="text" class="form-control" name="BuildingID" 
								placeholder="BuildingID" value="<?php echo $BuildingID;?>">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 pr-1">
						<div class="form-group">
							<label>ComputerID</label> <input type="text" class="form-control" name="ComputerID"
								placeholder="ComputerID" value="<?php echo $ComputerID;?>">
						</div>
					</div>
					<div class="col-md-6 pl-1">
						<div class="form-group">
							<label>Count</label> <input type="text" class="form-control" name="Count"
								placeholder="Count" value="<?php echo $Count;?>">
						</div>
					</div>
				</div>
				
				<input type="hidden"
								name="RoomID" 
								value="<?php echo $_GET['RoomID'];?>"/>

				<button type="submit" class="btn btn-info btn-fill pull-right" name="update" value="Update" >Update
			    </button>
				<div class="clearfix"></div>
			</form>
		</div>
	</div>
</div>
<!-- end table -->
<a href="index.php">Back</a>
<?php
include '../footer.php'; // Contains HTML for header
?>
