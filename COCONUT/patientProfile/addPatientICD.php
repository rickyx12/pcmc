<?php
include("../../myDatabase.php");
$registrationNo = $_GET['registrationNo'];
$icdCode = $_GET['icdCode'];
$diagnosis = $_GET['diagnosis'];
$username = $_GET['username'];
$ro = new database();


$ro->addICD2patient($icdCode,$diagnosis,$username,$registrationNo);

?>
