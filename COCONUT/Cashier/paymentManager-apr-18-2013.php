<?php
include("../../myDatabase.php");
$cashierPaid = $_GET['cashierPaid'];
$countz = count($cashierPaid);
$totalPaid = $_GET['totalPaid'];
$username = $_GET['username'];
$serverTime = $_GET['serverTime'];
$chargeStatus = $_GET['chargeStatus'];
$paymentType = $_GET['paymentType'];
$orNO = $_GET['orNO'];
$registrationNo = $_GET['registrationNo'];

$month = $_GET['month']; // month paid
$day = $_GET['day']; // day paid
$year = $_GET['year']; // year paid

$ro = new database();

$ro->getPatientProfile($registrationNo);

$timezone = "Asia/Manila";
date_default_timezone_set ($timezone);


$datePaid = $month."_".$day."_".$year;

if( $ro->getRegistrationDetails_type() == "OPD" || $ro->getRegistrationDetails_type() == "DIALYSIS" ) {
if($chargeStatus == "UNPAID") {
for($x=0;$x<$countz;$x++) {
if($totalPaid >= $ro->getItemNo_total($cashierPaid[$x])) {//os
$natira = $totalPaid - $ro->getItemNo_total($cashierPaid[$x]); 
$ro->paymentManager($cashierPaid[$x],"PAID",$username,$ro->getItemNo_total($cashierPaid[$x]),$datePaid,date("H:i:s"),"0");
$ro->editNow("patientCharges","itemNo",$cashierPaid[$x],"orNO",$orNO);
$ro->editNow("registrationDetails","registrationNo",$ro->selectNow("patientCharges","registrationNo","itemNo",$cashierPaid[$x]),"dateUnregistered",date("M_d_Y")); //date discharged
$ro->editNow("registrationDetails","registrationNo",$ro->selectNow("patientCharges","registrationNo","itemNo",$cashierPaid[$x]),"timeUnregistered",date("H:i:s")); //time discharged
$ro->editNow("registrationDetails","registrationNo",$ro->selectNow("patientCharges","registrationNo","itemNo",$cashierPaid[$x]),"mgh","Synapse System"); //set as MGH [LOCKED ACCOUNT] 
$ro->editNow("registrationDetails","registrationNo",$ro->selectNow("patientCharges","registrationNo","itemNo",$cashierPaid[$x]),"mgh_date",date("M_d_Y")); //set as MGH [LOCKED ACCOUNT] 

if($paymentType != "Cash") {
$ro->editNow("patientCharges","itemNo",$cashierPaid[$x],"paidVia",$paymentType);
$ro->editNow("patientCharges","itemNo",$cashierPaid[$x],"orNO",$orNO);
}else {
echo "";
}





}//os
else {
$unpaid = $totalPaid - $ro->getItemNo_total($cashierPaid[$x]);
$ro->paymentManager($cashierPaid[$x],"BALANCE",$username,abs($totalPaid),date("M_d_Y"),date("H:i:s"),abs($unpaid));
$ro->editNow("patientCharges","itemNo",$cashierPaid[$x],"orNO",$orNO);


if($paymentType != "Cash") {
$ro->editNow("patientCharges","itemNo",$cashierPaid[$x],"paidVia",$paymentType);
$ro->editNow("patientCharges","itemNo",$cashierPaid[$x],"orNO",$orNO);
}else {
echo "";
}

}

}
}// IF (UNPAID)

else {

for($x=0;$x<$countz;$x++) { //FOR LOOP
$ro->payBalance($cashierPaid[$x],date("M_d_Y"),$serverTime,$username,$totalPaid);
$ro->updateStatus($cashierPaid[$x],"PAID");
$ro->editCharges($cashierPaid[$x],"cashUnpaid","0");
}// FOR LOOP

}
}else if( $ro->getRegistrationDetails_type() == "IPD" ) {

$ro->addPayment($registrationNo,$totalPaid,date("M_d_Y"),$ro->getSynapseTime(),$username,"FULL PAYMENT",$orNO,$paymentType);

}else {
echo "<font color=red>I can't Determine if ".$ro->getPatientRecord_completeName()." is an OPD/IPD/DIALYSIS. Pls Check Before I Can Proceed to Payment Processing</font> ";
}



?>
