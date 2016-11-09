<?php
include("../../../myDatabase.php");

$description = $_GET['description'];
$suppliesUNITCOST = $_GET['suppliesUNITCOST'];
$unitcost = $_GET['unitcost'];
$quantity = $_GET['quantity'];
$month = $_GET['month'];
$day = $_GET['day'];
$year = $_GET['year'];
$dateAdded = $_GET['dateAdded'];
$inventoryLocation = $_GET['inventoryLocation'];
$branch = $_GET['branch'];
$transition = $_GET['transition'];
$phic = $_GET['phic'];
$criticalLevel = $_GET['criticalLevel'];
$remarks = $_GET['remarks'];
$supplier = $_GET['supplier'];
$inventoryCode = $_GET['inventoryCode'];

$ro = new database();

$expiration = $month."_".$day."_".$year;

$capital = ( $suppliesUNITCOST * $quantity );

$ro->editNow("inventory","inventoryCode",$inventoryCode,"description",$description);
$ro->editNow("inventory","inventoryCode",$inventoryCode,"suppliesUNITCOST",$suppliesUNITCOST);
$ro->editNow("inventory","inventoryCode",$inventoryCode,"unitcost",$unitcost);
$ro->editNow("inventory","inventoryCode",$inventoryCode,"quantity",$quantity);
$ro->editNow("inventory","inventoryCode",$inventoryCode,"expiration",$expiration);
$ro->editNow("inventory","inventoryCode",$inventoryCode,"dateAdded",$dateAdded);
$ro->editNow("inventory","inventoryCode",$inventoryCode,"inventoryLocation",$inventoryLocation);
$ro->editNow("inventory","inventoryCode",$inventoryCode,"transition",$transition);
$ro->editNow("inventory","inventoryCode",$inventoryCode,"phic",$phic);
$ro->editNow("inventory","inventoryCode",$inventoryCode,"criticalLevel",$criticalLevel);
$ro->editNow("inventory","inventoryCode",$inventoryCode,"remarks",$remarks);
$ro->editNow("inventory","inventoryCode",$inventoryCode,"supplier",$supplier);
$ro->editNow("inventory","inventoryCode",$inventoryCode,"beginningCapital",$capital);

?>
