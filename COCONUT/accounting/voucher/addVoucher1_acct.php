<?php
include("../../../myDatabase2.php");
$voucherNo = $_GET['voucherNo'];
$checkedNo = $_GET['checkedNo'];
$paymentMode = $_GET['paymentMode'];
$description = $_GET['description'];
$amount = $_GET['amount'];
$payee = $_GET['payee'];
$payee1 = $_GET['payee1'];
$month = $_GET['month'];
$day = $_GET['day'];
$year = $_GET['year'];
$timeIssued = $_GET['timeIssued'];
$accountTitle = $_GET['accountTitle'];
$userz = $_GET['username'];

$dateIssued = $year."-".$month."-".$day;

$ro = new database2();

if( $payee != "" ) {
$ro->addVoucher_acct($voucherNo,$checkedNo,$paymentMode,$description,$amount,$payee,$dateIssued,$timeIssued,$accountTitle,$userz);
}else {
$ro->addVoucher_acct($voucherNo,$checkedNo,$paymentMode,$description,$amount,$payee1,$dateIssued,$timeIssued,$accountTitle,$userz);
}


?>
