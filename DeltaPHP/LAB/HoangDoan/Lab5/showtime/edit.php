<?php
//including the database connection file
include '../make_connect_db.php';

if(isset($_POST['update']))
{	
    $sid = $_POST['sid'];
    $mid = $_POST['mid'];
    $did = $_POST['did'];
    $num_people = $_POST['num_people'];
	
	// checking empty fields
    if(empty($sid) || empty($mid) || empty($did) || empty($num_people)) {	
			
        if(empty($sid)) {
			echo "<font color='red'>Vendor ID field is empty.</font><br/>";
		}
		
		if(empty($mid)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($did)) {
			echo "<font color='red'>did field is empty.</font><br/>";
		}
		
		if(empty($num_people)) {
		    echo "<font color='red'>num_people field is empty.</font><br/>";
		}
	} else {	
		//updating the table
	    $sql = "UPDATE show_time SET sid='$sid', Name='$mid', did='$did', num_people='$num_people' WHERE sid='$sid'";
		$query = $dbConn->prepare($sql);				
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':sid' => $sid, ':name' => $mid, ':did' => $did, ':num_people' => $num_people));
		header("Location: index.php");
	}
}
?>

<?php
//getting id from url
$sid = $_GET['sid'];

//selecting data associated with this particular id
$sql = "SELECT * FROM show_time WHERE sid=:sid";
$query = $dbConn->prepare($sql);
$query->execute(array(':sid' => $sid));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
    $sid = $row['sid'];
    $mid = $row['mid'];
    $did = $row['did'];
    $num_people = $row['num_people'];
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
				<td>MID</td>
				<td><input type="text" name="mid" value="<?php echo $mid;?>"></td>
			</tr>
			<tr> 
				<td>DID</td>
				<td><input type="text" name="did" value="<?php echo $did;?>"></td>
			</tr>
			<tr> 
				<td>Num of People</td>
				<td><input type="text" name="num_people" value="<?php echo $num_people;?>"></td>
			</tr>
			
			<tr>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
