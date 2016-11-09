<?php
include("../../../myDatabase.php");

$fromMonth = $_GET['fromMonth'];
$fromDay = $_GET['fromDay'];
$fromYear = $_GET['fromYear'];
$toMonth = $_GET['toMonth'];
$toDay = $_GET['toDay'];
$toYear = $_GET['toYear'];
$type = $_GET['type'];
$branch = $_GET['branch'];
$username = $_GET['username'];

$ro = new database();

$dfrom = $fromYear."-".$fromMonth."-".$fromDay;
$dto = $toYear."-".$toMonth."-".$toDay;

echo "<center>";
echo "<font size=6>".$ro->getReportInformation("hmoSOA_name")."</font>";
echo "<br><font size=3>".$ro->getReportInformation("hmoSOA_address")."</font>";
echo "<Br><font size=3>($branch)</font>";
echo "<br><br><font size=5>Registration Census For $type</font>";
echo "<br><font size=2>(".date("M d, Y",strtotime($dfrom))." to ".date("M d, Y",strtotime($dto)).")</font>";
echo "<br>";
$ro->censusRegistered($fromMonth,$fromDay,$fromYear,$toMonth,$toDay,$toYear,$type,$branch,$username);

?>
