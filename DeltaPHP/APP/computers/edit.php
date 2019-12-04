<?php

include_once("config.php");
if(isset($_POST['update']))
{	
    $ComputerID = $_POST['ComputerID'];
    $VendorID = $_POST['VendorID'];
    $Model = $_POST['Model'];
    $MemorySize = $_POST['MemorySize'];
	$StoragesSize = $_POST['StoragesSize'];
	
	
    if(empty($ComputerID) || empty($VendorID) || empty($Model) || empty($MemorySize) || empty($StoragesSize)) {	
			
        if(empty($ComputerID)) {
			echo "<font color='red'>ComputerID field is empty.</font><br/>";
		}
		
		if(empty($VendorID)) {
			echo "<font color='red'>VendorID field is empty.</font><br/>";
		}
		
		if(empty($Model)) {
			echo "<font color='red'>Model field is empty.</font><br/>";
		}
		
		if(empty($MemorySize)) {
		    echo "<font color='red'>MemorySize field is empty.</font><br/>";
		}
		if(empty($StoragesSize)) {
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
$query->execute(array(':ComputerID' => $ComputerID));
while($row = $query->fetch(PDO::FETCH_ASSOC))
{
    $ComputerID = $row['ComputerID'];
    $VendorID = $row['VendorID'];
    $Model = $row['Model'];
    $MemorySize = $row['MemorySize'];
	$StoragesSize = $row['StoragesSize'];
    
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
				<td>Computer ID</td>
				<td><input type="text" name="ComputerID" value="<?php echo $_GET['ComputerID'];?>"></td>
			</tr>
			<tr> 
				<td>VendorID</td>
				<td><input type="text" name="VendorID" value="<?php echo $VendorID;?>"></td>
			</tr>
			<tr> 
				<td>Model</td>
				<td><input type="text" name="Model" value="<?php echo $Model;?>"></td>
			</tr>
			<tr> 
				<td>MemorySize</td>
				<td><input type="text" name="MemorySize" value="<?php echo $MemorySize;?>"></td>
			</tr>
			<tr> 
				<td>StoragesSize</td>
				<td><input type="text" name="StoragesSize" value="<?php echo $StoragesSize;?>"></td>
			</tr>
			
			<tr>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>