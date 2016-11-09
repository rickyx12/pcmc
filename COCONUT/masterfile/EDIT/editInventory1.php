<?php
include("../../../myDatabase.php");
$description = $_GET['description'];
$generic = $_GET['generic'];
$unitcost = $_GET['unitcost'];
$quantity = $_GET['quantity'];
$month = $_GET['month'];
$day = $_GET['day'];
$year = $_GET['year'];
$dateAdded = $_GET['dateAdded'];
$timeAdded = $_GET['timeAdded'];
$inventoryType = $_GET['inventoryType'];
$inventoryLocation = $_GET['inventoryLocation'];
$inventoryCode = $_GET['inventoryCode'];
$branch = $_GET['branch'];
$transition = $_GET['transition'];
$remarks = $_GET['remarks'];
$phic = $_GET['phic'];
$preparation = $_GET['preparation'];
$pricing = $_GET['pricing'];
$additional = $_GET['additional'];
$criticalLevel = $_GET['criticalLevel'];
$supplier = $_GET['supplier'];
$phicPrice = $_GET['phicPrice'];
$companyPrice = $_GET['companyPrice'];
$autoDispense = $_GET['autoDispense'];


$ro = new database();

if( $inventoryType == "medicine" && $additional == "" ) {
echo "<script type='text/javascript'> alert('Pls input the price of the medicine..');history.back(-1); </script>";
}else {

$expiration = $month."_".$day."_".$year;

$capital = ( $unitcost * $quantity );

$ro->editNow("inventory","inventoryCode",$inventoryCode,"description",$description);
$ro->editNow("inventory","inventoryCode",$inventoryCode,"genericName",$generic);
$ro->editNow("inventory","inventoryCode",$inventoryCode,"unitcost",$unitcost);
$ro->editNow("inventory","inventoryCode",$inventoryCode,"quantity",$quantity);
$ro->editNow("inventory","inventoryCode",$inventoryCode,"expiration",$expiration);	
$ro->editNow("inventory","inventoryCode",$inventoryCode,"dateAdded",$dateAdded);
$ro->editNow("inventory","inventoryCode",$inventoryCode,"timeAdded",$timeAdded);
$ro->editNow("inventory","inventoryCode",$inventoryCode,"inventoryType",$inventoryType);
$ro->editNow("inventory","inventoryCode",$inventoryCode,"inventoryLocation",$inventoryLocation);
$ro->editNow("inventory","inventoryCode",$inventoryCode,"branch",$branch);
$ro->editNow("inventory","inventoryCode",$inventoryCode,"transition",$transition);
$ro->editNow("inventory","inventoryCode",$inventoryCode,"remarks",$remarks);
$ro->editNow("inventory","inventoryCode",$inventoryCode,"preparation",$preparation);
$ro->editNow("inventory","inventoryCode",$inventoryCode,"phic",$phic);
$ro->editNow("inventory","inventoryCode",$inventoryCode,"Added",$pricing."_".$additional);
$ro->editNow("inventory","inventoryCode",$inventoryCode,"criticalLevel",$criticalLevel);
$ro->editNow("inventory","inventoryCode",$inventoryCode,"supplier",$supplier);
$ro->editNow("inventory","inventoryCode",$inventoryCode,"autoDispense",$autoDispense);
$ro->editNow("inventory","inventoryCode",$inventoryCode,"beginningCapital",$capital);

$ro->editNow("inventory","inventoryCode",$inventoryCode,"phicPrice",$phicPrice);
$ro->editNow("inventory","inventoryCode",$inventoryCode,"companyPrice",$companyPrice);
}

?>
