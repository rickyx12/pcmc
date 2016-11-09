<?php
include("../../../myDatabase2.php");
$registrationNo = $_GET['registrationNo'];
$username = $_GET['username'];

$ro = new database2();

$ro->editNow("registrationDetails","registrationNo",$registrationNo,"mgh","");
$ro->editNow("registrationDetails","registrationNo",$registrationNo,"mgh_date","");

mysql_connect($ro->myHost(),$ro->getUser(),$ro->getPass());
mysql_select_db($ro->getDB());

mysql_query("INSERT INTO `userLogLockUnLock` (`registrationNo`, `username`, `action`, `dateadded`) VALUES ('$registrationNo', '$username', 'Unlock', '".date("YmdHis")."')");

$ro->gotoPage("http://".$ro->getMyUrl()."/COCONUT/currentPatient/patientInterface1.php?registrationNo=$registrationNo&username=$username");

?>
