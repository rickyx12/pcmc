<?php
include("../../../myDatabase.php");

$icdCode = $_GET['icdCode'];
$diagnosis = $_GET['diagnosis'];
$username = $_GET['username'];


$ro = new database();

$ro->addICD($icdCode,$diagnosis,$username);




?>
