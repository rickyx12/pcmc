<?php
include("../../myDatabase2.php");
$username = $_POST['username'];
$password = $_POST['password'];
$registrationNo = $_POST['registrationNo'];
$itemNo = $_POST['itemNo'];


$ro = new database2();

if( $username == "" ) {
$ro->getBack("AUTHENTICATION ERROR");
}else if( $password == "" ) {
$ro->getBack("AUTHENTICATION ERROR");
}else if( $username == "" && $password == "" ) {
$ro->getBack("AUTHENTICATION ERROR");
}else {
if( $username == "resultx" && $password == "A3GvH78" ) {
echo "<br>";
$ro->editNow("patientCharges","itemNo",$itemNo,"status","DELETED_".$username."[".date("Y-m-d")."@".date("H:i:s")."]");
echo "Result Deleted";
}else {
$ro->getBack("AUTHENTICATION ERROR");
}

}



?>
