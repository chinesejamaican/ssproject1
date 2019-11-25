<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$vendorID = $_GET['vendorID'];
//deleting the row from table
$sql = "DELETE FROM vendors WHERE VendorID=:vendorID";
$query = $dbConn->prepare($sql);
$query->execute(array(':vendorID' => $vendorID));

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>
