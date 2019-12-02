<?php
/**
 * @author HoangDoan
 */
//including the database connection file
include '../make_connect_db.php';

if(isset($_POST['update']))
{	
    $tid = $_POST['tid'];
    $title = $_POST['title'];
    $location = $_POST['location'];
    
	// checking empty fields
    if(empty($tid) || empty($title) || empty($location)) {	
			
        if(empty($tid)) {
			echo "<font color='red'>ID field is empty.</font><br/>";
		}
		
		if(empty($title)) {
			echo "<font color='red'>Title field is empty.</font><br/>";
		}
		
		if(empty($location)) {
			echo "<font color='red'>Location field is empty.</font><br/>";
		}
	} else {	
		//updating the table
	    $sql = "UPDATE theater SET tid='$tid', title='$title', location='$location' WHERE tid='$tid'";
		$query = $dbConn->prepare($sql);				
		$query->execute();
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$tid = $_GET['tid'];

//selecting data associated with this particular id
$sql = "SELECT * FROM theater WHERE tid=:tid";
$query = $dbConn->prepare($sql);
$query->execute(array(':tid' => $tid));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
    $tid = $row['tid'];
    $title = $row['title'];
    $location = $row['location'];
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
				<td>Theater ID</td>
				<td><input disabled name="tid" value="<?php echo $_GET['tid'];?>"></td>
			</tr>
			<tr> 
				<td>Title</td>
				<td><input type="text" name="title" value="<?php echo $title;?>"></td>
			</tr>
			<tr> 
				<td>Location</td>
				<td><input type="text" name="location" value="<?php echo $location;?>"></td>
			</tr>
			
			<tr>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
