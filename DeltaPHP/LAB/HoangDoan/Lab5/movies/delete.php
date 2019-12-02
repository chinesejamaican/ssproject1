<?php
//including the database connection file
include '../make_connect_db.php';

//getting id of the data from url
$mid = $_GET['mid'];
//deleting the row from table
$sql = "DELETE FROM moives WHERE mid=:mid";
$query = $dbConn->prepare($sql);
$query->execute(array(':mid' => $mid));

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>
