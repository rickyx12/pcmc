<?php
include("../../myDatabase2.php");
$registrationNo = $_GET['registrationNo'];
$dischargePlan = $_GET['plan'];
$ro = new database2();

$ro->addDischargedPlan($registrationNo,$dischargePlan);

?>
