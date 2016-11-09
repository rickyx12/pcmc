<?php
include("../../../myDatabase.php");

$module = $_GET['module'];
$branch = $_GET['branch'];
$username = $_GET['username'];
$month = $_GET['month'];
$day = $_GET['day'];
$year = $_GET['year'];


$ro = new database();

$ro->getInventoryUsages($month,$day,$year,$module,$username,$branch);

?>
