<?php
include_once ("config.php");
if (isset($_POST['update'])) {
    $ComputerID = $_POST['ComputerID'];
    $VendorID = $_POST['VendorID'];
    $Model = $_POST['Model'];
    $MemorySize = $_POST['MemorySize'];
    $StoragesSize = $_POST['StoragesSize'];

    if (empty($ComputerID) || empty($VendorID) || empty($Model) || empty($MemorySize) || empty($StoragesSize)) {

        if (empty($ComputerID)) {
            echo "<font color='red'>ComputerID field is empty.</font><br/>";
        }

        if (empty($VendorID)) {
            echo "<font color='red'>VendorID field is empty.</font><br/>";
        }

        if (empty($Model)) {
            echo "<font color='red'>Model field is empty.</font><br/>";
        }

        if (empty($MemorySize)) {
            echo "<font color='red'>MemorySize field is empty.</font><br/>";
        }
        if (empty($StoragesSize)) {
            echo "<font color='red'>StoragesSize field is empty.</font><br/>";
        }
    } else {

        $sql = "UPDATE Computers SET ComputerID='$ComputerID', VendorID='$VendorID', Model='$Model', MemorySize='$MemorySize', StoragesSize='$StoragesSize' WHERE ComputerID='$ComputerID'";
        $query = $dbConn->prepare($sql);
        $query->execute();

        header("Location: index.php");
    }
}
?>
<?php

$ComputerID = $_GET['ComputerID'];

$sql = "SELECT * FROM Computers WHERE ComputerID=:ComputerID";
$query = $dbConn->prepare($sql);
$query->execute(array(
    ':ComputerID' => $ComputerID
));
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $ComputerID = $row['ComputerID'];
    $VendorID = $row['VendorID'];
    $Model = $row['Model'];
    $MemorySize = $row['MemorySize'];
    $StoragesSize = $row['StoragesSize'];
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
							<label>ComputerID (disabled)</label> <input type="text"
								class="form-control" disabled="" placeholder="ComputerID"
								value="<?php echo $_GET['ComputerID'];?>">
						</div>
					</div>
					<div class="col-md-6 pr-1">
						<div class="form-group">
							<label>VendorID</label> <input type="text" class="form-control"
								name="VendorID" placeholder="VendorID"
								value="<?php echo $VendorID;?>">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 pr-1">
						<div class="form-group">
							<label>Model</label> <input type="text" class="form-control"
								name="Model" placeholder="Model" value="<?php echo $Model;?>">
						</div>
					</div>
					<div class="col-md-6 pl-1">
						<div class="form-group">
							<label>StoragesSize</label> <input type="text"
								class="form-control" name="StoragesSize"
								placeholder="StoragesSize" value="<?php echo $StoragesSize;?>">
						</div>
					</div>
					<div class="col-md-6 pl-1">
						<div class="form-group">
							<label>MemorySize</label> <input type="text" class="form-control"
								name="MemorySize" placeholder="MemorySize"
								value="<?php echo $MemorySize;?>">
						</div>

					</div>
				</div>

				<input type="hidden" name="ComputerID"
					value="<?php echo $_GET['ComputerID'];?>" />

				<button type="submit" class="btn btn-info btn-fill pull-right"
					name="update" value="Update">Update</button>
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