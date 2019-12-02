<?php
include '../make_connect_db.php';

if(isset($_POST['update']))
{	
    $did = $_POST['did'];
    $day = $_POST['day'];
	
	// checking empty fields
    if(empty($did) || empty($day)) {	
			
        if(empty($did)) {
			echo "<font color='red'>ID field is empty.</font><br/>";
		}
		
	
		if(empty($day)) {
		    echo "<font color='red'>day field is empty.</font><br/>";
		}
	} else {	
		//updating the table
	    $sql = "UPDATE date_of_week SET did='$did', day='$day' WHERE did='$did'";
		$query = $dbConn->prepare($sql);				
		$query->execute();
		
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$did = $_GET['did'];

//selecting data associated with this particular id
$sql = "SELECT * FROM date_of_week WHERE did=:did";
$query = $dbConn->prepare($sql);
$query->execute(array(':did' => $did));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
    $did = $row['did'];
    $day = $row['day'];
    //$day = 999;
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
				<td><input type="hidden" name="did" value="<?php echo $_GET['did'];?>"></td>
			</tr>
			<tr> 
				<td>day</td>
				<td><input type="text" name="day" value="<?php echo $day;?>"></td>
			</tr>
			
			<tr>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
