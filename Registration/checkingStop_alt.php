<?php
include("../myDatabase1.php");

$patientNo = $_GET['patientNo'];
$date = $_GET['date'];
$username = $_GET['username'];

$ro = new database1();

if( $ro->selectNow("reportHeading","information","reportName","stopDoubleRegistration") == "Activate" ) {

if($ro->checkingStop($patientNo,$date) == "" ) {
header("Location:http://".$ro->getMyUrl()."/Registration/newRecord_again_alt.php?username=$username&patientNo=$patientNo");
}else {
header("Location:http://".$ro->getMyUrl()."/Registration/stopRegistration.php");
}

}else {

header("Location:http://".$ro->getMyUrl()."/Registration/newRecord_again_alt.php?username=$username&patientNo=$patientNo");



}


?>