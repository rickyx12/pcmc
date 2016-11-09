<?php
include("../../../myDatabase2.php");
$registrationNo = $_GET['registrationNo'];
$paymentNo = $_GET['paymentNo'];
$username = $_GET['username'];

$ro = new database2();

$ro->editNow("companyPayment","paymentNo",$paymentNo,"status","DELETED_".$username."_".date("Y-m-d"));

$ro->gotoPage("http://".$ro->getMyUrl()."/COCONUT/patientProfile/Payments/viewCompanyPayment.php?registrationNo=$registrationNo&username=$username");

?>
