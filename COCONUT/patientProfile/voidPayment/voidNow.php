<?php
include("../../../myDatabase1.php");
$itemNo = $_GET['itemNo'];
$countz = count($itemNo);
$registrationNo = $_GET['registrationNo'];
$user = $_GET['username'];
$ro = new database1();

$ro->getPatientProfile($registrationNo);

for($x=0;$x<$countz;$x++) {

$ricky = preg_split ("/\_/", $itemNo[$x]); // combine itemNo + total  = itemNo_total 
$ro->getPatientChargesToEdit($ricky[0]);

$ro->addVoidPayment($registrationNo."_".$ro->getPatientRecord_completeName(),$ricky[0]."_".$ro->patientCharges_Description(),$ro->patientCharges_cashPaid(),$ro->getSynapseTime(),date("M_d_Y"),$user);

$ro->editNow("patientCharges","itemNo",$ricky[0],"status","UNPAID");
$ro->editNow("patientCharges","itemNo",$ricky[0],"orNo","");
$ro->editNow("patientCharges","itemNo",$ricky[0],"cashPaid","0");
$ro->editNow("patientCharges","itemNo",$ricky[0],"datePaid","");
$ro->editNow("patientCharges","itemNo",$ricky[0],"timePaid","");
$ro->editNow("patientCharges","itemNo",$ricky[0],"paidBy","");
$ro->editNow("patientCharges","itemNo",$ricky[0],"cashUnpaid",$ricky[1]);
$ro->editNow("registrationDetails","registrationNo",$registrationNo,"dateUnregistered","");
$ro->editNow("registrationDetails","registrationNo",$registrationNo,"timeUnregistered","");

}

echo "
<script type='text/javascript'>
alert('Void Payment Success');
window.location = 'http://".$ro->getMyUrl()."/COCONUT/patientProfile/patientProfile_handler.php?registrationNo=$registrationNo&username=$user';
</script>

";




?>
