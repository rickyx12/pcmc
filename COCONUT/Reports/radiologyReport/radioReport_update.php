<?php
include("../../../myDatabase1.php");
$registrationNo = $_GET['registrationNo'];
$itemNo = $_GET['itemNo'];
$physician = $_GET['physician'];
$radioReport = $_GET['radioReport'];
$hospitalName = $_GET['hospitalName'];
$hospitalAddress = $_GET['hospitalAddress'];
$username = $_GET['username'];

$ro = new database1();

$ro->doubleEditNow("radioSavedReport","registrationNo",$registrationNo,"itemNo",$itemNo,"physician",$physician);

$ro->doubleEditNow("radioSavedReport","registrationNo",$registrationNo,"itemNo",$itemNo,"radioReport",$radioReport);

$ro->doubleEditNow("radioSavedReport","registrationNo",$registrationNo,"itemNo",$itemNo,"hospitalName",$hospitalName);


$ro->doubleEditNow("radioSavedReport","registrationNo",$registrationNo,"itemNo",$itemNo,"hospitalAddress",$hospitalAddress);


$ro->gotoPage("http://".$ro->getMyUrl()."/COCONUT/Results/Radiology/radioResult_list.php?registrationNo=$registrationNo&username=$username");

?>
