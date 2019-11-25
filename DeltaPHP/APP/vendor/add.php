<?php
// including the database connection file
include_once ("config.php");

if (isset($_POST['Submit'])) {
    $vendorID = $_POST['vendorID'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $contact = $_POST['contact'];

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

        // link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {
        // if all the fields are filled (not empty)

        // insert data to database
        $sql = "INSERT INTO vendors(VendorID, Name, Phone, Contact) VALUES(:VendorID, :Name, :Phone, :Contact)";
        $query = $dbConn->prepare($sql);

        $query->bindparam(':VendorID', $vendorID);
        $query->bindparam(':Name', $name);
        $query->bindparam(':Phone', $phone);
        $query->bindparam(':Contact', $contact);
        $query->execute();

        // Alternative to above bindparam and execute
        // $query->execute(array(':name' => $name, ':email' => $email, ':age' => $age));

        // display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index.php'>View Result</a>";
    }
}
?>

<?php
include 'header.php'; // Contains HTML for header
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
								<label>ID</label> <input type="text" name="vendorID"
									class="form-control" placeholder="vendorID">
							</div>
						</div>
						<div class="col-md-6 pr-1">
							<div class="form-group">
								<label>Name</label> <input type="text" class="form-control"
									name="name" placeholder="name">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 pr-1">
							<div class="form-group">
								<label>Phone</label> <input type="text" class="form-control"
									name="phone" placeholder="phone">
							</div>
						</div>
						<div class="col-md-6 pl-1">
							<div class="form-group">
								<label>Contact</label> <input type="text" class="form-control"
									name="contact" placeholder="contact">
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
include 'footer.php'; // Contains HTML for header
?>
