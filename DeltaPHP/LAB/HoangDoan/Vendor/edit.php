<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	
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
	} else {	
		//updating the table
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
//getting id from url
$vendorID = $_GET['vendorID'];

//selecting data associated with this particular id
$sql = "SELECT * FROM vendors WHERE VendorID=:vendorID";
$query = $dbConn->prepare($sql);
$query->execute(array(':vendorID' => $vendorID));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
    $vendorID = $row['VendorID'];
    $name = $row['Name'];
    $phone = $row['Phone'];
    $contact = $row['Contact'];
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
				<td>Vendor ID</td>
				<td><input type="hidden" name="vendorID" value="<?php echo $_GET['vendorID'];?>"></td>
			</tr>
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>Phone</td>
				<td><input type="text" name="phone" value="<?php echo $phone;?>"></td>
			</tr>
			<tr> 
				<td>Contact</td>
				<td><input type="text" name="contact" value="<?php echo $contact;?>"></td>
			</tr>
			
			<tr>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
