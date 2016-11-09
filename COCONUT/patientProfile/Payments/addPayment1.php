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


$datePaid = $year."-".$month."-".$day;

$timezone = "Asia/Manila";
date_default_timezone_set ($timezone);

$ro = new database2();


if(!is_numeric($amountPaid)){
echo "
<font face='Arial' color='red'>Wrong amount format. Try again!!!</font>
<META HTTP-EQUIV='Refresh'CONTENT='2;URL=manualPayment.php?username=$username'>
";
}
else{
$ro->addPayment_new($registrationNo,$amountPaid,$datePaid,date("H:i:s"),$username,$paymentFor,$orNo,$paidVia,$pf,$admitting,$year."-".$month."-".$day);
}

?>
