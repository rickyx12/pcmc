<?php
include("../../myDatabase.php");
$type = $_GET['type'];
$username = $_GET['username'];
$reportName = $_GET['reportName'];

$ro = new database();

if($type == "OPD") {
$ro->gotoPage("http://".$ro->getMyUrl()."/COCONUT/Reports/hmoSOA.php?username=$username&reportName=$reportName");
}else {
$ro->gotoPage("http://".$ro->getMyUrl()."/COCONUT/Reports/hmoSOA_ipd.php?username=$username&reportName=$reportName");
}

?>
