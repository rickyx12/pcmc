<?php
include("../../myDatabase.php");
$show = $_GET['show'];
$description = $_GET['description'];
$username = $_GET['username'];
$ro = new database();

$ro->getMasterListPatientRecord($username,$show,$description);

?>
