<?php

include("config.php");


$ComputeID = $_GET['ComputerID'];

$sql = "DELETE FROM Computers WHERE ComputerID=:ComputeID";
$query = $dbConn->prepare($sql);
$query->execute(array(':ComputeID' => $ComputeID));
header("Location:index.php");
?>