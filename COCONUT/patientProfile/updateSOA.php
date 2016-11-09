<?php
include("../../myDatabase1.php");
$registrationNo = $_GET['registrationNo'];
$username = $_GET['username'];

echo "Pls Wait While Updating the S.O.A";

$ro = new database1();

$ro->getPatientProfile($registrationNo);

$room = preg_split ("/\_/",$ro->getRegistrationDetails_room()); 
$dateIn = preg_split ("/\-/", $ro->getRegistrationDetails_dateRegistered()); 
//$dateIn = preg_split ("/\_/", $ro->doubleSelectNow("patientCharges","dateCharge","registrationNo",$registrationNo,"description",$ro->getRegistrationDetails_room()) ); 
$dateOut = preg_split ("/\-/",$ro->getRegistrationDetails_dateUnregistered()); 

//$a=$ro->getRegistrationDetails_dateRegistered();

//echo "<br />".$a." | ".$ro->getRegistrationDetails_dateUnregistered()." | ".$ro->getRegistrationDetails_room()." | ".$dateIn[1];

if( $dateIn[1] == $dateOut[1] ) {
//count days kapag magkapareho ung month ng admission at discharge
$totalDays = $dateOut[2] - $dateIn[2];
}else {
//count days kapag magkaiba ung month ng admission at discharge
if($dateIn[1] == "12") {
$totalDays = (($dateOut[2] + 31 ) - $dateIn[2] );
}else if( $dateIn[1] == "01" ) {
$totalDays = (($dateOut[2] + 31 ) - $dateIn[2] );
}else if( $dateIn[1] == "02" ) {
$totalDays = (($dateOut[2] + 28 ) - $dateIn[2] );
}else if( $dateIn[1] == "03" ) {
$totalDays = (($dateOut[2] + 31 ) - $dateIn[2] );
}else if( $dateIn[1] == "04" ) {
$totalDays = (($dateOut[2] + 30 ) - $dateIn[2] );
}else if( $dateIn[1] == "05" ) {
$totalDays = (($dateOut[2] + 31 ) - $dateIn[2] );
}else if( $dateIn[1] == "06" ) {
$totalDays = (($dateOut[2] + 30 ) - $dateIn[2] );
}else if( $dateIn[1] == "07" ) {
$totalDays = (($dateOut[2] + 31 ) - $dateIn[2] );
}else if( $dateIn[1] == "08" ) {
$totalDays = (($dateOut[2] + 31 ) - $dateIn[2] );
}else if( $dateIn[1] == "09" ) {
$totalDays = (($dateOut[2] + 30 ) - $dateIn[2] );
}else if( $dateIn[1] == "10" ) {
$totalDays = (($dateOut[2] + 31 ) - $dateIn[2] );
}else if( $dateIn[1] == "11" ) {
$totalDays = (($dateOut[2] + 30 ) - $dateIn[2] );
}
else {

}

}
//echo "Total Days&nbsp;".$totalDays;
$totalPrice = ( $ro->doubleSelectNow("patientCharges","sellingPrice","registrationNo",$registrationNo,"description",$ro->getRegistrationDetails_room()) * $totalDays );
$totalPHIC = (500 * $totalDays);
$totalExcess = ($totalPrice - $totalPHIC);
//echo "<br>Total Price&nbsp;".$totalPrice;
//echo "<br>Total PhilHealth&nbsp;".$totalPHIC;
//echo "<br>Total Excess&nbsp;".($totalPrice - $totalPHIC);
$ro->doubleEditNow("patientCharges","registrationNo",$registrationNo,"description",$ro->getRegistrationDetails_room(),"quantity",$totalDays);
$ro->doubleEditNow("patientCharges","registrationNo",$registrationNo,"description",$ro->getRegistrationDetails_room(),"total",$totalPrice);
$ro->doubleEditNow("patientCharges","registrationNo",$registrationNo,"description",$ro->getRegistrationDetails_room(),"phic",$totalPHIC);
$ro->doubleEditNow("patientCharges","registrationNo",$registrationNo,"description",$ro->getRegistrationDetails_room(),"cashUnpaid",$totalExcess);


//addCharges_cash($status,$registrationNo,$chargesCode,$description,$sellingPrice,$discount,$total,$cashUnpaid,$phic,$company,$timeCharge,$dateCharge,$chargeBy,$service,$title,$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$branch,$room)





$ro->gotoPage("http://".$ro->getMyUrl()."/COCONUT/patientProfile/SOAoption/summary-apr26.php?registrationNo=$registrationNo&username=$username");


?>
