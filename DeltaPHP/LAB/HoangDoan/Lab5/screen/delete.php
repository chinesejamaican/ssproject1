<?php
//including the database connection file
include '../make_connect_db.php';

//getting id of the data from url
$sid = $_GET['sid'];
//deleting the row from table
$sql = "DELETE FROM screen WHERE sid=:sid";
$query = $dbConn->prepare($sql);
$query->execute(array(':sid' => $sid));

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>
