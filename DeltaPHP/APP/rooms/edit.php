<?php

include_once("config.php");
if(isset($_POST['update']))
{	
    $RoomID = $_POST['RoomID'];
    $BuildingID = $_POST['BuildingID'];
    $RoomNumber = $_POST['RoomNumber'];
    $Capacity = $_POST['Capacity'];
	
	
    if(empty($RoomID) || empty($BuildingID) || empty($RoomNumber) || empty($Capacity)) {	
			
        if(empty($RoomID)) {
			echo "<font color='red'>Room ID field is empty.</font><br/>";
		}
		
		if(empty($BuildingID)) {
			echo "<font color='red'>Building ID field is empty.</font><br/>";
		}
		
		if(empty($RoomNumber)) {
			echo "<font color='red'>RoomNumber field is empty.</font><br/>";
		}
		
		if(empty($Capacity)) {
		    echo "<font color='red'>Capacity field is empty.</font><br/>";
		}
	} else {	
		
	    $sql = "UPDATE rooms SET RoomID='$RoomID', BuildingID='$BuildingID', RoomNumber='$RoomNumber', Capacity='$Capacity' WHERE RoomID='$RoomID'";
		$query = $dbConn->prepare($sql);				
		$query->execute();
		
		
		header("Location: index.php");
	}
}
?>
<?php

$RoomID = $_GET['RoomID'];

$sql = "SELECT * FROM rooms WHERE RoomID=:RoomID";
$query = $dbConn->prepare($sql);
$query->execute(array(':RoomID' => $RoomID));
while($row = $query->fetch(PDO::FETCH_ASSOC))
{
    $RoomID = $row['RoomID'];
    $BuildingID = $row['BuildingID'];
    $RoomNumber = $row['RoomNumber'];
    $Capacity = $row['Capacity'];
    
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<h1>EDIT DATA</h1>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Room ID</td>
				<td><input type="text" name="RoomID" value="<?php echo $_GET['RoomID'];?>"></td>
			</tr>
			<tr> 
				<td>BuildingID</td>
				<td><input type="text" name="BuildingID" value="<?php echo $BuildingID;?>"></td>
			</tr>
			<tr> 
				<td>RoomNumber</td>
				<td><input type="text" name="RoomNumber" value="<?php echo $RoomNumber;?>"></td>
			</tr>
			<tr> 
				<td>Capacity</td>
				<td><input type="text" name="Capacity" value="<?php echo $Capacity;?>"></td>
			</tr>
			
			<tr>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>