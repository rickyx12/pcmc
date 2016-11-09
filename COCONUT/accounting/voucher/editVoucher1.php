<?php
include("../../../myDatabase2.php");
$controlNo = $_GET['controlNo'];
$checkedNo = $_GET['checkedNo'];
$description = $_GET['description'];
$amount = $_GET['amount'];
$payee = $_GET['payee'];
$month = $_GET['month'];
$day = $_GET['day'];
$year = $_GET['year'];

$date = $year."-".$month."-".$day;

$ro = new database2();

if(!is_numeric($amount)){
echo "<font face='arial' size='3' color='red'>Invalid amount!!! Try again!!!</font>";
}
else{
$ro->editNow("vouchers","controlNo",$controlNo,"checkedNo",$checkedNo);
$ro->editNow("vouchers","controlNo",$controlNo,"description",$description);
$ro->editNow("vouchers","controlNo",$controlNo,"amount",$amount);
$ro->editNow("vouchers","controlNo",$controlNo,"payee",$payee);
$ro->editNow("vouchers","controlNo",$controlNo,"date",$date);
}


?>
