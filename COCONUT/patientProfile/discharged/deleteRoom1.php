<?php
include("../../../myDatabase2.php");
$registrationNo = $_GET['registrationNo'];
$itemNo = $_GET['itemNo'];
$chargesCode = $_GET['chargesCode'];
$control = $_GET['control'];

$ro = new database2();

if( $control == "delete" ) {
$ro->editNow("room","Description",$chargesCode,"status","Vacant");
$ro->editNow("registrationDetails","registrationNo",$registrationNo,"room","");
$ro->deleteRoom_new($registrationNo,$itemNo);

echo "Room has been Deleted.";
}else {
$ro->editNow("room","Description",$chargesCode,"status","Vacant");
$ro->editNow("registrationDetails","registrationNo",$registrationNo,"room","");
echo $chargesCode." is now Vacant.";
}


?>
