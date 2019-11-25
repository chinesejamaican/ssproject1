<?php

include("config.php");


$RoomID = $_GET['RoomID'];

$sql = "DELETE FROM rooms WHERE RoomID=:RoomID";
$query = $dbConn->prepare($sql);
$query->execute(array(':RoomID' => $RoomID));
header("Location:index.php");
?>