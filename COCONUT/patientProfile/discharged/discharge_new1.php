<?php
include("../../../myDatabase2.php");
$registrationNo = $_GET['registrationNo'];
$username = $_GET['username'];
$roompresent = $_GET['roompresent'];

$ro = new database2();

if($roompresent=="yes"){
$itemNo = $_GET['itemNo'];
$countItem = count($itemNo);
for( $x=0;$x<$countItem;$x++ ) {
$ro->editNow("room","Description",$ro->selectNow("patientCharges","chargesCode","itemNo",$itemNo[$x]),"status","Vacant");
$ro->editNow("patientCharges","itemNo",$itemNo[$x],"status","Discharged");
}
}

$ro->EditNow("registrationDetails","registrationNo",$registrationNo,"dateUnregistered",date("Y-m-d"));
$ro->EditNow("registrationDetails","registrationNo",$registrationNo,"timeUnregistered",$ro->getSynapseTime());
//$ro->editNow("registrationDetails","registrationNo",$registrationNo,"mgh",$username);
//$ro->editNow("registrationDetails","registrationNo",$registrationNo,"mgh_date",date("Y-m-d")."@".$ro->getSynapseTime());


mysql_connect($ro->myHost(),$ro->getUser(),$ro->getPass());
mysql_select_db($ro->getDB());

mysql_query("INSERT INTO `userLogLockUnLock` (`registrationNo`, `username`, `action`, `dateadded`) VALUES ('$registrationNo', '$username', 'Discharged', '".date("YmdHis")."')");

echo "<center><br><Br><Br><font color=red>Patient Discharged</font>";

?>
