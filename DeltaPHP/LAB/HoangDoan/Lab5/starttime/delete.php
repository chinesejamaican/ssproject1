<?php
//including the database connection file
include '../make_connect_db.php';

//getting id of the data from url
$stid = $_GET['stid'];
//deleting the row from table
$sql = "DELETE FROM start_time WHERE stid=:stid";
$query = $dbConn->prepare($sql);
$query->execute(array(':stid' => $stid));

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>
