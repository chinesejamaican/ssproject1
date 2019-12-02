<?php
//including the database connection file
include '../make_connect_db.php';

//getting id of the data from url
$pid = $_GET['pid'];
//deleting the row from table
$sql = "DELETE FROM price WHERE pid=:pid";
$query = $dbConn->prepare($sql);
$query->execute(array(':pid' => $pid));

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>
