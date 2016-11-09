<?php
include("../../../myDatabase2.php");
$registrationNo = $_GET['registrationNo'];
$username = $_GET['username'];
$paymentFor = $_GET['paymentFor'];
$amountPaid = $_GET['amountPaid'];
$pf = $_GET['pf'];
$admitting = $_GET['admitting'];
//$datePaid = $_GET['datePaid'];
$orNo = $_GET['orNo'];
$paidVia = $_GET['paidVia'];
$month = $_GET['month'];
$day = $_GET['day'];
$year = $_GET['year'];

$ro = new database2();

$datePaid = $month."_".$day."_".$year;

$timezone = "Asia/Manila";
date_default_timezone_set ($timezone);

$ro->addPayment_new($registrationNo,$amountPaid,$datePaid,date("H:i:s"),$username,$paymentFor,$orNo,$paidVia,$pf,$admitting);

?>
