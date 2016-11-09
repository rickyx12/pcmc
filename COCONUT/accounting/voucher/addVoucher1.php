<?php
include("../../../myDatabase1.php");
$voucherNo = $_GET['voucherNo'];
$paymentMode = $_GET['paymentMode'];
$description = $_GET['description'];
$amount = $_GET['amount'];
$payee = $_GET['payee'];
$payee1 = $_GET['payee1'];
$dateIssued = $_GET['dateIssued'];
$timeIssued = $_GET['timeIssued'];
$accountTitle = $_GET['accountTitle'];
$userz = $_GET['username'];


$ro = new database1();

if( $payee != "" ) {
$ro->addVoucher($voucherNo,$paymentMode,$description,$amount,$payee,$dateIssued,$timeIssued,$accountTitle,$userz);
}else {
$ro->addVoucher($voucherNo,$paymentMode,$description,$amount,$payee1,$dateIssued,$timeIssued,$accountTitle,$userz);
}


?>
