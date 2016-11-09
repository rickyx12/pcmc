<?php
include("../../../myDatabase2.php");
$registrationNo = $_GET['registrationNo'];
$phicPaymentNo = $_GET['phicPaymentNo'];
$username = $_GET['username'];

$ro = new database2();

$ro->editNow("phicPayment","phicPaymentNo",$phicPaymentNo,"status","DELETED_".$username."_".date("Y-m-d"));

$ro->gotoPage("http://".$ro->getMyUrl()."/COCONUT/patientProfile/Payments/viewPHICPayment.php?registrationNo=$registrationNo&username=$username");

?>
