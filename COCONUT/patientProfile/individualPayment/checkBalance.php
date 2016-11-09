<?php
include("../../../myDatabase2.php");
$registrationNo = $_GET['registrationNo'];
$username = $_GET['username'];

$ro = new database2();

if( $ro->checkBalance($registrationNo) < 1 ) {
$ro->editNow("registrationDetails","registrationNo",$registrationNo,"dateUnregistered",date("Y-m-d"));
$ro->editNow("registrationDetails","registrationNo",$registrationNo,"timeUnregistered",$ro->getSynapseTime() );
$ro->editNow("registrationDetails","registrationNo",$registrationNo,"mgh","Synapse System" );
$ro->editNow("registrationDetails","registrationNo",$registrationNo,"mgh_date",date("M_d_Y") );
}else {

}

$ro->gotoPage("http://".$ro->getMyUrl()."/COCONUT/patientProfile/patientProfile_handler.php?registrationNo=$registrationNo&username=$username");



?>
