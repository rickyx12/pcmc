<?php
include("../../../myDatabase2.php");
$registrationNo = $_GET['registrationNo'];
$username = $_GET['username'];
$itemNo = $_GET['itemNo'];
$countz = count($itemNo);
$orNO = $_GET['orNO'];
$ro = new database1();

$month = $_GET['month'];
$day = $_GET['day'];
$year = $_GET['year'];

$datePaid = $month."_".$day."_".$year;

for($x=0;$x<$countz;$x++) {

$ro->doubleEditNow("patientCharges","itemNo",$itemNo[$x],"registrationNo",$registrationNo,"cashPaid",$ro->doubleSelectNow("patientCharges","cashUnpaid","itemNo",$itemNo[$x],"registrationNo",$registrationNo)); // kuhain ang total price at ilagay sa cashPaid cols

$ro->doubleEditNow("patientCharges","itemNo",$itemNo[$x],"registrationNo",$registrationNo,"cashUnpaid","0"); // gwen 0 ang cashUnpaid cols

$ro->doubleEditNow("patientCharges","itemNo",$itemNo[$x],"registrationNo",$registrationNo,"status","PAID"); // tagged as PAID

$ro->doubleEditNow("patientCharges","itemNo",$itemNo[$x],"registrationNo",$registrationNo,"datePaid",$datePaid); 

$ro->doubleEditNow("patientCharges","itemNo",$itemNo[$x],"registrationNo",$registrationNo,"timePaid",$ro->getSynapseTime()); 

$ro->doubleEditNow("patientCharges","itemNo",$itemNo[$x],"registrationNo",$registrationNo,"paidBy",$username); // gwen 0 ang cashUnpaid cols

$newQty = ( $ro->selectNow("inventory","quantity","inventoryCode", $ro->selectNow("patientCharges","chargesCode","itemNo",$itemNo[$x])) - $ro->selectNow("patientCharges","quantity","itemNo",$itemNo[$x]) ); 

$ro->editNow("inventory","inventoryCode",$ro->doubleSelectNow("patientCharges","chargesCode","itemNo",$itemNo[$x],"registrationNo",$registrationNo),"quantity",$newQty);

//$ro->doubleEditNow("patientCharges","itemNo",$itemNo[$x],"registrationNo",$registrationNo,"departmentStatus","dispensedBy_".$username); 

//$ro->doubleEditNow("patientCharges","itemNo",$itemNo[$x],"registrationNo",$registrationNo,"departmentTime",$ro->getSynapseTime()); 


$ro->doubleEditNow("patientCharges","itemNo",$itemNo[$x],"registrationNo",$registrationNo,"orNO",$orNO); 

}

$ro->getPatientProfile($registrationNo);

if( $ro->getPatientRecord_firstName() == "N/A" && $ro->getPatientRecord_middleName() == "N/A" ) {
$ro->editNow("registrationDetails","registrationNo",$registrationNo,"dateUnregistered",date("M_d_Y"));
$ro->editNow("registrationDetails","registrationNo",$registrationNo,"timeUnregistered",$ro->getSynapseTime() );
$ro->editNow("registrationDetails","registrationNo",$registrationNo,"mgh","Synapse System");
$ro->editNow("registrationDetails","registrationNo",$registrationNo,"mgh_date",date("M_d_Y"));
}else  { 

$ro->gotoPage("/COCONUT/patientProfile/individualPayment/checkBalance.php?registrationNo=$registrationNo&username=$username");

 }



?>
