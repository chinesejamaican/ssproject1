<?php
//including the database connection file
include '../make_connect_db.php';

//getting id of the data from url
$did = $_GET['did'];
//deleting the row from table
$sql = "DELETE FROM date_of_week WHERE did=:did";
$query = $dbConn->prepare($sql);
$query->execute(array(':did' => $did));

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>
