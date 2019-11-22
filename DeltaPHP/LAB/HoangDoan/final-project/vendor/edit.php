<?php
// including the database connection file
include_once ("config.php");

if (isset($_POST['update'])) {
    $vendorID = $_POST['vendorID'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $contact = $_POST['contact'];
    
    print("$name $phone $contact");

    // checking empty fields
    if (empty($vendorID) || empty($name) || empty($phone) || empty($contact)) {
        if (empty($vendorID)) {
            echo "<font color='red'>Vendor ID field is empty.</font><br/>";
        }

        if (empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }

        if (empty($phone)) {
            echo "<font color='red'>Phone field is empty.</font><br/>";
        }

        if (empty($contact)) {
            echo "<font color='red'>Contact field is empty.</font><br/>";
        }
    } else {
        // updating the table
        $sql = "UPDATE vendors SET VendorID='$vendorID', Name='$name', Phone='$phone', Contact='$contact' WHERE VendorID='$vendorID'";
        $query = $dbConn->prepare($sql);
        $query->execute();

        // Alternative to above bindparam and execute
        // $query->execute(array(':vendorID' => $vendorID, ':name' => $name, ':phone' => $phone, ':contact' => $contact));
        header("Location: index.php");
    }
}
?>
<?php
// getting id from url
$vendorID = $_GET['vendorID'];

// selecting data associated with this particular id
$sql = "SELECT * FROM vendors WHERE VendorID=:vendorID";
$query = $dbConn->prepare($sql);
$query->execute(array(
    ':vendorID' => $vendorID
));

while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $vendorID = $row['VendorID'];
    $name = $row['Name'];
    $phone = $row['Phone'];
    $contact = $row['Contact'];
    // $contact = 999;
}
?>

<?php
include 'header.php'; // Contains HTML for header
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
							<label>ID (disabled)</label> <input type="text" 
								class="form-control" disabled="" placeholder="vendorID"
								value="<?php echo $_GET['vendorID'];?>">
						</div>
					</div>
					<div class="col-md-6 pr-1">
						<div class="form-group">
							<label>Name</label> <input type="text" class="form-control" name="name" 
								placeholder="name" value="<?php echo $name;?>">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 pr-1">
						<div class="form-group">
							<label>Phone</label> <input type="text" class="form-control" name="phone"
								placeholder="phone" value="<?php echo $phone;?>">
						</div>
					</div>
					<div class="col-md-6 pl-1">
						<div class="form-group">
							<label>Contact</label> <input type="text" class="form-control" name="contact"
								placeholder="contact" value="<?php echo $contact;?>">
						</div>
					</div>
				</div>
				
				<input type="hidden"
								name="vendorID" 
								value="<?php echo $_GET['vendorID'];?>"/>

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
include 'footer.php'; // Contains HTML for header
?>
