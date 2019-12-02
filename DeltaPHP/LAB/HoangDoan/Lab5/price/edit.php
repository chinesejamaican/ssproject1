<?php
//including the database connection file
include '../make_connect_db.php';

if(isset($_POST['update']))
{	
    $pid = $_POST['pid'];
    $cost = $_POST['cost'];
	
	// checking empty fields
    if(empty($pid) || empty($cost)) {	
			
        if(empty($pid)) {
			echo "<font color='red'>ID field is empty.</font><br/>";
		}
		
		if(empty($cost)) {
			echo "<font color='red'>cost field is empty.</font><br/>";
		}
		
	} else {	
		//updating the table
	    $sql = "UPDATE price SET pid='$pid', cost='$cost' WHERE pid='$pid'";
		$query = $dbConn->prepare($sql);				
		$query->execute();
		
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$pid = $_GET['pid'];

//selecting data associated with this particular id
$sql = "SELECT * FROM price WHERE pid=:pid";
$query = $dbConn->prepare($sql);
$query->execute(array(':pid' => $pid));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
    $pid = $row['pid'];
    $cost = $row['cost'];
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
				<td>ID</td>
				<td><input type="hidden" name="pid" value="<?php echo $_GET['pid'];?>"></td>
			</tr>
			<tr> 
				<td>cost</td>
				<td><input type="text" name="cost" value="<?php echo $cost;?>"></td>
			</tr>
			<tr>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
