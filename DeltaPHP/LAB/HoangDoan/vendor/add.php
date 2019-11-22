<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
    $vendorID = $_POST['vendorID'];
    $name = $_POST['name'];
	$phone = $_POST['phone'];
	$contact = $_POST['contact'];
		
	// checking empty fields
	if(empty($vendorID) || empty($name) || empty($phone) || empty($contact)) {
				
	    if(empty($vendorID)) {
			echo "<font color='red'>Vendor ID field is empty.</font><br/>";
		}
		
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($phone)) {
			echo "<font color='red'>Phone field is empty.</font><br/>";
		}
		
		if(empty($contact)) {
		    echo "<font color='red'>Contact field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database		
		$sql = "INSERT INTO vendors(VendorID, Name, Phone, Contact) VALUES(:VendorID, :Name, :Phone, :Contact)";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':VendorID', $vendorID);
		$query->bindparam(':Name', $name);
		$query->bindparam(':Phone', $phone);
		$query->bindparam(':Contact', $contact);
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
