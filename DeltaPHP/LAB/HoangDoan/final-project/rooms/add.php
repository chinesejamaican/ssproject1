<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php

include_once("config.php");
if(isset($_POST['Submit'])) {	
    $RoomID = $_POST['RoomID'];
    $BuildingID = $_POST['BuildingID'];
	$RoomNumber = $_POST['RoomNumber'];
	$Capacity = $_POST['Capacity'];
		
	
	if(empty($RoomID) || empty($BuildingID) || empty($RoomNumber) || empty($Capacity)) {
				
	    if(empty($RoomID)) {
			echo "<font color='red'>Vendor ID field is empty.</font><br/>";
		}
		
		if(empty($BuildingID)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($RoomNumber)) {
			echo "<font color='red'>RoomNumber field is empty.</font><br/>";
		}
		
		if(empty($Capacity)) {
		    echo "<font color='red'>Contact field is empty.</font><br/>";
		}
		
	
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
			
		$sql = "INSERT INTO rooms(RoomID, BuildingID, RoomNumber, Capacity) VALUES(:RoomID, :BuildingID, :RoomNumber, :Capacity)";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':RoomID', $RoomID);
		$query->bindparam(':BuildingID', $BuildingID);
		$query->bindparam(':RoomNumber', $RoomNumber);
		$query->bindparam(':Capacity', $Capacity);
		$query->execute();
		
		
		
	
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>