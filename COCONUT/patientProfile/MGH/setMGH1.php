<?php
include("../../../storedProcedure.php");
$registrationNo = $_GET['registrationNo'];
$username = $_GET['username'];

$ro = new storedProcedure();
//$ro->lockedAccountItems($registrationNo,date('Y-m-d H:i:s'),$username);
$ro->editNow("registrationDetails","registrationNo",$registrationNo,"mgh","yes_".$username);
$ro->editNow("registrationDetails","registrationNo",$registrationNo,"mgh_date",date("M_d_Y"));

mysql_connect($ro->myHost(),$ro->getUser(),$ro->getPass());
mysql_select_db($ro->getDB());

mysql_query("INSERT INTO `userLogLockUnLock` (`registrationNo`, `username`, `action`, `dateadded`) VALUES ('$registrationNo', '$username', 'Lock', '".date("YmdHis")."')");

$ro->gotoPage("http://".$ro->getMyUrl()."/COCONUT/patientProfile/patientProfile_handler.php?registrationNo=$registrationNo&username=$username");

?>
