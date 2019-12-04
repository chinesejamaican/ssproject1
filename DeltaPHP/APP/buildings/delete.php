<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$BuildingID = $_GET['BuildingID'];

//deleting the row from table
$sql = "DELETE FROM Buildings WHERE BuildingID=:BuildingID";
$query = $dbConn->prepare($sql);
$query->execute(array(':BuildingID' => $BuildingID));

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>
