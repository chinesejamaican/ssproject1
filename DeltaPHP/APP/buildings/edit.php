<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	
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
		
	} else {	
		//updating the table
	    $sql = "UPDATE buildings SET BuildingID='$BuildingID', BuildingNo='$BuildingNo', BuildingName='$BuildingName' WHERE BuildingID='$BuildingID'";
		$query = $dbConn->prepare($sql);				
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':vendorID' => $vendorID, ':name' => $name, ':phone' => $phone, ':contact' => $contact));
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$BuildingID = $_GET['BuildingID'];

//selecting data associated with this particular id
$sql = "SELECT * FROM buildings WHERE BuildingID=:BuildingID";
$query = $dbConn->prepare($sql);
$query->execute(array(':BuildingID' => $BuildingID));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
    $BuildingID = $row['BuildingID'];
    $BuildingNo = $row['BuildingNo'];
    $BuildingName = $row['BuildingName'];
    //$contact = 999;
}
?>

<?php
include '../header.php'; // Contains HTML for header
?>
<!-- begin table -->

<div class="col-md-8">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Edit</h4>
		</div>
		<div class="card-body">
			<form name="form1" method="post" action="edit.php">
				<div class="row">
					<div class="col-md-5 pr-1">
						<div class="form-group">
							<label>ID (disabled)</label> <input type="text" 
								class="form-control" disabled="" placeholder="BuildingID"
								value="<?php echo $_GET['BuildingID'];?>">
						</div>
					</div>
					<div class="col-md-6 pr-1">
						<div class="form-group">
							<label>Building Number</label> <input type="text" class="form-control" name="BuildingNo" 
								placeholder="BuildingNo" value="<?php echo $BuildingNo;?>">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 pr-1">
						<div class="form-group">
							<label>Building Name</label> <input type="text" class="form-control" name="BuildingName"
								placeholder="BuildingName" value="<?php echo $BuildingName;?>">
						</div>
					</div>
				</div>
				
				<input type="hidden"
								name="BuildingID" 
								value="<?php echo $_GET['BuildingID'];?>"/>

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
