<?php
include 'dbconnect.php';
$obj = new DbConnect();
$obj->getDbEntertainmnet();
$dbConn = $obj->getPdo();
?>