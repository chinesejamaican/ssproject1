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
				<td>Building ID</td>
				<td><input type="hidden" name="BuildingID" value="<?php echo $_GET['BuildingID'];?>"></td>
			</tr>
			<tr> 
				<td>Building Number</td>
				<td><input type="text" name="BuildingNo" value="<?php echo $BuildingNo;?>"></td>
			</tr>
			<tr> 
				<td>Buildin Name</td>
				<td><input type="text" name="BuildingName" value="<?php echo $BuildingName;?>"></td>
            </tr>
            <tr>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
