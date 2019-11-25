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
