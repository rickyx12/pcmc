<?php
include("../../myDatabase.php");
$branch = $_GET['branch'];
$username = $_GET['username'];
$inventoryType = $_GET['inventoryType'];
$description = $_GET['description'];
$requestingDepartment = $_GET['requestingDepartment'];
$requestNo = $_GET['requestNo'];
$requestNo = $_GET['requestNo'];

$ro =  new database();

$ro->getMasterListInventory_requesting($inventoryType,$username,$branch,$description,$requestingDepartment,$requestNo);

?>
