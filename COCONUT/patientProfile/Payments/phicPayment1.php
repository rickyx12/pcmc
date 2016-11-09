<?php
include("../../../myDatabase2.php");
$refNo = $_POST['refNo'];
$checkNo = $_POST['checkNo'];
$registrationNo = $_POST['registrationNo'];
$amount = $_POST['amount'];
$tax = $_POST['tax'];
$month = $_POST['month'];
$day = $_POST['day'];
$year = $_POST['year'];
$postBy = $_POST['postBy'];
$paymentFor = $_POST['paymentFor'];
$itemNo = $_POST['itemNo'];


$ro = new database2();

$date = $year."-".$month."-".$day;

$ro->addPHICPayment($refNo,$checkNo,$registrationNo,$amount,$tax,$date,$postBy,$paymentFor,$itemNo);

$ro->gotoPage("http://".$ro->getMyUrl()."/COCONUT/patientProfile/patientProfile_right.php?registrationNo=$registrationNo&username=$postBy");

?>
