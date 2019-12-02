<?php
//including the database connection file
include '../make_connect_db.php';

if(isset($_POST['update']))
{	
    $stid = $_POST['stid'];
    $time = $_POST['time'];
    $pid = $_POST['pid'];
	
	// checking empty fields
    if(empty($stid) || empty($time) || empty($pid)) {	
			
        if(empty($stid)) {
			echo "<font color='red'>Vendor ID field is empty.</font><br/>";
		}
		
		if(empty($time)) {
			echo "<font color='red'>time field is empty.</font><br/>";
		}
		
		if(empty($pid)) {
			echo "<font color='red'>pid field is empty.</font><br/>";
		}
	} else {	
		//updating the table
	    $sql = "UPDATE start_time SET stid='$stid', time='$time', pid='$pid' WHERE stid='$stid'";
		$query = $dbConn->prepare($sql);				
		$query->execute();
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$stid = $_GET['stid'];

//selecting data associated with this particular id
$sql = "SELECT * FROM start_time WHERE stid=:stid";
$query = $dbConn->prepare($sql);
$query->execute(array(':stid' => $stid));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
    $stid = $row['stid'];
    $time = $row['time'];
    $pid = $row['pid'];
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
	
	<form time="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>ID</td>
				<td><input type="hidden" name="stid" value="<?php echo $_GET['stid'];?>"></td>
			</tr>
			<tr> 
				<td>Time</td>
				<td><input type="text" name="time" value="<?php echo $time;?>"></td>
			</tr>
			<tr> 
				<td>PID</td>
				<td><input type="text" name="pid" value="<?php echo $pid;?>"></td>
			</tr>
			
			<tr>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
