<?php
include("../../myDatabase.php");
$username = $_GET['username'];
$ro = new database();

echo "<center><br><br>";
echo "<font size=4>Re - Order List</font>";
$ro->getCriticalLevel();


?>
