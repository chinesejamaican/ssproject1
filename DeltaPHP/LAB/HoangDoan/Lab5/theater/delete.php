<?php
//including the database connection file
include '../make_connect_db.php';

//getting id of the data from url
$tid = $_GET['tid'];
//deleting the row from table
$sql = "DELETE FROM theater WHERE tid=:tid";
$query = $dbConn->prepare($sql);
$query->execute(array(':tid' => $tid));

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>
