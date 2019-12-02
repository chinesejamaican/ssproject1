<?php
//including the database connection file
include '../make_connect_db.php';

if(isset($_POST['update']))
{	
    $sid = $_POST['sid'];
    $tid = $_POST['tid'];
    $seats = $_POST['seats'];
	
	// checking empty fields
    if(empty($sid) || empty($tid) || empty($seats)) {	
			
        if(empty($sid)) {
			echo "<font color='red'>SID field is empty.</font><br/>";
		}
		
		if(empty($tid)) {
			echo "<font color='red'>TID field is empty.</font><br/>";
		}
		
		if(empty($seats)) {
			echo "<font color='red'>seats field is empty.</font><br/>";
		}
	
	} else {	
		//updating the table
	    $sql = "UPDATE screen SET sid='$sid', tid='$tid', seats='$seats' WHERE sid='$sid'";
		$query = $dbConn->prepare($sql);				
		$query->execute();

		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$sid = $_GET['sid'];

//selecting data associated with this particular id
$sql = "SELECT * FROM screen WHERE sid=:sid";
$query = $dbConn->prepare($sql);
$query->execute(array(':sid' => $sid));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
    $sid = $row['sid'];
    $tid = $row['tid'];
    $seats = $row['seats'];
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
				<td>SID</td>
				<td><input type="hidden" name="sid" value="<?php echo $_GET['sid'];?>"></td>
			</tr>
			<tr> 
				<td>TID</td>
				<td><input type="text" name="tid" value="<?php echo $tid;?>"></td>
			</tr>
			<tr> 
				<td>seats</td>
				<td><input type="text" name="seats" value="<?php echo $seats;?>"></td>
			</tr>
			<tr>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
