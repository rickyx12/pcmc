<?php
include("../../../myDatabase1.php");
$registrationNo = $_GET['registrationNo'];
$itemNo = $_GET['itemNo'];
$physician = $_GET['physician'];
$radioReport = $_GET['radioReport'];
$hospitalName = $_GET['hospitalName'];
$hospitalAddress = $_GET['hospitalAddress'];


$ro = new database1();

$ro->radioReportInsert($registrationNo,$itemNo,date("M_d_Y"),$physician,$radioReport,$hospitalName,$hospitalAddress);

?>
