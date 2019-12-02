<?php
// including the database connection file
include '../make_connect_db.php';

if(isset($_POST['update']))
{	
    $mid = $_POST['mid'];
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $length = $_POST['length'];
	
	// checking empty fields
    if(empty($mid) || empty($title) || empty($genre) || empty($length)) {	
			
        if(empty($mid)) {
			echo "<font color='red'>ID field is empty.</font><br/>";
		}
		
		if(empty($title)) {
			echo "<font color='red'>Title field is empty.</font><br/>";
		}
		
		if(empty($genre)) {
			echo "<font color='red'>genre field is empty.</font><br/>";
		}
		
		if(empty($length)) {
		    echo "<font color='red'>length field is empty.</font><br/>";
		}
	} else {	
		//updating the table
	    $sql = "UPDATE moives SET mid='$mid', Name='$title', genre='$genre', length='$length' WHERE mid='$mid'";
		$query = $dbConn->prepare($sql);				
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':vendorID' => $mid, ':name' => $title, ':genre' => $genre, ':length' => $length));
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$mid = $_GET['mid'];

//selecting data associated with this particular id
$sql = "SELECT * FROM moives WHERE mid=:mid";
$query = $dbConn->prepare($sql);
$query->execute(array(':mid' => $mid));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
    $mid = $row['mid'];
    $title = $row['title'];
    $genre = $row['genre'];
    $length = $row['length'];
    //$length = 999;
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
				<td><input type="hidden" name="mid" value="<?php echo $_GET['mid'];?>"></td>
			</tr>
			<tr> 
				<td>Title</td>
				<td><input type="text" name="title" value="<?php echo $title;?>"></td>
			</tr>
			<tr> 
				<td>genre</td>
				<td><input type="text" name="genre" value="<?php echo $genre;?>"></td>
			</tr>
			<tr> 
				<td>length</td>
				<td><input type="text" name="length" value="<?php echo $length;?>"></td>
			</tr>
			
			<tr>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
